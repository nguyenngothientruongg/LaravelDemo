@extends('dashboard')

@section('content')
    <div class="container">
        <h1>Sửa thông tin</h1>
        <form action="{{ route('auth.updateUser', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group mb-3">
                <label for="email">Phone Number</label>
                <input type="tel" id="PhoneNumber" class="form-control" name="PhoneNumber" value="{{ $user->PhoneNumber }}">
            </div>
            <div class="form-group mb-3">
                Avatar <input type="file" id="Images" class="form-control" name="Images" required>
                @if ($errors->has('Images'))
                    <span class="text-danger">{{ $errors->first('Images') }}</span>
                @endif
            </div>
            <!-- Add other fields for editing -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection