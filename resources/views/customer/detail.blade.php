@extends('layouts.app')

@section('content')
<div class="col-left">
    <div class="widget-box">
        @guest
        <a href="javascript:;" class="btn-play">
        @else     
        <a href="javascript:;" class="">
        @endguest
            <img src="{{ asset('assets/images/btn-play.gif') }}">
        </a>
        <div class="group-flex d-flex">
            <a href="#" class="btn-hover">
                <img src="{{ asset('assets/images/btn-dangky.png') }}">
            </a>
            <a href="#" class="btn-hover">
                <img src="{{ asset('assets/images/btn-napthe.png') }}">
            </a>
        </div>        
        
        @guest
        <div class="login-form d-flex">
            <form method="POST" id="loginForm" style="display: inherit;">
                @csrf
                <div class="lg-left">                
                    <div class="form-group">                        
                        <input id="login-name" type="text" class="input-kv" name="login-name" required placeholder="Tên đăng nhập">
                    </div>
                    <div class="form-group">                        
                        <input id="login-password" type="password" class="input-kv" name="login-password" required placeholder="Mật khẩu">
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <span>Có thể đăng nhập bằng</span>
                        <div>
                            <a href="#"><img src="{{ asset('assets/images/login-fb.png') }}"></a>
                            <a href="#"><img src="{{ asset('assets/images/login-gg.png') }}"></a>
                        </div>
                    </div>                
                </div>
                <!--lg-left-->
                <div class="lg-right">
                    <button type="submit">
                        <img class="btn-hover" src="{{ asset('assets/images/btn-dangnhap.png') }}">
                    </button>                
                </div>
            </form>
        </div>
        @else
        <!--login-ready-->
        <div class="login-ready">
            <div class="d-flex justify-content-between">
                <div class="rleft">
                    <div class="avt">
                        <img src="{{ asset('assets/images/avatar.png') }}">
                    </div>
                    <div class="rinfo">
                        <span>Xin chào:</span>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <div class="right">
                    <a href="#"><img src="{{ asset('assets/images/btn-select-server.png') }}"></a>
                </div>
            </div>
            <div class="menu-account">
                <a href="{{ route('accountInfo', Auth::user()->id) }}">Thông Tin Tài Khoản</a> | <a href="{{ route('logout') }}">Thoát</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <!--login-ready-->
        @endguest
        
        <div class="box-tinhnang">
            <ul class="d-flex flex-wrap justify-content-between">
                <li>
                    <a href="#"><img src="{{ asset('assets/images/tn-giftcode.png') }}"></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('assets/images/tn-fanpage.png') }}"></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('assets/images/tn-dieukhoan.png') }}"></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('assets/images/tn-tinhnang.png') }}"></a>
                </li>
            </ul>
        </div>
        <div class="box-fanpage">
            <iframe
                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhuyenthoaikiemvu&tabs&width=270&height=196&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=231636727608425"
                width="270" height="196" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="box-hotline">
            <a href="#">123356988</a>
        </div>
    </div>
    <!--widget-box-->
</div>
<!--col-left-->
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
                        <a href="#">
                            <div class="irleft">
                                <img src="{{ asset('assets/images/ic-lock-down.png') }}">
                            </div>
                            <div class="iri">
                                <h5>Đổi mật khẩu cấp 1</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="irleft">
                                <img src="{{ asset('assets/images/ic-lock-on.png') }}">
                            </div>
                            <div class="iri">
                                <h5>Đổi mật khẩu cấp 2</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="irleft">
                                <img src="{{ asset('assets/images/ic-lock-on.png') }}">
                            </div>
                            <div class="iri">
                                <h5>Quên mật khẩu cấp 2</h5>
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
