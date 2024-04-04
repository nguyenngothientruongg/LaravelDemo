@extends('dashboard')
@section('content')
<div class="container">
    <h1>Danh sách User</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('auth.detailUser', $user->id) }}" style="text-decoration: none;">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->PhoneNumber }}</td>
                <td>
                    @if($user->Images)
                        <img  src="{{ asset($user->Images) }}" alt="Avatar" style="max-width: 100px; max-height: 100px;">
                    @else
                        <p>No avatar found.</p>
                    @endif
                </td>
                <td>
                    <a href="{{ route('auth.editUser', $user->id) }}">Edit</a> | 
                        <form action="{{ route('auth.index', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="position: fixed; bottom: 20px; margin-left: 38%"> {{ $users->links('custom-pagination') }} </div>  
</div>
@endsection