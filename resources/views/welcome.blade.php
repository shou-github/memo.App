@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
   
         </aside>
                <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('memos.memos')
            </div>
        </div>
        @else
        <div class="center jumbotron" style=" width:980px; background-image:url({{ asset('memo.jpg') }}); center no-repeat; background-size: cover;">
            <div class="text-center">
                <h1 style="color: #00ff00;-webkit-text-stroke: 1px red; font-weight:bold; font-style:oblique; font-size:70px;" >Welcome to memo.app ! !</h1>

                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success']) !!}

            </div>
        </div>
    @endif
@endsection