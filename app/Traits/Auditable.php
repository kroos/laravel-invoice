<?php
namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

trait Auditable
{
	/**
	 * Global and instance-level auditing control.
	 */
	protected static bool $auditingEnabled = true;
	protected bool $auditEnabled = true;

	/**
	 * Determine if this instance should be audited.
	 */
	protected function isAuditable(): bool
	{
		return $this->auditEnabled ?? true;
	}

	/**
	 * Disable auditing globally.
	 */
	public static function disableAuditing(): void
	{
		static::$auditingEnabled = false;
	}

	/**
	 * Enable auditing globally.
	 */
	public static function enableAuditing(): void
	{
		static::$auditingEnabled = true;
	}

	/**
	 * Check if auditing is globally enabled.
	 */
	public static function isAuditingEnabled(): bool
	{
		return static::$auditingEnabled;
	}

	/**
	 * Boot the Auditable trait and listen for Eloquent events.
	 */
	public static function bootAuditable()
	{
		static::created(fn(Model $m) => $m->logActivity('created'));

		static::updating(fn(Model $m) => $m->auditOldAttributes = $m->getOriginal());

		static::updated(function (Model $m) {
			$m->logActivity('updated', $m->auditOldAttributes ?? []);
			unset($m->auditOldAttributes);
		});

		static::deleted(function (Model $m) {
			$event = method_exists($m, 'isForceDeleting') && $m->isForceDeleting()
			? 'force_deleted'
			: 'deleted';
			$m->logActivity($event);
		});

    // register "restored" only if model supports SoftDeletes
		if (method_exists(static::class, 'restored')) {
			static::restored(fn(Model $m) => $m->logActivity('restored'));
		}
	}

	protected function getAuditExclude(): array
	{
		return property_exists(static::class, 'auditExclude')
			? static::$auditExclude
			: ['password', 'remember_token'];
	}

	protected function filteredAttributes(array $attrs): array
	{
		foreach ($this->getAuditExclude() as $key) unset($attrs[$key]);
		return $attrs;
	}

	protected function computeDiff(array $before, array $after): array
	{
		$diff = [];
		foreach (array_unique(array_merge(array_keys($before), array_keys($after))) as $k) {
			$b = $before[$k] ?? null;
			$a = $after[$k] ?? null;
			if ($b !== $a) $diff[$k] = ['before' => $b, 'after' => $a];
		}
		return $diff;
	}

	protected function shouldIncludeSnapshot(): bool
	{
		return property_exists(static::class, 'auditIncludeSnapshot')
			&& static::$auditIncludeSnapshot === true;
	}

	protected function isEventCritical(string $event): bool
	{
		$critical = property_exists(static::class, 'auditCriticalEvents')
			? static::$auditCriticalEvents
			: ['deleted', 'force_deleted'];
		return in_array($event, $critical);
	}

	/**
	 * Main audit logging method.
	 */
	public function logActivity(string $event, array $before = [])
	{
		// Respect global and instance-level audit toggles
		if (!static::isAuditingEnabled() || !$this->isAuditable()) {
			return;
		}

		try {
			$after = $this->filteredAttributes($this->getAttributes());
			$before = $this->filteredAttributes($before ?: $this->getOriginal());
			$diff = $this->computeDiff($before, $after);

			$req = null;
			try { $req = Request::instance(); } catch (\Throwable) {}

			ActivityLog::create([
				'user_id'     => Auth::id(),
				'event'       => $event,
				'model_type'  => static::class,
				'model_id'    => $this->getKey(),
				'route_name'  => $req?->route()?->getName(),
				'method'      => $req?->getMethod(),
				'url'         => $req?->fullUrl(),
				'ip_address'  => $req?->ip(),
				'user_agent'  => $req?->header('User-Agent'),
				'guard'       => auth()->getDefaultDriver() ?? null,
				'is_critical' => $this->isEventCritical($event),
				'description' => sprintf('%s %s (%s)',
					class_basename(static::class),
					$event,
					$this->getKey() ?? '-'
				),
				'changes'     => $diff ?: null,
				'snapshot'    => $this->shouldIncludeSnapshot() ? $after : null,
			]);
		} catch (\Throwable $e) {
			Log::error('Audit log failed: '.$e->getMessage(), [
				'model' => static::class,
				'id'    => $this->getKey(),
				'event' => $event,
			]);
		}
	}

	/**
	 * Prevent persistence of temporary audit attributes.
	 */
	public function __set($key, $value)
	{
		if (in_array($key, ['oldAttributesForAudit', 'auditOldAttributes'])) {
			$this->$key = $value;
			return;
		}

		parent::__set($key, $value);
	}

	/**
	 * Alias for manual audit logging.
	 */
	public function recordActivity(string $event, array $before = [])
	{
		return $this->logActivity($event, $before);
	}
}
