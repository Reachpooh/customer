@extends('layouts.app')
@section('title', 'Customer List')
@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
    <h5 class="mb-0 fw-bold">Customer Management</h5>
    <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">CREATE CUSTOMER</a>
  </div>
  <div class="card-body p-0">
    <table class="table table-hover mb-0 align-middle">
      <thead class="table-light">
        <th>CID</th>
        <th>Name</th>
        <th>Tel</th>
        <th style="width: 50%">Appointments</th>
        <th>Action</th>
      </thead>
      <tbody class="table-light">
        @foreach ($customers as $customer)
        <tr>
          <td>{{ $customer->cid }}</td>
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->tel }}</td>
          <td>
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
                <li class="py-3 text-muted">No Appointments</li>
              @endforelse
            </ul>
          </td>
          <td><a href="{{ route('customers.show', $customer->cid) }}" class="btn btn-info btn-sm">View</a>
            <a href="{{ route('customers.edit', $customer->cid) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('customers.destroy', $customer->cid) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-danger btn-sm btn-delete">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    {{ $customers->links('pagination::bootstrap-5') }}
  </div>
</div>
@endsection