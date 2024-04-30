@extends('dashboard')
@section('content')
<div class="container">
    <h1>Danh sách Sở thích</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($favorities as $favorite)
            <tr>
                <td>{{ $favorite->favorite_id }}</td>
                <td>{{ $favorite->favorite_name }}</td>
                <td>{{ $favorite->favorite_description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $favorities->links('custom-pagination') }}
</div>
@endsection