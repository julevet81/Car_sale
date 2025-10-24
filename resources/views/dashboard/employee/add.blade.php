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

                    <!-- User ID Field -->
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            <option value="" disabled selected>Select a user</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
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