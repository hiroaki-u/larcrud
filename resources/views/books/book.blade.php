@extends('layouts.app')

@section('title')
詳細ページ
@endsection

@section('content')

<div class="container mt-5 mb-5">
  <div class="flex">
    <div class="md-none">
      <img src="{{ $book->image_url }}" class="book-image-l" alt="">
    </div>
    <div class="ml-4 mt-2">
      <p class="txt-m">{{ $book->title }}</p>
      <p class="txt-author txt-xs thin-font">著者名：{{ $book->author }}</p>
      <p class="sentence-font txt-xs">本の概要：<br>{{ $book->item_caption }}</p>
      <div class="md-appear text-center">
      <img src="{{ $book->image_url }}" class="book-image-l" alt="">
      </div>
      <div class="mt-5 flex book-page-btn text-center">
        <div class="mr-3 mb-2">
          <button class="submit-btn post-review-button txt-xs"><a href="{{ route('review-post') }}" class="text-white">レビューを書く</a></button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<!-- 
<div class="bg-gray pb-5">
  <div class="container pt-3">
    <p class="mt-2 ml-2"><b>＜レビュー一覧＞</b></p>
  </div>
  <div class="container book-review-contents">
    <% if @reviews.exists? %>
      <% @reviews.each do |review| %>
        <div class="book-review-content">
          <div class="review-content">
            <%= link_to book_review_path(review.book, review) do %>
              <div class="flex mb-3">
                <div> 
                  <% if review.user.user_image? %>
                    <%= image_tag(review.user.user_image.url, class: "user-image") %>
                  <% else %>
                    <%= image_tag("user_default.png", class: "user-image") %>
                  <% end %>
                </div>
                <p class="thin-font pt-2 pl-2"><%= review.user.name %></p>
              </div>
              <div class="review-content-detail">
                <%= simple_format(strip_tags(review.content).truncate(60), class:"thin-font margin-0") %>
              </div>
            <% end %>
          </div>
          <div class="review-sub mt-2">
            <div class="flex">
              <div class="favo-comment favorite_buttons_<%= review.id %>"><%= render "favorites/favorite_button", review: review %></div>
              <div class="favo-comment pl-1"><i class="far fa-comment fa-lg"></i><small class="subscript"><%= review.comments.count %></small></div>
            </div>
            <small class="text-muted"><%= time_ago_in_words(review.updated_at).upcase %>前</small>
          </div>
        </div>
      <% end %>
    <% else %>
      <p class="ml-2">レビューはまだありません。</p>
    <% end %>
    <%= paginate @reviews %>
  </div>
</div>
<%= render "reviews/review_new" %> -->