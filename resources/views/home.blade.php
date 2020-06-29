@extends('layouts.app')

@section('content')
<div class="col-left">
    <div class="widget-box">
        <a href="javascript:;" class="btn-play">
            <img src="assets/images/btn-play.gif">
        </a>
        <div class="group-flex d-flex">
            <a href="#" class="btn-hover">
                <img src="assets/images/btn-dangky.png">
            </a>
            <a href="#" class="btn-hover">
                <img src="assets/images/btn-napthe.png">
            </a>
        </div>
        <div class="login-form d-flex">
            <form method="POST" id="loginForm" style="display: inherit;">
                @csrf
                <div class="lg-left">                
                    <div class="form-group">                        
                        <input id="name" type="tẽt" class="input-kv" name="name" required placeholder="Tên đăng nhập">
                    </div>
                    <div class="form-group">                        
                        <input id="password" type="password" class="input-kv" name="password" required placeholder="Mật khẩu">
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <span>Có thể đăng nhập bằng</span>
                        <div>
                            <a href="#"><img src="assets/images/login-fb.png"></a>
                            <a href="#"><img src="assets/images/login-gg.png"></a>
                        </div>
                    </div>                
                </div>
                <!--lg-left-->
                <div class="lg-right">
                    <button type="submit">
                        <img class="btn-hover" src="assets/images/btn-dangnhap.png">
                    </button>                
                </div>
            </form>
        </div>
        <div class="server-list">
            <h4>Danh Sách máy chủ</h4>
            <ul class="list-sv d-flex flex-wrap justify-content-between">
                <li class="new-sv">
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
                <li>
                    <a href="#">KIẾM VŨ 1</a>
                </li>
            </ul>
            <div class="pagenavi">
                <ul class="d-flex justify-content-between align-items-center">
                    <li class="first">
                        <a href="#"><img src="assets/images/navi-first.png"></a>
                    </li>
                    <li>
                        <a href="#">10 - 20</a>
                    </li>
                    <li>
                        <a href="#">20 - 30</a>
                    </li>
                    <li>
                        <a href="#">30 - 40</a>
                    </li>
                    <li>
                        <a href="#">50 - 60</a>
                    </li>
                    <li class="last">
                        <a href="#"><img src="assets/images/navi-last.png"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="box-tinhnang">
            <ul class="d-flex flex-wrap justify-content-between">
                <li>
                    <a href="#"><img src="assets/images/tn-giftcode.png"></a>
                </li>
                <li>
                    <a href="#"><img src="assets/images/tn-fanpage.png"></a>
                </li>
                <li>
                    <a href="#"><img src="assets/images/tn-dieukhoan.png"></a>
                </li>
                <li>
                    <a href="#"><img src="assets/images/tn-tinhnang.png"></a>
                </li>
            </ul>
        </div>
        <div class="box-fanpage">
            <iframe
                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkiemvupk&tabs&width=270&height=196&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=231636727608425"
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
    <div class="Rslider">
        <img src="assets/images/slider-1.png">
    </div>
    <!--Rslider-->
    <div class="Rnextop">
        <div class="Rnews">
            <div class="news-tab-menu">
                <ul id="news-tab" class="d-flex">
                    <li class="active">
                        <a data-href="#news-box" href="javascript:void(0)">Tin Tức</a>
                    </li>
                    <li>
                        <a data-href="#event-box" href="javascript:void(0)">Sự Kiện</a>
                    </li>
                </ul>
                <!--news-tab-->
                <div class="more-list">
                    <a href="#"><img src="assets/images/ic-more.png"></a>
                </div>
            </div>
            <div class="tab-content" id="news-content">
                <div class="tab-pane fade show active" id="news-box">
                    <div class="feature-news d-flex">
                        <div class="ft-thumb">
                            <img src="assets/images/img-news.png">
                        </div>
                        <div class="ft-content">
                            <h3><a href="">Sự Kiện Nạp Xu Hàng Ngày 12/5 - 18/5</a></h3>
                            <p>Trong thời gian diễn ra sự kiện, người h...</p>
                            <a href="" class="read-more">Xem Thêm</a>
                        </div>
                    </div>
                    <ul>
                        <li class="d-flex align-items-center">
                            <label>Tin Tức</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <label>Tin Tức</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <label>Tin Tức</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <label>Tin Tức</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <label>Tin Tức</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <div class="news-more text-right">
                            <a href="#" class="read-more">Xem thêm</a>
                        </div>
                    </ul>
                </div>
                <div class="tab-pane fade show" id="event-box">
                    <div class="feature-news d-flex">
                        <div class="ft-thumb">
                            <img src="assets/images/img-news.png">
                        </div>
                        <div class="ft-content">
                            <h3><a href="">Sự Kiện Nạp Xu Hàng Ngày 12/5 - 18/5</a></h3>
                            <p>Trong thời gian diễn ra sự kiện, người h...</p>
                            <a href="" class="read-more">Xem Thêm</a>
                        </div>
                    </div>
                    <ul>
                        <li class="d-flex align-items-center">
                            <label>Sự Kiện</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <label>Sự Kiện</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <label>Sự Kiện</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <label>Sự Kiện</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <label>Sự Kiện</label>
                            <div class="xlr-content d-flex justify-content-between">
                                <h3><a href="#">Mỗi ngày chỉ có thể nhận được thưởng</a></h3>
                                <span class="meta-date">11 - 05</span>
                            </div>
                        </li>
                        <div class="news-more text-right">
                            <a href="#" class="read-more">Xem thêm</a>
                        </div>
                    </ul>
                </div>
            </div>
            <!--news-content-->
        </div>
        <!--Rnews-->
        <div class="R-topuser">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nhân vật</th>
                        <th scope="col">Lực chiến</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="ctop1">1.HTiGon-S613</th>
                        <td class="ctop1">56.211.866</td>
                    </tr>
                    <tr>
                        <th scope="row" class="ctop2">2.HTiGon-S613</th>
                        <td class="ctop2">56.211.866</td>
                    </tr>
                    <tr>
                        <th scope="row" class="ctop3">3.HTiGon-S613</th>
                        <td class="ctop3">56.211.866</td>
                    </tr>
                    <tr>
                        <th scope="row">4.HTiGon-S613</th>
                        <td>56.211.866</td>
                    </tr>
                    <tr>
                        <th scope="row">5.HTiGon-S613</th>
                        <td>56.211.866</td>
                    </tr>
                    <tr>
                        <th scope="row">6.HTiGon-S613</th>
                        <td>56.211.866</td>
                    </tr>
                    <tr>
                        <th scope="row">7.HTiGon-S613</th>
                        <td>56.211.866</td>
                    </tr>
                    <tr>
                        <th scope="row">8.HTiGon-S613</th>
                        <td>56.211.866</td>
                    </tr>
                    <tr>
                        <th scope="row">9.HTiGon-S613</th>
                        <td>56.211.866</td>
                    </tr>
                    <tr>
                        <th scope="row">10.HTiGon-S613</th>
                        <td>56.211.866</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--R-topuser-->
    </div>
    <!--Rnextop-->
    <div class="clear"></div>
    <div class="R-character">
        <ul id="char-tab" class="d-flex justify-content-between">
            <li class="active"><a class="Ctab-1" data-href="#character-1" href="javascript:void(0)"
                    title="Chiến Kỵ">Chiến Kỵ</a></li>
            <li><a class="Ctab-2" data-href="#character-2" href="javascript:void(0)" title="Thần Binh">Thần
                    Binh</a></li>
            <li><a class="Ctab-3" data-href="#character-3" href="javascript:void(0)" title="Tiên Dực">Tiên
                    Dực</a></li>
            <li><a class="Ctab-4" data-href="#character-4" href="javascript:void(0)" title="Pháp Khí">Pháp
                    Khí</a></li>
            <li><a class="Ctab-5" data-href="#character-5" href="javascript:void(0)" title="Linh Vũ">Linh
                    Vũ</a></li>
            <li><a class="Ctab-6" data-href="#character-6" href="javascript:void(0)" title="La Ma">La Ma</a>
            </li>
            <li><a class="Ctab-7" data-href="#character-7" href="javascript:void(0)" title="Kiếm Vũ">Kiếm
                    Vũ</a></li>
            <li><a class="Ctab-8" data-href="#character-8" href="javascript:void(0)" title="Linh Sủng">Linh
                    Sủng</a></li>
        </ul>
        <div class="tab-content" id="character-content">
            <div class="tab-pane fade show active" id="character-1">
                <ul class="owl-carousel owl-theme" data-items="3" data-nav="false" data-dots="false"
                    data-autoplay="false" data-speed="1000" data-autotime="6000">
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/9.gif">
                        <h4>Ma - Đinh Hoàng</h4>
                        <p>Bậc 9</p>
                    </li>
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/8.gif">
                        <h4>Hồng Diệm Long</h4>
                        <p>Bậc 8</p>
                    </li>
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/7.gif">
                        <h4>Tử Yên Loan</h4>
                        <p>Bậc 7</p>
                    </li>
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/9.gif">
                        <h4>Xích Diệm Lân</h4>
                        <p>Bậc 6</p>
                    </li>
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/8.gif">
                        <h4>Thanh Huyền Quy</h4>
                        <p>Bậc 5</p>
                    </li>
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/7.gif">
                        <h4>Ma - Đinh Hoàng</h4>
                        <p>Bậc 9</p>
                    </li>
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/9.gif">
                        <h4>Ma - Đinh Hoàng</h4>
                        <p>Bậc 9</p>
                    </li>
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/9.gif">
                        <h4>Ma - Đinh Hoàng</h4>
                        <p>Bậc 9</p>
                    </li>
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/9.gif">
                        <h4>Ma - Đinh Hoàng</h4>
                        <p>Bậc 9</p>
                    </li>
                    <li>
                        <img src="assets/images/tinh-nang/chien-ky/9.gif">
                        <h4>Ma - Đinh Hoàng</h4>
                        <p>Bậc 9</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="R-bottom-slider">
        <ul class="owl-carousel owl-theme" data-items="2" data-nav="true" data-margin="15" data-dots="false"
            data-autoplay="false" data-speed="1000" data-autotime="6000">
            <li><a href="#"><img src="assets/images/slider-bt-1.png"></a></li>
            <li><a href="#"><img src="assets/images/slider-bt-2.png"></a></li>
            <li><a href="#"><img src="assets/images/slider-bt-1.png"></a></li>
            <li><a href="#"><img src="assets/images/slider-bt-2.png"></a></li>
        </ul>
    </div>
</div>
@endsection