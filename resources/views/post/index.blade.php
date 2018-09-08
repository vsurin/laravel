@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Тестовое приложение</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>

    @foreach ($posts as $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->title}}</td> 
        <td>{{ $value->content}}</td> 
        <td><img src="/upload/{{ $value->image }}" height="50" /></td> 
        <td>{{ $value->category->title}}</td> 
        <td>
            <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Edit</a>       

            {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $value->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}                       
        </td>        
    </tr>
    @endforeach
    </table>    
@endsection