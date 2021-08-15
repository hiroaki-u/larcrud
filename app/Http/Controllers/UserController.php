<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Review;

class UserController extends Controller
{

    public function shoUser(User $user){
        $current_user = Auth::user();
        $reviews = Review::where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(6);
        return view('users.show_userpage', compact('user', 'current_user', 'reviews'));
    }
    public function editMypageForm(){
        return view('suers.edit_mypage');
    }
    public function editMypage(){
        $current_user = Auth::user();
        return redirect('/');
    }
}
