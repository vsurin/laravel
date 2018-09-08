@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>List category</h1>
            </div>
            <div class="pull-right">
                <a class="btn" href="http://127.0.0.1:8000">Home</a>
                <a class="btn" href="{{ route('category.create') }}">Create New Category</a>
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
            <th width="280px">Action</th>
        </tr>

    @foreach ($category as $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->title}}</td>	
        <td>
            <a class="btn btn-info" href="{{ route('category.show',$value->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('category.edit',$value->id) }}">Edit</a>		 

            {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $value->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}                       
        </td>        
    </tr>
    @endforeach
    </table>	
@endsection