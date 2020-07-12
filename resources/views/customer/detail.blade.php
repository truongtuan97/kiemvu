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
                <h4>Thông Tin Tài Khoản</h4>
                <ul class="tk-info">
                    <li><label>Tên đang nhập:</label>
                        <p><b>{{ $user->name}}</b></p>
                    </li>                    
                    <li><label>SDT đăng nhập:</label>
                        <p>{{ $user->phone }}</p>
                    </li>
                    <li><label>Email:</label>
                        <p>{{ $user->email}}</p>
                    </li>                    
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
