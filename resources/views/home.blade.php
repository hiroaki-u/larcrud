@extends('layouts.app')

@section('content')
@guest
<div class="topwrapper">
  <div class="concept-message">
    <p class="concept-message-detail md-none txt-m mb-2">本を読んでそのままになっていませんか？</p>
    <p class="concept-message-detail md-none txt-m">本の内容をshareして知識を自分のものにしましょう</p>
  </div>
  <div class="flex topwrapper-logo">
    <img src="images/top_logo.png" class="top_logo-l" alt="">
    <p class="site-title-l sm-none pl-3">Share-read</p>
  </div>
</div>
@else
<div class="topwrapper">
  <p class="txt-xl topwrapper-login-message md-none">shareして本の知識を自分のものに</p>
  <div class="flex topwrapper-logo">
  <img src="images/top_logo.png" class="top_logo-l" alt="">
    <p class="site-title-l sm-none pl-3">Share-read</p>
  </div>
</div>
@endguest
<div class="container review-list mb-5">
  <div class="text-center">
    <div class="headline mt-5 mb-5">
      <p class="txt-l margin-0"> 最近のレビュー</p>
    </div>
    <div class="all-review-btn mt-5">
        <p class="margin-0"><a href="{{ route('review-list') }}"><span class="md-none">全てのレビュー</span><i class="fas fa-chevron-right"></i></a></p>
    </div>
  </div>
  <div class="book_review_boxs">
  @foreach($reviews as $review)
    @include('reviews.template.review_content',['review'=>$review, 'user'=>$review->reviewer])
  @endforeach
  </div>
</div>

@endsection