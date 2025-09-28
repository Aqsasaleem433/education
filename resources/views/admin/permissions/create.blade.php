@extends('layout.master')

@section('content')
<div class="container">
    <h1>Create Permission</h1>
    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Permission Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="guard_name" class="form-label">Guard Name</label>
            <input type="text" name="guard_name" id="guard_name" class="form-control" value="{{ old('guard_name', 'web') }}" required>
        </div>

        <button class="btn btn-primary">Create</button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
