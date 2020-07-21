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
                        <p id="inputlength">0</p>
                    </div>
                    {!! Form::label('content', 'content') !!}
                </div>
                <form action="">
               
                    <input class="chgColor btn btn-dark"  type="button" value="black"/>
                    <input class="chgColor btn btn-success"  type="button" value="green"/>
                    <input class="chgColor btn btn-danger" type="button" value="red"/>
                    <input class="chgColor btn btn-primary" type="button" value="blue"/>
                    <button onclick="Clipboard()" class="put" type="button">select all</button>
                    
                    <p> 
                        <button id="button1" type="button">English</button>
                        <button id="button2" type="button">Japanese</button>
                        <button id="button3" type="button">stop</button>
                     </p>

                    <p>
                        <textarea contenteditable class="form-control" style="height:240px;" onkeyup="ShowLength(value);" name="content" cols="50" rows="10" id="content"></textarea><br>
                    </p>
                </form>

        </div>
    </div>
                    
            {!! Form::close() !!}
    </div>
    

@endsection
