<div class="card mt-4">
    <div class="card-header">
        <h2 class="card-title fs-4">Delete Account</h2>
    </div>
    <div class="card-body">
        <form action="{{ url('profile.delete') }}" method="POST">
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Delete Account</button>
        </form>
    </div>
</div>
