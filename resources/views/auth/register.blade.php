@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 style="color:#00ff00;-webkit-text-stroke: 1px blue; font-style:oblique; font-weight:bold;" >Sign up</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3" style="color:black;-webkit-text-stroke: 1px white; font-weight:bold; font-size:20px;">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection