@extends('dashboard.layouts.master')
@section('title')
  Edit car
@endsection
@section('css')
@endsection

@section('content')
				
<div class="container">
    <h2>Edit car</h2>
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

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3 mb-3">
    <div class="col-md-4">
        <label class="form-label">Brand</label>
        <select name="brand_id" class="form-select" required>
            <option value="">Select brand</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ old('brand_id', $car->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}
                </option>
            @endforeach
        </select>
        @error('brand_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Model</label>
        <select name="car_model_id" class="form-select" required>
            <option value="">Select model</option>
            @foreach($models as $model)
                <option value="{{ $model->id }}" {{ old('car_model_id', $car->car_model_id ?? '') == $model->id ? 'selected' : '' }}>
                    {{ $model->name }}
                </option>
            @endforeach
        </select>
        @error('car_model_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select" required>
            <option value="">Select category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $car->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Title</label>
        <input type="text" name="title" value="{{ old('title', $car->title ?? '') }}" class="form-control" required>
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label">Year</label>
        <input type="number" name="year" value="{{ old('year', $car->year ?? '') }}" class="form-control" required>
        @error('year') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label">Kilometer Age</label>
        <input type="number" name="kilometer_age" value="{{ old('kilometer_age', $car->kilometer_age ?? '') }}" class="form-control" required>
        @error('kilometer_age') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Transmission</label>
        <select name="transmission" class="form-select" required>
            <option value="">Select</option>
            @foreach(['manual', 'automatic'] as $option)
                <option value="{{ $option }}" {{ old('transmission', $car->transmission ?? '') == $option ? 'selected' : '' }}>
                    {{ ucfirst($option) }}
                </option>
            @endforeach
        </select>
        @error('transmission') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Fuel Type</label>
        <select name="fuel_type" class="form-select" required>
            <option value="">Select</option>
            @foreach(['petrol','diesel','electric','hybrid'] as $option)
                <option value="{{ $option }}" {{ old('fuel_type', $car->fuel_type ?? '') == $option ? 'selected' : '' }}>
                    {{ ucfirst($option) }}
                </option>
            @endforeach
        </select>
        @error('fuel_type') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Condition</label>
        <select name="condition" class="form-select" required>
            @foreach(['new','used'] as $option)
                <option value="{{ $option }}" {{ old('condition', $car->condition ?? '') == $option ? 'selected' : '' }}>
                    {{ ucfirst($option) }}
                </option>
            @endforeach
        </select>
        @error('condition') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Engine</label>
        <input type="text" name="engine" value="{{ old('engine', $car->engine ?? '') }}" class="form-control" required>
        @error('engine') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Color</label>
        <input type="text" name="color" value="{{ old('color', $car->color ?? '') }}" class="form-control" required>
        @error('color') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $car->price ?? '') }}" class="form-control" required>
        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4" required>{{ old('description', $car->description ?? '') }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    @if(isset($car))
    <div class="col-md-4">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            @foreach(['pending','approved','sold','rejected'] as $option)
                <option value="{{ $option }}" {{ old('status', $car->status ?? '') == $option ? 'selected' : '' }}>
                    {{ ucfirst($option) }}
                </option>
            @endforeach
        </select>
        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    @endif
</div>

        
        

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update car</button>
    </form>
</div>
@endsection
@section('js')
@endsection