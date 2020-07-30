@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1 style="color:yellow;-webkit-text-stroke: 1px #00ff00; font-style:oblique; font-weight:bold;">Log in</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3" style="color:black;-webkit-text-stroke: 1px white; font-weight:bold; font-size:20px;">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Log in', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
        
    </div>

@endsection