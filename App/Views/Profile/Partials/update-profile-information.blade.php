<div class="card mt-4">
    <div class="card-header">
        <h2 class="card-title fs-4">Update Profile Information</h2>
    </div>
    <div class="card-body">
        <form action="{{ url('profile.update.information') }}" method="POST">
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT" />
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ $input['name'] ?? $user->name }}">
                @if (isset($errors['name']))
                    <p class="text-danger">{{ $errors['name'] }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ $input['email'] ?? $user->email }}">
                @if (isset($errors['email']))
                    <p class="text-danger">{{ $errors['email'] }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
