<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Review;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function shoUser(User $user){
        $current_user = Auth::user();
        $reviews = Review::where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(6);
        return view('users.show_userpage', compact('user', 'current_user', 'reviews'));
    }
    public function editMypageForm(){
        $current_user = Auth::user();
        return view('users.edit_mypage', compact('current_user'));
    }
    public function editMypage(Request $request){
        $current_user = Auth::user();
        $user = User::find($current_user->id);

        $user->gender = $request->input('gender');
        $user->age = $request->input('age');

        // 年齢の保存
        $today_unix = strtotime(date('Y-m-d'));
        $birthday_unix = strtotime($request->input('birthday'));
        $user->age = floor(($today_unix - $birthday_unix)/60/60/24/365);

        // 画像の保存
        $imageName = $this->saveImage($request->file('user_image'));
        $user->user_image = $imageName;

        $user->save();

        return redirect()->back()->with('status', 'ユーザーの情報を更新しました');
    }

    // 画像を保存する
    private function saveImage(UploadedFile $file)
    {
        $tempPath = $this->makeTempPath();
        Image::make($file)->save($tempPath);
        $filePath = Storage::disk('local')->putFile('user_image', new File($tempPath));

        return basename($filePath);
    }

    // ファイルパスを生成
    private function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta   = stream_get_meta_data($tmp_fp);
        return $meta["uri"];
    }
}
