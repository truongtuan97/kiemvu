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
                            <input id="login-name" type="text" class="input-kv" name="login-name" required
                                placeholder="Tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <input id="login-password" type="password" class="input-kv" name="login-password" required
                                placeholder="Mật khẩu">
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
                    <a href="{{ route('accountInfo', Auth::user()->id) }}">Thông Tin Tài Khoản</a> | <a
                        href="{{ route('logout') }}">Thoát</a>
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