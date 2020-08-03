<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Memo;

class MemosController extends Controller
{
    // getでmemos/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // メモ更新順で取得
            $memos = $user->memos()->orderBy('updated_at', 'desc')->paginate(25);
            
            
            // メモ一覧viewでそれを表示
            return view('memos.index',[
                'memos' => $memos,
            ]);
            return redirect('/');
        }
         return view('welcome', $data);
         return view('memos.icon');
    }   
    // getでmemos/createにアクセスされた場合の新規作成画面の表示処理
    public function create()
    {
        //
        $memo = new Memo;
        // メモ一覧viewでそれを表示
        return view('memos.create', [
            'memo' => $memo,
            ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     // postでmemos/にアクセスされた場合の新規作成処理
    public function store(Request $request)
    {

        // バリデーション
       $request->validate([
            'title' => 'required|max:10',
            'content' => 'required',
        ]);

            $request->user()->memos()->create([
            'content' => $request->content,
            'title' => $request->title,
        ]);

        // 前のURLへリダイレクトさせる
        return redirect('/');
        
        
    }
    
    // getでmemos/id/editにアクセスされた場合の更新画面表示処理
    public function edit($id)
    {
        // idの値でメモを検索して取得
        $memo = Memo::findOrFail($id);
        
            // メモ編集をviewで表示させる
        if (\Auth::id() === $memo->user_id) {
            return view('memos.edit', [
            'memo' => $memo,
        ]);
            }
        return redirect('/');
        
    }
    // putまたはpatchでmemos/idにアクセスされた場合の更新処理
    public function update(Request $request, $id)
    {
        // バリデーション
        $this->validate($request, [
            'title' => 'required|max:10', 
            'content' => 'required',
        ]);
        
        // idの値でメモを検索して取得
        $memo = Memo::findOrFail($id);
        
        
        // メモを更新する
        
        if (\Auth::id() === $memo->user_id) {
            $memo->title = $request->title;
            $memo->content = $request->content;
            $memo->save();
            
        }
        return redirect('/');
    }
    
    public function icon()
    {
        
        // ユーザ一覧ビューでそれを表示
        return view('memos.icon', [
            'memos' => $memos,
        ]);
    }

    // deleteでmemos/idにアクセスされた場合の削除処理する
    public function destroy($id)
    {
        
        // idの値でメモを検索して取得する
        $memo = Memo::findOrFail($id);
          
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $memo->user_id) {
            $memo->delete();
        }
        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
