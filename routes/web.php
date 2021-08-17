<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

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
Auth::routes();

// 本の検索ページ
Route::middleware('auth')
    ->group(function(){
        Route::get('book-search', [BookController::class, 'bookSearch'])->name('book-search');
        Route::get('books/{book}', [BookController::class, 'bookShowDetail'])->name('book');
    });

// レビューの編集＆編集
Route::prefix('books')
    ->middleware('auth')
    ->group(function(){
        Route::get('{book}/review-post', [ReviewController::class, 'postReviewForm'])->name('review.review-post');
        Route::post('{book}/review-post', [ReviewController::class, 'postReview'])->name('review.review-post');
        Route::get('{book}/review-edit/{review}',[ReviewController::class, 'editReviewForm'])->name('review-edit');
        Route::post('{book}/review-edit/{review}',[ReviewController::class, 'editReview'])->name('review-edit');
    });

// トップページ
Route::get('/', [ReviewController::class, 'showTopPage'])->name('top');


// レビュー一覧、詳細、削除ページ
Route::prefix('review')
    ->middleware('auth')
    ->group(function(){
        Route::get('review-list', [ReviewController::class, 'showReviewlist'])->name('review-list');
        Route::get('{review}',[ReviewController::class, 'showReviewDetail'])->name('review-detail');
        Route::post('{review}/delete',[ReviewController::class, 'deleteReview'])->name('review-delete');
    });

// ユーザーのページ
Route::middleware('auth')
    ->group(function(){
        Route::get('user-page/{user}', [UserController::class, 'shoUser'])->name('user-page');
        Route::get('mypage/edit', [UserController::class, 'editMypageForm'])->name('edit-mypage');
        Route::post('mypage/edit', [UserController::class, 'editMypage'])->name('edit-mypage');
    });