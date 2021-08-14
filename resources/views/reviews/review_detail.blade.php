@extends('layouts.app')

@section('title')
レビューの詳細
@endsection

@section('content')


<div class="container">
  <div class="review-detail-box mt-3">
    <div class="flex">
      <div class="mb-3">
        <div> 
          <a href="{{ route('top') }}"><img src="../images/{{ $review->reviewer->user_image }}" class="user-image-l" alt=""></a>
        </div>
        <a href="{{ route('top') }}" class="thin-font txt-xss">{{ $review->reviewer->name }}</a>
      </div>
      <div class="pl-3 review-detail-content">
        <div class="review-detail-head">
          <div class="">
            <a href="{{ route('book', [$review->reviewedBook->isbn]) }}" class="mb-1">{{ $review->reviewedBook->title }}</a>
            <p class="thin-font txt-xxs txt-author">{{ $review->reviewedBook->author }}</p>
          </div>
          <div>
            @if($current_user == $review->reviewer)
              <button class="post-review-button edit-review-btn"><a href="{{ route('review-edit', [$review->id]) }}"><i class="far fa-edit fa-lg"></i></a></button>
              <a href="#">削除ボタン</a><%= link_to [@review.book, @review], method: :delete, data: { confirm: "削除しますか？" }, class: 'ml-2 mr-2' do  %>
                <i class="fas fa-trash fa-lg"></i>
              <% end %>
            @endif
          </div>
        </div>
        <div class="flex-between">
          <div>
            <a href="{{ route('book', [$review->reviewedBook->isbn]) }}"><img src="{{ $review->reviewedBook->image_url }}" class="book-image-l" alt=""></a>
          </div>
          <div>
          <p class="sentence-font pl-3">{!! nl2br(e($review->content)) !!}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="review-sub mt-2">
      <div class="flex">
      </div>
      <small class="text-muted">{{ $review->created_at }}</small>
    </div>
  </div>
</div>
<div class="bg-gray pb-5">
  <div class="container">
    <% if @review.published? %>
      <%= render "comments/comment" %>
    <% end %>
  </div>
</div>

@endsection