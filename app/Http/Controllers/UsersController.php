<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

use Storage;

use App\User;

class UsersController extends Controller
{
//   画像を更新する
    public function update(Request $request, $id)
    {
        // バリデーション
        $this->validate($request, [
            'image' => 'required',
        ]);
        
        $file = $request->file('image');
        // $fileName = time()."jpg";
        // $image = Image::make($file);
        
        // $image->resize(300,null,function($constraint) {
        //     $constraint->aspectRatio();
        // });
        
        // $file_path= 'images';//.$fileName;
        // $image->save(public_path().$file_path);
        // S3に接続
        $path = Storage::disk('s3')->putFile('images', $file, 'public');

       
        // idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
       
        // ログイン中に画像を表示し保存する
        if (\Auth::id() === $user->id) {
            $user->image =$path;
            $user->save();
        }
        return redirect('/');
    }
}
