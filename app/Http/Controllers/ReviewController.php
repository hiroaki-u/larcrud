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

    public function showReviewlist(){
        $reviews = Review::all();
        return view('reviews.review-list', compact('reviews'));
    }
    // トップページの表示
    public function showTopPage(){
        $reviews = Review::all();
        return view('home', compact('reviews'));
    }

    public function postReviewForm(Book $book){
        $user = Auth::user();
        return view('reviews.review_post', compact('book', 'user'));
    }

    public function postReview(ReviewRequest $request, Book $book){
        $user = Auth::user();

        $review = new Review();
        $review->user_id = $user->id;
        $review->content = $request->input('content');
        $review->book_id = $request->input('book_id');
        $review->save();

        return redirect('/');
    }

    public function editReview(ReviewRequest $request){
        $user = Auth::user();
        $review = Review::find($request->id);

        $review->content = $request->input('content');
        $review->save();

        return redirect('/');
    }

    public function editReviewForm(Book $book, Review $review){
        $user = Auth::user();
        return view('reviews.review_edit', compact('review', 'book', 'user'));
    }

    public function showReviewDetail(Review $review){
        $current_user = Auth::user();
        return view('reviews.review_detail', compact('current_user', 'review'));
    }

    public function deleteReview(){

    }
}
