@extends('layouts.app')
@section('title', 'Edit Customer')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-header">
        <h5 class="mb-0">Edit Customer</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('customers.update', $customer->cid) }}" class="row g-3 needs-validation">
          @csrf
          @method('put')
          <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $customer->name }}" placeholder="Enter Name" required>
          </div>
          <div class="col-md-6">
            <label for="tel" class="form-label">Tel</label>
            <input type="text" class="form-control" name="tel"  id="tel" value="{{ $customer->tel }}"  placeholder="Enter Tel" required>
          </div>
          <div class="col-12 text-end">
            <a href="{{ route('customers.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button class="btn btn-primary" type="submit">UPDATE CUSTOMER</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection