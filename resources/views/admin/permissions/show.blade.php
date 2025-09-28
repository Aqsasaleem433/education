@extends('layout.master')

@section('content')
<div class="container">
    <h1>Permission Details</h1>

    <p><strong>Name:</strong> {{ $permission->name }}</p>
    <p><strong>Guard Name:</strong> {{ $permission->guard_name }}</p>

    <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
