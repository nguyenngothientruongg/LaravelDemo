@extends('dashboard')
@section('content')
<div class="container">
    <h1 style="text-align: center;">Chi tiết User</h1>
    <div class="row">
        <div class="col-md-6">
            <img  src="{{ asset($user->Images) }}" alt="Avatar" style="max-width: 400px; max-height: 400px;">
        </div>
        <div class="col-md-6" style="margin-top: 30px">
            <p style="font-size: 20px;"><strong>Tên:</strong> {{ $user->profile->first_name}} {{ $user->profile->last_name}}</p>
            <p style="font-size: 20px;"><strong>Giới tính:</strong> {{ $user->profile->sex }}</p>
            <p style="font-size: 20px;"><strong>Số điện thoại:</strong> {{ $user->profile->phone }}</p>
            <p style="font-size: 20px;"><strong>Địa chỉ:</strong> {{ $user->profile->address }}</p>
        </div>
    </div>

    <h3>Danh sách bài viết đã viết</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Decription</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->posts as $posts)
            <tr>
                <td>{{ $posts->post_id }}</td>
                <td>{{ $posts->post_name }}</td>
                <td>{{ $posts->post_description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Danh sách sở thích</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Favorite</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->favorities as $favorite)
            <tr>
                <td>{{ $favorite->favorite_id }}</td>
                <td>{{ $favorite->favorite_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table> 
</div>
@endsection