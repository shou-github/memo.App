@extends('layouts.app')

@section('content')
    
        <div class="row">
        <div class="offset-sm-2 col-sm-10">
            
            {!! link_to_route('memos.index', 'Back', [], ['class' => 'btn btn-lg btn-success']) !!}
            {!! Form::model($memo, ['route' => ['memos.update', $memo->id], 'method' => 'put']) !!}
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
                    
                    <p> 
                        <button class="btn" style="background-color:#0000FF; color:white;" id="button1" type="button">English</button>
                        <button class="btn" style="background-color:#FF6600; color:white;" id="button2" type="button">Japanese</button>
                        <button class="btn" style="background-color:red; color:white;" id="button3" type="button">stop</button>
                        <button class="btn" style="background-color:#5D99FF; color:white;" onclick="Clipboard()" class="put" type="button">select all</button>
                        <button id="tweet" class="btn" style="background-color:#00aced; color:white;" type="button"><i class="fab fa-twitter"></i> Tweet</button>
                     </p>
                    <p>
                        <textarea contenteditable class="form-control" style="height:240px;" onkeyup="ShowLength(value);" name="content" cols="50" rows="10" id="content">{{ $memo->content }}</textarea><br>
                    </p>
                </form>
        </div>
    </div>
                    
            {!! Form::close() !!}
    </div>
    <script>
        document.getElementById("tweet").addEventListener('click', function(event) {
        event.preventDefault();
        var left = Math.round(window.screen.width / 2 - 275);
        var top = (window.screen.height > 420) ? Math.round(window.screen.height / 2 - 210) : 0;
        window.open(
            "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.getElementById("content").value),
            null,
            "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,left=" + left + ",top=" + top);
    });
    </script>
@endsection
