@extends('layouts.app')

@section('titel')
MyPageの編集
@endsection

@section('content')

<div class="container mt-4">
  <div class="row">
    <div class="flex col-lg-5">
      <div>
        <img src="../images/{{ $user->user_image }}" alt="" class="profile-image">
      </div>
      <div class="user-detail mt-3 ml-3">
        <p class="txt-m"><b>{{ $user->name }}</b></p>
        <p>年齢：{{ $user->age }} 歳</p>
        <p>性別：{{ $user->gender == 0 ? '男性' : '女性' }}</p>
      </div>
    </div>
    <div class="introduction col-lg-7 mt-4">
      <p><b>自己紹介：</b></p>
    </div>
  </div>
</div>
<div class="container mt-5 mb-3">

@if(!empty($reviews))
  <div class="container mb-5">
    <div class="book_review_boxs">
      @foreach($reviews as $review)
        @include('reviews.template.review_content',['review'=>$review, 'user'=>$user])
      @endforeach
    </div>
    <div class="d-flex justify-content-center">
      {{ $reviews->withQueryString()->links() }}
    </div>
  </div>
@else
  <div class="text-center mt-5 mb-5">
    <p>投稿はまだありません。</p>
  </div>
@endif

</div>

@endsection