@extends('layouts.app')

@section('title')
レビューの投稿
@endsection

@section('content')
<div class="container">
<div class="modal-content">                                                                        
  <div class="modal-header">
    <p class="txt-m m-0">レビューを投稿</p>
  </div>
  <div class="modal-form">
    <form action="{{ route('review.review-post', [$book->isbn]) }}" method="POST">
      @csrf
    @include('reviews.template.review_post_content', ['book'=>$book])
    </form>
  </div>
</div>
</div>

@endsection