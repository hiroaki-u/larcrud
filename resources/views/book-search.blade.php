@extends('layouts.app')

@section('title')
本の検索
@endsection

@section('content')
@if(isset($books))
  <div class="container">
    <div class="text-center">
      <div class="headline mb-5 mt-5">
        <p class="txt-l mb-1">『{{ $search_word }}』の検索結果</p>
      </div>
    </div>
      <div class="books_list">
        @foreach($books as $book)
        <div class="partial_book">
          <a href="{{ route('top') }}"><img src="{{ $book['image_url'] }}" class="book-image" alt=""></a>
          <p>{{ $book['title'] }}</p>
        </div>
        @endforeach
      </div>
  </div>
@else
  <div class="container text-center mt-5 mb-5">
    <p>検索結果はありませんでした。</p>
  </div>
@endif
@endsection
