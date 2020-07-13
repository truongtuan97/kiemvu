@extends('layouts.app')

@section('content')
@include('partials/left-panel')
<div class="col-right">
    <div class="list-news-archive">
        <h4 class="title-news"></h4>
        <div class="info-user">
            @include('partials/user-menu')
            <div class="info-right">
                <h4>Nạp card</h4>
                <div class="change-pass">
                      @if (session('alert'))
                      @if (session('alert') == 'success')
                      <div class="alert alert-success mb-2" role="alert">
                        Update success.
                      </div>
                      @endif
                      @if (session('alert') == 'status1')
                      <div class="alert alert-danger mb-2" role="alert">
                        <strong>Thẻ vừa nạp, vui lòng chờ 15 phút rồi kiểm tra lịch sử nạp thẻ.</strong>
                      </div>
                      @endif
                      @if (session('alert') == 'status2')
                      <div class="alert alert-danger mb-2" role="alert">
                        <strong>Thẻ lỗi, vui lòng kiểm tra lại mã PIN hoặc Serial.</strong>
                      </div>
                      @endif
                      @if (session('alert') == 'status3')
                      <div class="alert alert-danger mb-2" role="alert">
                        <strong>Quá trình nạp card đang được xử lý, vui lòng kiểm tra lịch sử nạp card, hoặc liên hệ với fanpage nếu sau 30 phút chưa nhận được tiền.</strong>
                      </div>
                      @endif
                    @endif
                    <form method="post" action="{{route('user.napcard.update', $user)}}">
                        @csrf
                        <div class="form-group">
                            <div class="">
                              <select name="cardType" id="cardType" class="form-control">
                                <option value="" selected disabled >Loại thẻ</option>
                                @foreach($cardTypes as $cardType)
                                <option value="{{ $cardType->value }}">{{ $cardType->option }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                              <select name="cardInfo" id="cardInfo" class="form-control">
                                <option value="" selected disabled >Số tiền</option>
                                @foreach($cardInfos as $cardInfo)
                                <option value="{{ $cardInfo->value }}">{{ $cardInfo->option }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-lock">
                                <input type="text" name="pin" class="form-control" placeholder="PIN"
                                    value="{{ old('pin') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-lock">
                                <input type="text" name="serial" class="form-control" placeholder="Serial"
                                    value="{{ old('serial') }}">
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
