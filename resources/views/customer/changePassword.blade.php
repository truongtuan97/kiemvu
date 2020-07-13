@extends('layouts.app')

@section('content')
@include('partials/left-panel')
<div class="col-right">
    <div class="list-news-archive">
        <h4 class="title-news"></h4>
        <div class="info-user">
            @include('partials/user-menu')
            <div class="info-right">
                <h4>Đổi mật khẩu</h4>
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
                    <form method="post" action="{{route('changePassword', $user)}}">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <div class="input-lock">
                                <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới">
                                <p class="color-blue">*(Ít nhất chứa 6 ký tư - khuyến nghị nên tránh những mật khẩu dễ đoán)
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-lock">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Nhập lại mật khẩu mới">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-lock">
                                <input type="email" name="email" class="form-control" placeholder="Nhập email"
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
