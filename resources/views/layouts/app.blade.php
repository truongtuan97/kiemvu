<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kiếm Vũ</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

</head>

<body>
    <div id="wrapper">
        <header id="header">
            <div class="bgtop-nav">
                <div class="top_nav">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="assets/images/ic-home.png"> Trang Chủ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="assets/images/ic-news.png"> Tin Tức
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="assets/images/ic-sukien.png"> Sự Kiện
                            </a>
                        </li>
                        <li class="logo">
                            <a href="#">
                                <img src="assets/images/logo.png">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="assets/images/ic-camnang.png"> Cẩm Nang
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                Cộng Đồng
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <img src="assets/images/ic-hotro.png"> Group
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="video">
                <video width="100%" height="auto" playsinline="" autoplay="" muted="" loop="" __idm_id__="242826241">
                    <source src="assets/images/home-intro.mp4" type="video/mp4">
                </video>
            </div>
        </header>
        <div id="main-content">
            @yield('content')
        </div>
        <div id="popup-login" class="popup-form-account">
            <div class="form-group mt-5">
                <img src="assets/images/title-login.png">
            </div>
            <div class="plogin-form">
                <div class="form-group">
                    <label>Tên tài khoản</label>
                    <div class="input-lock">
                        <input type="text" placeholder="Nhập tên tk">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <div class="input-lock">
                        <input type="password" placeholder="Nhập mật khẩu">
                    </div>
                </div>
                <div class="form-group d-flex align-items-center login-social">
                    <span>Có thể đăng nhập bằng</span>
                    <ul class="d-flex">
                        <li class="social-icon fb-social"><i class="fab fa-facebook-f"></i></li>
                        <li class="social-icon gg-social"><i class="fab fa-google-plus-g"></i></li>
                    </ul>
                </div>
                <div class="form-group">
                    <button class="login-btn">Đăng nhập</button>
                </div>
                <div class="form-group">
                    <button class="register-btn">Đăng Ký Tài Khoản</button>
                </div>
            </div>
        </div>        
        <div id="popup-register" class="popup-form-account">        
            <div class="form-group mt-5 text-center">
                <img src="assets/images/title-dangky.png">
            </div>
            <!-- <form method="POST" action="{{ route('register') }}" id="registerForm"> -->
            <form method="POST" id="registerForm">
                @csrf
                <div class="plogin-form">
                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <div class="input-lock input-user">                            
                            <input id="name" type="text"                                 
                                name="name" value="{{ old('name') }}" required autocomplete="name" 
                                autofocus placeholder="Nhập tên tk">

                            <span class="invalid-feedback" role="alert">
                                <strong id="error-name"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <div class="input-lock">                            
                            <input id="password" type="password" name="password" required placeholder="Nhập mật khẩu mới">

                            <span class="invalid-feedback" role="alert">
                                <strong id="error-password"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <div class="input-lock">                            
                            <input id="password-confirm" type="password" name="password_confirmation" 
                                required placeholder="Nhập lại mật khẩu mới">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-lock input-email">                            
                            <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                required placeholder="Nhập email">
                            
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <div class="input-lock input-phone">                            
                            <input id="phone" type="text"                                 
                                name="phone" value="{{ old('phone') }}" required placeholder="Nhập sđt">

                                <span class="invalid-feedback" role="alert">
                                    <strong>TEST</strong>
                                </span>
                        </div>
                    </div>
                    <div class="form-group">                        
                        <button type="submit" class="login-btn">{{ __('Đăng Ký') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>