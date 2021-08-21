<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;

class ReviewController extends Controller
{
    // レビューのリストを表示
    public function showReviewlist(){
        $reviews = Review::with(['reviewedBook', 'reviewer'])->orderBy('updated_at', 'desc')->paginate(6);
        return view('reviews.review-list', compact('reviews'));
    }
    // トップページの表示
    public function showTopPage(){
        $reviews = Review::with(['reviewedBook', 'reviewer'])->orderBy('updated_at', 'desc')->limit(4)->get();
        return view('home', compact('reviews'));
        
    }

    // レビューの投稿
    public function postReviewForm(Book $book){
        $user = Auth::user();
        return view('reviews.review_post', compact('book', 'user'));
    }

    // レビューの投稿ページ
    public function postReview(ReviewRequest $request, Book $book){
        $user = Auth::user();

        $review = new Review();
        $review->user_id = $user->id;
        $review->content = $request->input('content');
        $review->book_id = $request->input('book_id');
        $review->save();

        return redirect('/');
    }

    // レビューの編集
    public function editReview(ReviewRequest $request){
        $user = Auth::user();
        $review = Review::find($request->id);

        $review->content = $request->input('content');
        $review->save();

        return redirect('/');
    }

    // レビューの編集ページ
    public function editReviewForm(Book $book, Review $review){
        $user = Auth::user();
        return view('reviews.review_edit', compact('review', 'book', 'user'));
    }

    // レビューの詳細ページ
    public function showReviewDetail(Review $review){
        $current_user = Auth::user();
        return view('reviews.review_detail', compact('current_user', 'review'));
    }

    // レビューの削除
    public function deleteReview(Review $review){
        $review->delete();

        return redirect('/');
    }
}
