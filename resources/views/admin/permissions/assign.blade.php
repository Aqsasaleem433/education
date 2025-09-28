@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Assign Permissions to {{ $role->name }}</h1>
    <form action="{{ route('admin.role.assign.permissions', $role) }}" method="POST">
        @csrf
        <div class="mb-3">
            @foreach($permissions as $perm)
                <div class="form-check">
                    <input type="checkbox" name="permissions[]" value="{{ $perm->id }}"
                           class="form-check-input"
                           {{ $role->permissions->contains($perm->id) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $perm->name }}</label>
                </div>
            @endforeach
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
