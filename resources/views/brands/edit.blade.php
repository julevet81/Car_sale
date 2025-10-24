@extends('dashboard.layouts.master')
@section('title')
  Edit brand
@endsection
@section('css')
@endsection

@section('content')
				
<div class="container">
    <h2>Edit brand</h2>
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

    <form action="{{ route('brand.update', $brand->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- brand Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">brand Name</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name', $brand->name) }}"
                   class="form-control" required>
        </div>
        {{-- OS --}}
          <div class="mb-3">
            <label for="OS" class="form-label">Operating System</label>
            <select name="OS" id="OS" 
                    class="form-select @error('OS') is-invalid @enderror" required>
                <option value="" disabled selected>-- Select OS --</option>
                <option value="Android" {{ old('OS') == 'Android' ? 'selected' : '' }}>Android</option>
                <option value="IOS" {{ old('OS') == 'IOS' ? 'selected' : '' }}>iOS</option>
            </select>
            @error('os')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
          {{-- owner Name --}}
          <div class="mb-3">
            <label for="owner_name" class="form-label">Owner Name</label>
            <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{ old('owner_name', $brand->owner_name) }}" required>
          </div>
        

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update brand</button>
    </form>
</div>
@endsection
@section('js')
@endsection