@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
        @else
        <div class="center jumbotron" style="background-image:url({{ asset('memo.jpg') }}); center no-repeat; background-size: cover; height:800px;">
            <div class="text-center">
                <h1 style="color: #00ff00;-webkit-text-stroke: 1px red; font-weight:bold; font-style:oblique; font-size:50px; margin-bottom:50px;">Welcome to memo.app ! !</h1>

                <!--ユーザ登録ページへのリンク-->
                <div style="float:left; width:50%">{!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-primary']) !!}</div>
                <!--ログインページへのリンク-->
                <div style="float:right; width:50%">{!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success']) !!}</div>
            </div>
            
            <div style="float:left; width:50%; margin-top:30px;">
                <h1>メモアプリ機能一覧</h1>
                <ul>
                    <li>アイコン画像を変更できる機能</li>
                    <li>メモの文字数表示機能</li>
                    <li>音声読み上げ機能</li>
                    <li>文字をツイッターに共有する機能</li>
                    <li>文字をダウンロードする機能</li>
                    <li>作成したメモの検索機能</li>
                    <li>メモの作成日時あるいは更新日時の表示機能</li>
                </ul>
            </div>
            
            <div style="float:right; width:50%; margin-top:30px;">
                <h1>使用した技術一覧</h1>
                <ul>
                    <li>aws S3バケットにアイコン画像保存</li>
                    <li>フレームワーク　laravel　bootstrap</li>
                    <li>データベース mysql</li>
                    <li>使用言語　js php html </li>
                    <li>github</li>
                    <li>heroku</li>
                </ul>
            </div>
        </div>
    @endif
@endsection