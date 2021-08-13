<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class ReviewController extends Controller
{
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

        return redirect('/home');
    }

    public function editReviewForm(){

    }

    public function editReview(){

    }

    public function showReviewDetail(){

    }

    public function deleteReview(){

    }
}
