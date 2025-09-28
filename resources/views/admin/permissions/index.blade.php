@extends('layout.master')

@section('content')
<div class="container">
    <h1>Permissions</h1>
    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary mb-3">Create Permission</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Permission Name</th>
                <th>Guard Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permissions as $perm)
                <tr>
                    <td>{{ $perm->name }}</td>
                    <td>{{ $perm->guard_name }}</td>
                    <td>
                        <a href="{{ route('admin.permissions.edit', $perm) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.permissions.destroy', $perm) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this permission?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No permissions found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
