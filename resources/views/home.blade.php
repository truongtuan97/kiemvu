@extends('layouts.app')

@section('content')
<div class="col-left">
    <div class="widget-box">
        @guest
        <a href="javascript:;" class="btn-play">
        @else     
        <a href="javascript:;" class="">
        @endguest
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
        @else
        <!--login-ready-->
        <div class="login-ready">
            <div class="d-flex justify-content-between">
                <div class="rleft">
                    <div class="avt">
                        <img src="assets/images/avatar.png">
                    </div>
                    <div class="rinfo">
                        <span>Xin chào:</span>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <div class="right">
                    <a href="#"><img src="assets/images/btn-select-server.png"></a>
                </div>
            </div>
            <div class="menu-account">
                <a href="#">Thông Tin Tài Khoản</a> | <a href="{{ route('logout') }}">Thoát</a>
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
    <div class="list-news-archive">
        <h4 class="title-news"></h4>
        <div class="server-list-kv">
            <div class="news-server">
                <div class="title-sv">Máy Chủ Mới</div>
                <ul class="list-sv d-flex flex-wrap justify-content-between">                                    
                    @guest
                    @if (!is_null($lastElement))
                    <li class="new-sv">
                        <a href="javascript:;" class="btn-play">{{ $lastElement["name"] }}</a>
                    </li>
                    @endif
                    @if (!is_null($beforeLastElement))
                    <li class="new-sv">
                        <a href="javascript:;" class="btn-play">{{ $beforeLastElement["name"] }}</a>
                    </li>
                    @endif
                    @else
                    @if (!is_null($lastElement))
                    <li class="new-sv">
                        <a href="play-game/{{ $lastElement['server_id'] }}">{{ $lastElement["name"] }}</a>
                    </li>
                    @endif
                    @if (!is_null($beforeLastElement))
                    <li class="new-sv">
                        <a href="play-game/{{ $beforeLastElement['server_id'] }}">{{ $beforeLastElement["name"] }}</a>
                    </li>
                    @endif
                    @endguest                    
                </ul>
            </div>
            <div class="has-play">
                <span>Máy chủ đã chơi</span>
                <select name="" id="playedServerList" class="form-control" onchange="gotoPlayGameWithSelectedServer()">
                    <!-- <option value="">Kiếm vũ S1</option>
                    <option value="">Kiếm vũ S1</option>
                    <option value="">Kiếm vũ S1</option>
                    <option value="">Kiếm vũ S1</option>
                    <option value="">Kiếm vũ S1</option> -->
                    <option value="" selected disabled >Máy chủ đã chơi</option>
                    @if (!empty($playedServer))
                        @foreach ($playedServer as $id)
                            <option value="{{ $id }}">Kiếm vũ {{ $id }}</option>
                        @endforeach
                    @endif
                </select>
                @guest
                <button class="btn-play-now">Chơi Ngay</button>
                @else
                <button class="btn-play-now" onclick="gotoPlayGameWithSelectedServer()">Chơi Ngay</button>
                @endguest
            </div>
            <div class="server-hot">
                <div class="title-sv">Máy Chủ Hot</div>
                <ul id="server-tab" class="d-flex">
                    @php
                        $loopCount = intdiv(count($arrayFiltered), 21);
                        $numOfElement = count($arrayFiltered);
                        if (count($arrayFiltered) % 21 != 0)
                            $loopCount += 1;
                    @endphp                    
                    @for ($i=1; $i <= $loopCount; $i++)
                        @if ($i == 1)
                            <li class="active">
                                <a data-href="#sv-{{ $i }}" href="javascript:void(0)">Cụm {{ $i }}</a>
                            </li>
                        @else
                            <li>
                                <a data-href="#sv-{{ $i }}" href="javascript:void(0)">Cụm {{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                </ul><!--news-tab-->
                <div class="tab-content" id="server-content">
                    @for ($i=1; $i <= $loopCount; $i++)
                        @if ($i == 1)
                        <div class="tab-pane fade show active" id="sv-{{ $i }}">
                            <ul class="sv-cum-list d-flex flex-wrap justify-content-between">
                                @if ($numOfElement >= 21)
                                    @for ($j=20; $j >= 0; $j--)
                                        @guest
                                        <li>
                                            <a href="javascript:;" class="btn-play">{{ $arrayFiltered[$numOfElement - $j]['name'] }}</a>
                                        </li>
                                        @else
                                        <li>                                
                                            <a href="play-game/{{ $arrayFiltered[$numOfElement - $j]['server_id'] }}">
                                                {{ $arrayFiltered[$numOfElement - $j]['name'] }}
                                            </a>
                                        </li>
                                        @endguest
                                    @endfor
                                @else
                                    @for ($j=$numOfElement -1; $j >= 0; $j--)
                                        @guest
                                            <li>
                                                <a href="javascript:;" class="btn-play">{{ $arrayFiltered[$numOfElement - $j]['name'] }}</a>
                                            </li>
                                            @else
                                            <li>                                
                                                <a href="play-game/{{ $arrayFiltered[$numOfElement - $j]['server_id'] }}">
                                                    {{ $arrayFiltered[$numOfElement - $j]['name'] }}
                                                </a>
                                            </li>
                                        @endguest
                                    @endfor
                                @endif
                            </ul>
                        </div>
                        @else
                        <div class="tab-pane fade show" id="sv-{{ $i }}">
                            <ul class="sv-cum-list d-flex flex-wrap justify-content-between">
                                @if ($numOfElement >= 21)
                                    @for ($j=20; $j >= 0; $j--)
                                        @guest
                                        <li>
                                            <a href="javascript:;" class="btn-play">{{ $arrayFiltered[$numOfElement - $j]['name'] }}</a>
                                        </li>
                                        @else
                                        <li>                                
                                            <a href="play-game/{{ $arrayFiltered[$numOfElement - $j]['server_id'] }}">
                                                {{ $arrayFiltered[$numOfElement - $j]['name'] }}
                                            </a>
                                        </li>
                                        @endguest
                                    @endfor
                                @else
                                    @for ($j=$numOfElement - 1; $j >= 0; $j--)
                                        @if (!is_null($arrayFiltered[$numOfElement - $j]))
                                        @guest
                                            <li>
                                                <a href="javascript:;" class="btn-play">{{ $arrayFiltered[$numOfElement - $j]['name'] }}</a>
                                            </li>
                                            @else
                                            <li>                                
                                                <a href="play-game/{{ $arrayFiltered[$numOfElement - $j]['server_id'] }}">
                                                    {{ $arrayFiltered[$numOfElement - $j]['name'] }}
                                                </a>
                                            </li>
                                        @endguest
                                        @endif
                                    @endfor
                                @endif
                            </ul>
                        </div>
                        @endif
                        @php
                            $numOfElement -= 21;
                        @endphp
                    @endfor
                </div>
            </div>
        </div><!--server-list-kv-->	
    </div>
</div>
@endsection