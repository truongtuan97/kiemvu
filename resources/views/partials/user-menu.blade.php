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
      @if (empty(Auth::user()->email))
      <li>
          <a href="{{ route('updateInfo', Auth::user()) }}">
              <div class="irleft">
                  <img src="{{ asset('assets/images/ic-lock-down.png') }}">
              </div>
              <div class="iri">
                  <h5>Cập nhật thông tin</h5>
              </div>
          </a>
      </li>
      @endif
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
      <li>
          <a href="{{ route('user.napcard.edit', Auth::user()) }}">
              <div class="irleft">
                  <img src="{{ asset('assets/images/ic-lock-on.png') }}">
              </div>
              <div class="iri">
                  <h5>Nạp card</h5>
              </div>
          </a>
      </li>
  </ul>
</div>