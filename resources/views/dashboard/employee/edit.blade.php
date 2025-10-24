@extends('dashboard.layouts.master')
@section('title')
  Edit employee
@endsection
@section('css')
@endsection

@section('content')

    <div class="container">
        <h2>Edit employee</h2>
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

        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- User ID Field -->
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    <option value="" disabled>Select a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $admin->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}
                            ({{ $user->email }})</option>
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
@endsection
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

        // --- Account selection ---
        $('#account_id').change(function () {
            const accountId = $(this).val();
            const urlTpl = $(this).data('url-template');

            if (accountId) {
                const url = urlTpl.replace('__ACCOUNT__', accountId);
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

