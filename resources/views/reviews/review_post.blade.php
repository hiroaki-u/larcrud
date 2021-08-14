@extends('layouts.app')

@section('title')
レビューの投稿
@endsection

@section('content')


<div class="modal-content">                                                                        
  <div class="modal-header">
    <p class="txt-m m-0">レビューを投稿/p>
  </div>
  <div class="modal-form">
  <form action="{{ route('review.review-post', [$book->isbn]) }}" method="POST">
    @csrf
    </form>
  </div>
  <!-- component範囲 -->
</div>
@endsection