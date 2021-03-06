@extends('layouts.admin')

@section('content')
<!-- BEGIN: Content-->
<!-- users view start -->
<section class="users-view">
    <!-- users view media object start -->
    <div class="row">
        <div class="col-12 col-sm-7">
            <div class="media mb-2">
                <a class="mr-1" href="#">
                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-26.png') }}" alt="users view avatar"
                        class="users-avatar-shadow rounded-circle" height="64" width="64">
                </a>
                <div class="media-body pt-25">
                    <h4 class="media-heading">                        
                        {{ $user->cAccName }}
                        </h4>
                    <span>ID:</span>{{ $user->id }}
                </div>
            </div>
        </div>
        <!-- <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
            <a href="#" class="btn btn-sm mr-25 border"><i class="feather icon-message-square font-small-3"></i></a>
            <a href="#" class="btn btn-sm mr-25 border">Profile</a>
            <a href="../../../html/ltr/vertical-menu-template/page-users-edit.html"
                class="btn btn-sm btn-primary">Edit</a>
        </div> -->
    </div>
    <!-- users view media object ends -->
    <!-- users view card data start -->
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form method="post" action="{{route('management.user.update', $user)}}">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="form-group row">
                        <label for="name"
                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="email" value="{{ $user->name }}" required autocomplete="name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="full_name"
                            class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                        <div class="col-md-6">
                            <input id="full_name" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="full_name" value="{{ $user->full_name }}" required autocomplete="full_name">

                            @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password1" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password1" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password1-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- users view card data ends -->
</section>
<!-- users view ends -->
<!-- END: Content-->
@endsection
