@extends('layouts.app')

@section('content')
  <div class="center jumbotron offset-sm-1 col-sm-11" style="background-image:url({{ asset('edit.jpg') }}); center no-repeat; background-size: cover;">
<h1 class="text-center" style="color: #FFFF00;-webkit-text-stroke: 2px #00FFFF; font-style:italic; font-weight:bold; font-size:60px;">Edit page</h1>  </div>
   <div class="row">
        <div class="offset-sm-1 col-sm-11">
        {!! Form::model($memo, ['route' => ['memos.update', $memo->id], 'method' => 'put']) !!}

           <!--トップページにもどる-->
            {!! link_to_route('memos.index', 'Back', [], ['class' => 'btn btn-lg btn-success']) !!}
            <!--セーブ-->
            <div class="float-right">{!! Form::submit('Save', ['class' => 'btn btn-lg btn-primary']) !!}</div>
                <!--タイトル-->
                <div class="form-group" style="font-size:30px;">
                    {!! Form::label('title', 'title', ['style' => 'color:white']) !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
               
               <!--textareaの文字数表示-->
                <div class="form-group" style="font-size:30px;">  
                   <div class="form-inline float-right"  style="color:white;">
                        <p>Count :</p>
                        <p id="inputlength">0</p>
                    </div>
                    {!! Form::label('content', 'content', ['style' => 'color:white']) !!}
                </div>
                    <!--音声読み上げ機能-->
                    <p style="font-size:30px;"> 
                       <button class="btn" style="background-color:#0000FF; color:white;" id="button1" type="button"><i class="fas fa-volume-up"></i> English</button>
                        <!--日本語-->
                        <button class="btn" style="background-color:#FF6600; color:white;" id="button2" type="button"><i class="fas fa-volume-up"></i> Japanese</button>
                        <!--読み上げ中止-->
                        <button class="btn" style="background-color:red; color:white;" id="button3" type="button"><i class="fas fa-volume-mute"></i> stop</button>
                        
                        <!--textarea内の文字を選択する機能-->
                        <button class="btn" style="background-color:#5D99FF; color:white;" onclick="Clipboard()" class="put" type="button">select all</button>
                        
                       <!--twitter共有機能-->
                        <button id="tweet" class="btn" style="background-color:#00aced; color:white; float:right;" type="button"><i class="fab fa-twitter"></i> Tweet</button>
                        <!--textareaの文字をダウンロードする機能-->
                        <a href="" id="DLlink" download="{{ $memo->title }}.txt" class="btn" style="background-color:#b8860b; color:white; float:right;" type="button"><i class="fas fa-download"></i> download</a>
                   </p>
                <!--テキストエリア  -->
                <textarea contenteditable class="form-control" onkeyup="ShowLength(value);" name="content" cols="50" rows="14" id="content">{{ $memo->content }}</textarea><br>
                        
        </div>
    </div>
                    
            {!! Form::close() !!}
    </div>
    
        
    <script>
    // twitter共有機能
        document.getElementById("tweet").addEventListener('click', function(event) {
        event.preventDefault();
        var left = Math.round(window.screen.width / 2 - 275);
        var top = (window.screen.height > 420) ? Math.round(window.screen.height / 2 - 210) : 0;
        window.open(
            "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.getElementById("content").value),
            null,
            "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,left=" + left + ",top=" + top);
    });
    
    
    // textareaの文字をダウンロードする機能
        document.querySelector('#DLlink').onclick = function() {
            var text = document.querySelector('#content').value;
            this.href = 'data:text/plain;charset=utf-8,'
                + encodeURIComponent(text);
        };
    
    </script>
    

@endsection
