<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

use Storage;

use App\User;

class UsersController extends Controller
{
   
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'image' => 'required',
        ]);
        
        $file = $request->file('image');
        // $fileName = time()."jpg";
        // $image = Image::make($file);
        
        // $image->resize(300,null,function($constraint) {
        //     $constraint->aspectRatio();
        // });
        
        $file_path= 'images';//.$fileName;
        // $image->save(public_path().$file_path);
        
        $path = Storage::disk('s3')->putFile('/', $file, 'public');

       
        // idの値でメモを検索して取得
        $user = User::findOrFail($id);
       
        // メモを更新する
        if (\Auth::id() === $user->id) {
            $user->image =$path;
            $user->save();
        }
        return redirect('/');
    }
}
