@extends('layouts.app')

@section('content')
@include('partials/left-panel')
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