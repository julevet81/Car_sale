@extends('dashboard.layouts.master')
@section('title')
  Edit category
@endsection
@section('css')
@endsection

@section('content')
				
<div class="container">
    <h2>Edit category</h2>
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

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- category Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name', $category->name) }}"
                   class="form-control" required>
        </div>
        {{-- Slug --}} 
          <div class="mb-3">
            <label for="slug" class="form-label">Slug </label>
            <input type="text" class="form-control" id="slug" name="slug"
            value="{{ old('slug', $category->slug) }}" required>
          </div>
          {{-- Description --}}
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description"
            value="{{ old('description', $category->description) }}" required>
          </div>
         
        

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update category</button>
    </form>
</div>
@endsection
@section('js')
@endsection