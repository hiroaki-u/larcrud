@extends('layouts.app')

@section('titel')
MyPageの編集
@endsection

@section('content')

<div class="text-center">
  <p class="txt-xl headline mb-5 mt-5">アカウント設定</p>
</div>

<div class="container">
  <div class="row">
    <div class="col-8 offset-2">
      @if(session('status'))
        {{ session('status') }}
      @endif
    </div>
  </div>
</div>


<div class="row mb-5">                                               
  <div class="offset-sm-2 col-sm-8">
    <form action="{{ route('edit-mypage') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-item flex">
        <label for="name" class="form-label">名前</label>
        <input type="text" class="form-input" name="name" value="{{ $current_user->name }}">
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-item flex">
        <div class="form-label">
          <p class="gender">性別</p>
        </div>
        <div class="form-input">
          <label for="male">男性</label>
          <input type="radio" value=0 name="gender" class="mr-2" id="male" @if($current_user->gender === 0) checked @endif>
          <label for="female">女性</label>
          <input type="radio" value=1 name="gender" class="mr-2" id="female" @if($current_user->gender === 1) checked @endif>
          @error('gender')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-item flex">
        <label for="user_image" class="form-label">ユーザー画像</label>
        <input type="file" name="user_image" class="form-input" id="user_image">
      </div>
      <div class="form-item flex">
        <label for="birthday" class="form-label">生年月日</label>
        <div class="form-input">
          <input type="date" name="birthday">
        </div>
      </div>
      <div class="text-center mt-5">
        <input type="submit" class="new-btn submit-btn">
      </div>
    </form>
  </div>
</div>

@endsection