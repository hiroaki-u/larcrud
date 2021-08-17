<div class="p-4">
  <textarea name="content" class="p-2 modal-textarea" id="review-textarea" placeholder="ここにレビューを記載してください（1500文字以内）" rows="10" value="{{ old('content') }}">@if(!empty($review->content)){{ $review->content }}@endif
  </textarea>
  <input type="hidden" name="user_id" value="{{ $user->id }}">
  <input type="hidden" name="book_id" value="{{ $book->isbn }}">
  @error('content')
    <p class="text-danger">{{ $message }}</p>
  @enderror
</div>
<div class="bg-gray review-submit text-center p-3">
  <input type="submit" class="review-submit-btn txt-xs">
</div>
