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
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the memos</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success']) !!}

            </div>
        </div>
    @endif
@endsection