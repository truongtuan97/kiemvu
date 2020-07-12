@extends('layouts.app')

@section('content')
@include('partials/left-panel')
<div class="col-right">
    <div class="list-news-archive">
        <h4 class="title-news"></h4>
        <div class="info-user">
            <div class="info-left">
                <ul>
                    <li class="active">
                        <a href="#">
                            <div class="irleft">
                                <img src="{{ asset('assets/images/ic-user.png') }}">
                            </div>
                            <div class="iri">
                                <h5>Thông tin tài khoản</h5>
                                <p>Quản lý thông tin dùng đăng nhập</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="irleft">
                                <img src="{{ asset('assets/images/ic-user-double.png') }}">
                            </div>
                            <div class="iri">
                                <h5>Lịch sử giao dịch</h5>
                                <p>Xem lịch sử nạp tiền vào game</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('changePassword', Auth::user()) }}">
                            <div class="irleft">
                                <img src="{{ asset('assets/images/ic-lock-down.png') }}">
                            </div>
                            <div class="iri">
                                <h5>Đổi mật khẩu</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('changeEmail', Auth::user()) }}">
                            <div class="irleft">
                                <img src="{{ asset('assets/images/ic-lock-on.png') }}">
                            </div>
                            <div class="iri">
                                <h5>Đổi email</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('changePhone', Auth::user()) }}">
                            <div class="irleft">
                                <img src="{{ asset('assets/images/ic-lock-on.png') }}">
                            </div>
                            <div class="iri">
                                <h5>Đổi số điện thoại</h5>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="info-right">
                <h4>Đổi email</h4>
                <div class="change-pass">
                    @if (session('alert'))
                    @if (session('alert') == 'success')
                    <div class="alert alert-success mb-2" role="alert">
                        Update success.
                    </div>
                    @endif
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger mb-2" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </div>
                    @endif
                    <form method="post" action="{{route('changeEmail', $user)}}">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <div class="input-lock">
                                <input type="email" name="email_old" class="form-control" placeholder="Nhập email cũ"
                                    value="{{ old('email_old') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-lock">
                                <input type="email" name="email" class="form-control" placeholder="Nhập email mới"
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-lock">
                                <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại"
                                    value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="kv-button text-uppercase">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
