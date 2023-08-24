<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Create User</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">User Image</label>
                <input type="file" name="image" class="form-control-file" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $('input[type="file"]').change(function () {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(file);
        });
    </script>
</body>
Step 6: Create the User Model
1. Run the following command to generate a new model:
```bash
php artisan make:model User