@extends('layouts.app_content')

@section('content')
<div class="text-center">
  <p class="txt-xl headline mb-5 mt-5">{{__('ログイン')}}</p>
</div>

<div class="row mb-5">                                                                           
  <div class="offset-sm-2 col-sm-8">
  <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-item flex">
        <label for="email" class="form-label">{{__('メールアドレス')}}</label>
        <input type="email" id="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus placeholder="メールアドレスを入力してください">
        @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-item flex">
        <label for="password" class="form-label">{{__('パスワード')}}</label>
        <input type="password" id="password" class="form-input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="password" required autofocus placeholder="パスワードを入力してください">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group row mt-3">
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('ログインしたままにする') }}
                </label>
            </div>
        </div>
    </div>
    <div class="form-group mt-5">
        <button type="submit" class="btn btn-block btn-secondary">
          {{__('ログインをする')}}
        </button>
        @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('パスワードを忘れてしまった方はこちら') }}
          </a>
        @endif
      </div>
    </form>
  </div>
</div>
@endsection

<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
