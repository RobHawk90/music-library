@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" required>
    </div>

    <div class="form-group col-md-4">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" required>
    </div>

    <div class="form-group col-md-4">
        <label for="access">Access Level</label>
        <select name="access" id="access" class="form-control" value="{{ $user->access }}" required>
            <option>Public</option>
            <option>User</option>
            <option>Admin</option>
        </select>
    </div>
</div>

<div class="form-group text-right">
    <button type="submit" class="btn btn-success">Save</button>
</div>

@include('layouts.errors')
