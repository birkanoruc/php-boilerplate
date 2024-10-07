<div class="card mt-4">
    <div class="card-header">
        <h2 class="card-title fs-4">Update Password</h2>
    </div>
    <div class="card-body">
        <form action="{{ url('profile.update.password') }}" method="POST">
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT" />
            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password"
                    value="{{ $input['current_password'] ?? '' }}">
                @if (isset($errors['current_password']))
                    <p class="text-danger">{{ $errors['current_password'] }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password"
                    value="{{ $input['new_password'] ?? '' }}">
                @if (isset($errors['new_password']))
                    <p class="text-danger">{{ $errors['new_password'] }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                    value="{{ $input['confirm_password'] ?? '' }}">
                @if (isset($errors['confirm_password']))
                    <p class="text-danger">{{ $errors['confirm_password'] }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
