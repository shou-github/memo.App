@extends('layouts.app')

@section('content')
  
    <div class="row">
        <div class="offset-sm-2 col-sm-10">
            
            {!! link_to_route('memos.index', 'Back', [], ['class' => 'btn btn-lg btn-success']) !!}
            {!! Form::model($memo, ['route' => 'memos.store']) !!}
            <div class="text-right">
            {!! Form::submit('Save', ['class' => 'btn btn-primary w-25']) !!}
            </div>
                <div class="form-group" style="font-size:30px;">
                    {!! Form::label('title', 'title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
               
                <div class="form-group" style="font-size:30px;">  
                   <div class="form-inline float-right">
                        <p>Count :</p>
                        <p id="textlength1">0</p>
                    </div>
                    {!! Form::label('content', 'content') !!}
                </div>
                <form action="">
 
                     <input class="chgColor btn btn-dark" type="button" value="black" />
                    <input class="chgColor btn btn-success"  type="button" value="green" />
                    <input class="chgColor btn btn-danger" type="button" value="red" />
                    <input class="chgColor btn btn-primary" type="button" value="blue" />

                   
                <p>
                <textarea id="textarea" contenteditable class="form-control" style="width:920px; height:240px;" onKeyUp="countLength(value, 'textlength1');" input name="content"></textarea>
                </p>
                </form>

        </div>
    </div>
                    
            {!! Form::close() !!}
    </div>
    

@endsection
