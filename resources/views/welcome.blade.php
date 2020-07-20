@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumbotron" style="background:rgb(108, 255, 17);">
            <div class="text-center">
                
                <h1>Welcome to memo.App</h1>
                {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-success']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-primary']) !!}

            </div>
        </div>
    @endif
@endsection

