<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add car_model</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div>
        
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
      <div class="modal-body">
        <!-- Form for adding a new car_model -->
        <form action="{{ route('car_model.store') }}" method="POST">
          @csrf
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
          
          
          

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save car_model</button>
      </div>
      </form>
    </div>
  </div>
</div>