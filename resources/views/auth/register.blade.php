@extends('layouts.app_content')

@section('title')
会員登録
@endsection

@section('content')
<div class="text-center">
  <p class="txt-xl headline mb-5 mt-5">会員登録</p>
</div>

<div class="row mb-5">                                                                           
  <div class="offset-sm-2 col-sm-8">
  <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-item flex">
        <label for="name" class="form-label">{{ __('名前') }}</label>
        <input type="text" id="name" class="form-input @error('name') is-valid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="名前を入力してください">
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
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
      <div class="form-group mt-5">
        <button type="submit" class="btn btn-block btn-secondary">
          {{__('会員登録')}}
        </button>
      </div>
      <div>
        <p>すでに会員登録が済んでいる方は<a class="text-primary" href="{{ route('login') }}">こちら</a></p>
      </div>
    </form>
  </div>
</div>
@endsection
<!-- ここからはデフォルトのコード
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

