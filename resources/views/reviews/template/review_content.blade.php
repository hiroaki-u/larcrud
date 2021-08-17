<div class="book-review-box">
  <div class="review-content">
    <a href="{{ route('review-detail', [$review->id]) }}">
      <div class="flex mb-3">
        <div> 
        @if(!empty($review->reviewer->user_image))
          <img src="storage/user_image/{{$review->reviewer->user_image}}" class="user-image" alt="">
        @else
          <img src="../images/default.png" class="user-image" alt="">
        @endif()
        </div>
        <p class="thin-font pt-2 pl-2">{{ $review->reviewer->name }}</p>
      </div>
      <div class="review-content-detail flex">
        <div class="review-content-image">
          <img src="{{ $review->reviewedBook->image_url }}" class="book-image" alt="">
        </div>
        <div class="pl-3">
          <p class="mb-1">{{ $review->reviewedBook->title }}</p>
          <p class="thin-font txt-xxs txt-author">{{ $review->reviewedBook->author }}</p>
          <p class="sentence-font margin-0">{!! nl2br(e($review->content)) !!}</p>
        </div>
      </div>
    </a>
  </div>
  <div class="review-sub mt-2">
    <div class="flex">
      <div class="favo-comment"></div>
    </div>
    <small class="text-muted">{{ $review->created_at }}</small>
  </div>
</div>