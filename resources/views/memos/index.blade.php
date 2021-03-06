@extends('layouts.app')

@section('content')

<section class="container">    
    <div class="text-center center jumbotron" style="background:url(pen.jpg);　center no-repeat; background-size: cover;   color: #1E90FF;-webkit-text-stroke: 1px white;">
            <h1 style="font-weight:bold; font-style:oblique; font-size:50px;">Welcome back <?php $user = Auth::user(); ?>{{ $user->name }} ! !</h1>
            {!! link_to_route('memos.create', 'New entry', [], ['class' => 'btn btn-lg btn-info']) !!}
    </div>
        
    @if (count($memos) > 0)
    
            <!--作成したメモ-->
            <i class="fas fa-search mr-2" style="font-size:30px; color:white;"></i><input type="search" style="width:250px;" class="light-table-filter mb-3" data-table="order-table" placeholder="search"/>
        <table class="table table-striped table-light table-sm text-center order-table" border="3">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>update</th>
                    <th>editing</th>
                    <th>deletion</th>
                </tr>
            </thead>
            <tbody style="width: 100%;">
                @foreach ($memos as $memo)
                <tr>
                    <!--メモのid表示-->
                    <td>{{ $memo->id }}</td>
                    <!--メモのタイトル表示-->
                    <td>{{ $memo->title }}</td>
                    <td style="font-family:arial narrow; font-size:20px;">{{ $memo->updated_at }}</td>
                    <td>{!! link_to_route('memos.edit', 'Edit', ['memo' => $memo->id], ['class' => 'btn btn-success']) !!}
                    </td>
                    <!--メモ削除ボタン-->
                    <td onclick="return Delete_check()">{!! Form::model($memo, ['route' => ['memos.destroy', $memo->id], 'method' => 'delete']) !!}
                    {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}</td>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
