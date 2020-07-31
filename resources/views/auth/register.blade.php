@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 style="color:#00ff00;-webkit-text-stroke: 1px blue; font-style:oblique; font-weight:bold;" >Sign up</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3" style="font-weight:bold; font-size:20px;">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['style' => 'color:black;-webkit-text-stroke: 1px white']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email', ['style' => 'color:black;-webkit-text-stroke: 1px white']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password', ['style' => 'color:black;-webkit-text-stroke: 1px white']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('confirmation', 'Confirmation', ['style' => 'color:black;-webkit-text-stroke: 1px white']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection