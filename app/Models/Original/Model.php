<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

// auditable model
use App\Traits\Auditable;

class Model extends Eloquent {
	use HasFactory, Auditable;
	protected static $auditIncludeSnapshot = true;
	protected static $auditCriticalEvents = ['updated', 'deleted','force_deleted'];

	protected $guarded = [];
}
