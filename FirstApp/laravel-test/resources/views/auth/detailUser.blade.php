@extends('dashboard')
@section('content')
<div class="container">
    <h1 style="text-align: center;">Chi tiết User</h1>
    <div class="row">
        <div class="col-md-6">
            <img  src="{{ asset($user->Images) }}" alt="Avatar" style="max-width: 400px; max-height: 400px;">
        </div>
        <div class="col-md-6" style="margin-top: 30px">
            <p style="font-size: 20px;"><strong>Name:</strong> {{ $user->name }}</p>
            <p style="font-size: 20px;"><strong>Email:</strong> {{ $user->email }}</p>
            <p style="font-size: 20px;"><strong>Phone Number:</strong> {{ $user->PhoneNumber }}</p>
        </div>
    </div> 
</div>
@endsection