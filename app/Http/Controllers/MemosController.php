<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Memo;

class MemosController extends Controller
{
    public function index()
    {
        
            
        $memos = Memo::orderBy('updated_at', 'desc')->paginate(25);
            return view('memos.index', [
                'memos' => $memos,
            ]);
        
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


        $memo = new Memo;
        $memo->title = $request->title;
        $memo->content = $request->content;
        $memo->save();


        return redirect('/');
    }
    
    public function show($id)
    {

        $memo = Memo::findOrFail($id);
        
        
         
            return view('memos.show', [
           
            'memo' => $memo,
        ]);
            return redirect('/');
        
        
    }
    
    public function edit($id)
    {
        //
        $memo = Memo::findOrFail($id);
        
        
            return view('memos.edit', [
            'memo' => $memo,
        ]);
        
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
        
        
        
        $memo->title = $request->title;
        $memo->content = $request->content;
        $memo->save();
            
        
        
        
        return redirect('/');
        
    }

    public function destroy($id)
    {
        //
        
        $memo = Memo::findOrFail($id);

            $memo->delete();
        
        return redirect('/');
    }
}
