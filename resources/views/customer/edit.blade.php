@extends('dashboard.layouts.master')
@section('title')
  Edit customer
@endsection
@section('css')
@endsection

@section('content')
				
<div class="container">
    <h2>Edit customer</h2>
    <div>
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
    </div>

    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- User ID Field -->
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-select" id="user_id" name="user_id" required>
              <option value="" disabled>Select a user</option>
              @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $customer->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
              @endforeach
            </select>
        </div>
        

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>
@endsection
@section('js')
@endsection