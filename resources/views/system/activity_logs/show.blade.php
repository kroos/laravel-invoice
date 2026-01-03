@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0"><i class="fa-brands fa-searchengin"></i> Log Detail</h5>
    <a href="{{ route('activity-logs.index') }}" class="btn btn-light btn-sm">
      <i class="fa-regular fa-circle-left"></i> Back
    </a>
  </div>
  <div class="card-body">
    <div class="row mb-3">
      <div class="col-md-6">
        <strong>Event:</strong> {{ ucfirst($log->event) }} <br>
        <strong>Model:</strong> {{ class_basename($log->model_type) }} #{{ $log->model_id }} <br>
        <strong>User:</strong> {{ $log->user?->name ?? 'System' }} <br>
        <strong>IP:</strong> {{ $log->ip_address }}
      </div>
      <div class="col-md-6">
        <strong>Created At:</strong> {{ $log->created_at->format('j M Y h:i:s a') }} <br>
        <strong>User Agent:</strong> <small>{{ $log->user_agent }}</small>
      </div>
    </div>

    <hr>

    <h6>Changes:</h6>
    <pre class="bg-light p-3 border rounded" style="white-space: pre-wrap;">{{ json_encode($log->changes, JSON_PRETTY_PRINT) }}</pre>
    <h6>Snapshots:</h6>
    <pre class="bg-light p-3 border rounded" style="white-space: pre-wrap;">{{ json_encode($log->snapshot, JSON_PRETTY_PRINT) }}</pre>
  </div>
</div>
@endsection
