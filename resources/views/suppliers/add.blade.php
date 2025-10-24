<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add supplier</h1>
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
        <!-- Form for adding a new supplier -->
        <form action="{{ route('supplier.store') }}" method="POST">
          @csrf
          {{-- supplier Name --}}
          <div class="mb-3">
            <label for="name" class="form-label">supplier Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
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
            <input type="text" class="form-control" id="owner_name" name="owner_name" required>
          </div>
          
          

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save supplier</button>
      </div>
      </form>
    </div>
  </div>
</div>