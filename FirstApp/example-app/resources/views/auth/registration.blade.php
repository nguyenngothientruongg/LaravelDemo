@extends('dashboard')
@section('content')
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Đăng Ký</h3>
                        <div class="card-body">
                            <form action="{{ route('register.custom') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Tên tài khoản" id="name" class="form-control" name="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Mật khẩu" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Nhập lại mật khẩu" id="password_confirmation" class="form-control" name="password_confirmation" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="tel" placeholder="Số điện thoại" id="PhoneNumber" class="form-control" name="PhoneNumber" required>
                                    @if ($errors->has('PhoneNumber'))
                                        <span class="text-danger">{{ $errors->first('PhoneNumber') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    Avatar <input type="file" id="Ảnh" class="form-control" name="Images" enctype="multipart/form-data" required>
                                    @if ($errors->has('Images'))
                                        <span class="text-danger">{{ $errors->first('Images') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember">Lưu Thông Tin</label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection