@extends('layouts.app')

@section('content')
@include('partials/left-panel')
<div class="col-right">
    <div class="list-news-archive">
        <h4 class="title-news"></h4>
        <div class="info-user">
            @include('partials/user-menu')
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
