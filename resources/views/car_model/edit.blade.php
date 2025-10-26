@extends('dashboard.layouts.master')
@section('title')
  Edit car_model
@endsection
@section('css')
@endsection

@section('content')
				
<div class="container">
    <h2>Edit car_model</h2>
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

    <form action="{{ route('car_model.update', $car_model->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Brand  --}}
          <div class="mb-3">
            <label for="brand_id" class="form-label">Brand</label>
            <select class="form-select" id="brand_id" name="brand_id" required>
              <option value="" disabled selected>Select a Brand</option>
              @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }} ({{ $brand->email }})</option>
              @endforeach
            </select>
          </div>
          {{-- car_model Name --}}
          <div class="mb-3">
            <label for="name" class="form-label">Car Model Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
        

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update car_model</button>
    </form>
</div>
@endsection
@section('js')
@endsection