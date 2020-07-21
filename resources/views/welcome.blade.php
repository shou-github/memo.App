@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumbotron" style="background:url(main.jpg);　center no-repeat; background-size: cover;">
            <div class="text-center">
                
                <h1 style="font-weight:unset; font-size:90px; color: #00ffff;-webkit-text-stroke: 1px #f00; font-style:italic;">Welcome to memo.App</h1>
                {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-success']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-primary']) !!}

            </div>
        </div>
    @endif
@endsection

