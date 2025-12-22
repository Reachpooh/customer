@extends('layouts.app')
@section('title', 'Edit Customer')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-header">
        <h5 class="mb-0">Customer Details</h5>
      </div>
      <div class="card-body">
        <label class="fw-bold text-muted small">NAME</label>
        <h5 class="card-title mb-3">{{ $customer->name }}</h5>
        
        <label class="fw-bold text-muted small">TELEPHONE</label>
        <h6 class="card-subtitle mb-4 text-muted">{{ $customer->tel }}</h6>
        
        <hr>
        
        <h6 class="fw-bold mb-3">Appointments</h6>
        <ul class="list-unstyled mb-0">
          @forelse ($customer->appointments as $appointment)
            <li class="d-flex justify-content-between align-items-center border-bottom py-3">
              <div class="fw-bold text-truncate pe-2" style="width: 45%;">
                {{ $appointment->service->name ?? 'Service' }}, 
                {{ number_format($appointment->service->price ?? 0, 2) }} USD
              </div>
              <div class="text-muted text-center" style="width: 30%;">
                {{ $appointment->appointment_time }}
              </div>
              <div style="width: 25%; text-align: right;">
                @switch($appointment->status)
                  @case('confirmed')
                    <span class="badge bg-success rounded-pill px-3 py-2 shadow-sm">CONFIRMED</span>
                    @break
                  @case('pending')
                    <span class="badge bg-primary rounded-pill px-3 py-2 shadow-sm">PENDING</span>
                    @break
                  @default
                    <span class="badge bg-secondary rounded-pill px-3 py-2 shadow-sm">CANCELLED</span>
                @endswitch
              </div>
            </li>
          @empty
            <li class="py-3 text-muted">No Appointments found for this customer.</li>
          @endforelse
        </ul>
      </div>
      <div class="card-footer text-end">
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
      </div>
    </div>
  </div>
</div>
@endsection