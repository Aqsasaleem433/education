@extends('layout.master')

@section('content')
<div class="container">
    <h1>Edit Permission</h1>
    <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Permission Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $permission->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="guard_name" class="form-label">Guard Name</label>
            <input type="text" name="guard_name" id="guard_name" class="form-control" value="{{ old('guard_name', $permission->guard_name) }}" required>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
