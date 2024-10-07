@if (is_flash('success'))
    <div class="alert alert-success mt-2 mb-2">
        {{ flash('success') }}
    </div>
@endif

@if (is_flash('danger'))
    <div class="alert alert-danger mt-2 mb-2"">
        {{ flash('danger') }}
    </div>
@endif

@if (is_flash('warning'))
    <div class="alert alert-warning mt-2 mb-2">
        {{ flash('warning') }}
    </div>
@endif
