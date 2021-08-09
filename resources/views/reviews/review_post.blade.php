@extends('layouts.app')

@section('title')
レビューの投稿
@endsection

@section('content')

  <div class="modal-content">                                                                        
    <div class="modal-header">
      <p class="txt-m m-0">レビュー</p>
    </div>
    <!-- この部分はeditでも用いるためcomponent化したほうが良いかも（routeが異なるので、route以下かな） -->
    <div class="modal-form">
      <form action="{{ route('review-post') }}" method="POST">
        @csrf
        <div class="p-4">
          <textarea name="content" class="p-2 modal-textarea" id="review-textarea" placeholder="ここにレビューを記載してください（1200文字以内）" rows="10" value=""></textarea>
        </div>
          <input type="hidden" name="" value="">
          <!-- <%= f.hidden_field :book_id, value: @book.isbn %> -->

        <div class="bg-gray review-submit text-center p-3">
          <input type="submit" class="review-submit-btn txt-xs">
        </div>
      </form>
    </div>
    <!-- component範囲 -->
</div>
@endsection