@extends('layouts.app')

@section('content')
         
    

        <div class="text-center mb-5" style="font-size:70px; font-style:oblique; font-weight:bold; color: #1E90FF;-webkit-text-stroke: 1px white;">
            <p>Welcome back <?php $user = Auth::user(); ?>{{ $user->name }} ! !</p>
            {!! link_to_route('memos.create', 'New entry', [], ['class' => 'btn btn-lg btn-info']) !!}
        </div>

    @if (count($memos) > 0)
    <section class="container">

    <i class="fas fa-search mr-2" style="font-size:30px;"></i><input type="search" style="width:250px;" class="light-table-filter mb-3" data-table="order-table" placeholder="search"/>
        <table class="table table-striped table-light table-sm order-table text-center" border="3">
            <thead class="thead-dark">
                <tr>
                    <th >id</th>
                    <th>title</th>
                    <th>update</th>
                    <th>editing</th>
                    <th>deletion</th>
                </tr>
            </thead>
            <tbody style="font-size:30px">
                @foreach ($memos as $memo)
                <tr>
                    {{-- タスク詳細ページへのリンク --}}
                    <td>{{ $memo->id }}</td>
                    <td>{{ $memo->title }}</td>
                    <td style="font-family:arial narrow; font-size:20px;">{{ $memo->updated_at }}</td>
                    <td>{!! link_to_route('memos.edit', 'Edit', ['memo' => $memo->id], ['class' => 'btn btn-lg btn-success']) !!}
                    </td>
                    <td onclick="return Delete_check()">{!! Form::model($memo, ['route' => ['memos.destroy', $memo->id], 'method' => 'delete']) !!}
                    {!! Form::submit('delete', ['class' => 'btn btn-lg btn-danger']) !!}
                    {!! Form::close() !!}</td>
                @endforeach
            </tbody>
        </table>
    @endif
    
@endsection
