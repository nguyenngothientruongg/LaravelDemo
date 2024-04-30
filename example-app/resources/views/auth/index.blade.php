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
                <th>Interest</th>
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->PhoneNumber }}</td>
                <td>{{ $user->Interest }}</td>
                <td>
                    @if($user->Images)
                        <img  src="{{ asset($user->Images) }}" alt="Avatar" style="max-width: 100px; max-height: 100px;">
                    @else
                        <p>No avatar found.</p>
                    @endif
                </td>
                <td>
                    <a href="{{ route('auth.detailUser', $user->id) }}" class="button-link" >View</a> |
                    <a href="{{ route('auth.editUser', $user->id) }}" class="button-link" >Edit</a> | 
                        <form action="{{ route('auth.deleteUser', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button style="text-decoration: none;" type="submit" class="button-link" onclick="return confirm('Bạn có muốn xoá User này?')">Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('custom-pagination') }}
</div>
@endsection