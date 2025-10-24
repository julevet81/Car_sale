<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
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
            <div class="modal-body">
                <!-- Form for adding a new status -->
                <form action="{{ route('employee.store') }}" method="POST">
                    @csrf

                    <!-- Employee Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Employee Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <!-- Employee Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Employee Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <!-- Employee Position -->
                    <div class="mb-3">
                        <label for="position" class="form-label">Employee Position</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>
                    <!-- Employee Salary -->
                    <div class="mb-3">
                        <label for="salary" class="form-label">Employee Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary" required>
                    </div>

                    <!--Phone Number -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <!--status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <!-- Select Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Employee Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Save employee</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- jQuery script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {
        // --- Client selection ---
        $('#client_id').change(function () {
            const clientId = $(this).val();
            const urlTpl = $(this).data('url-template');

            if (clientId) {
                const url = urlTpl.replace('__CLIENT__', clientId);
                $.getJSON(url, function (data) {
                    $('#email').val(data.email || '');
                });
            }
        });

        // --- employee selection ---
        $('#employee_id').change(function () {
            const employeeId = $(this).val();
            const urlTpl = $(this).data('url-template');

            if (employeeId) {
                const url = urlTpl.replace('__employee__', employeeId);
                $.getJSON(url, function (data) {
                    $('#publication_price').val(data.publication_price || '');
                    $('#weekly_price').val(data.weekly_price || '');
                    $('#update_price').val(data.update_price || '');
                    $('#upload_price').val(data.upload_price || '');
                });
            }
        });
    });
</script>