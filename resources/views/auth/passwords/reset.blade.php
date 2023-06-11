@extends('layouts.app')
@section('title')
Login
@endsection
@section('content')
<div class="wrapper-page account-page-full">
  <div class="card shadow-none">
    <div class="card-block">
      <div class="account-box">
        <div class="card-box shadow-none p-4">
          <div class="p-2">
            <div class="text-center mt-4">
              <a href="{{url()->current()}}"><img width="100" src="{{url('public/img/settings/'.Settings()->portal_favicon)}}" alt="logo"></a>
            </div>
            <h4 class="font-size-18 mt-5 text-center">Welcome Back !</h4>
            <p class="text-muted text-center">Enter Password to continue to {{Settings()->portal_name}}.</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-12">
                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function() {


});
</script>
@endsection