@extends('dashboard')
@section('content')
<div class="container">
    <h1>Danh sách Bài viết</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->post_id }}</td>
                <td>{{ $post->post_name }}</td>
                <td>{{ $post->post_description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links('custom-pagination') }}
</div>
@endsection