@extends('layouts.app')

@section('title')
レビューの編集
@endsection

@section('content')

<div class="modal-content">                                                                        
  <div class="modal-header">
    <p class="txt-m m-0">レビューを編集</p>
  </div>
  <div class="modal-form">
    <form action="{{ route('review-edit', [$book->isbn, $review->id]) }}" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{ $review->id }}">
    @include('reviews.template.review_post_content', ['book'=>$review->reviewedBook])
    </form>
  </div>
</div>

@endsection