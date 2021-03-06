@extends('layouts.app')

@section('title')
レビューリスト
@endsection

@section('content')

<div class="container mb-5">
  <div class="text-center">
    <div class="headline mt-5 mb-5">
      <p class="txt-l margin-0"> 全てのレビュー</p>
    </div>
  </div>
  <div class="book_review_boxs">
  @foreach($reviews as $review)
    @include('reviews.template.review_content', ['review'=>$review, 'user'=>$review->reviewer])
  @endforeach
  </div>
    <div class="d-flex justify-content-center">
      {{ $reviews->withQueryString()->links() }}
    </div>
</div>

@endsection