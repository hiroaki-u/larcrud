<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// この部分は後ほど、reviewのindexに変更
Route::get('/', function () {
    return view('welcome');
})->name('top');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware('auth')
    ->group(function(){
        Route::get('book-search', [BookController::class, 'bookSearch'])->name('book-search');
        Route::get('books/{book}', [BookController::class, 'bookShowDetail'])->name('book');
    });
Route::middleware('auth')
    ->group(function(){
        Route::get('books/{book}/review-post', [ReviewController::class, 'postReviewForm'])->name('review.review-post');
        Route::post('books/{book}/review-post', [ReviewController::class, 'postReview'])->name('review.review-post');
    });

Route::prefix('review')
    ->middleware('auth')
    ->group(function(){
        Route::get('{review}/review-edit',[ReviewController::class, 'editReviewForm'])->name('review-edit');
        Route::post('{review}/review-edit',[ReviewController::class, 'editReview'])->name('review-edit');
        Route::get('{review}',[ReviewController::class, 'showReviewDetail'])->name('review-detail');
        Route::post('{review}/delete',[ReviewController::class, 'deleteReview'])->name('review-delete');
    });