<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Memo;

class MemosController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { 
           
            $user = \Auth::user();
           
            $memos = $user->memos()->orderBy('updated_at', 'desc')->paginate(10);

           
            return view('memos.index', [
                'memos' => $memos,
            ]);
            return redirect('/');
        }

        
        return view('welcome', $data);
        
    }

    
    public function create()
    {
        //
        $memo = new Memo;
        
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
    public function store(Request $request)
    {

        
       $request->validate([
            'title' => 'required|max:20',
            'content' => 'required',
        ]);


        $request->user()->memos()->create([
            'content' => $request->content,
            'title' => $request->title,
        ]);


        return redirect('/');
    }
    
    public function show($id)
    {

        $memo = Memo::findOrFail($id);
        
        
         if (\Auth::id() === $memo->user_id) {
            return view('memos.show', [
           
            'memo' => $memo,
        ]);
            return redirect('/');
        }
        
    }
    
    public function edit($id)
    {
        //
        $memo = Memo::findOrFail($id);
        
        
        
        if (\Auth::id() === $memo->user_id) {
            return view('memos.edit', [
            'memo' => $memo,
        ]);
        }
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required|max:20', 
            'content' => 'required',
        ]);
        
        $memo = Memo::findOrFail($id);
        
        
        if (\Auth::id() === $memo->user_id) {
            $memo->title = $request->title;
        $memo->content = $request->content;
        $memo->save();
            
        }
        
        
        return redirect('/');
        
    }

    public function destroy($id)
    {
        //
        
        $memo = Memo::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $memo->user_id) {
            $memo->delete();
        }
        // 前のURLへリダイレクトさせる
        return redirect('/');
    }
}
