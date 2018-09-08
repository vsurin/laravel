@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Edit Post</h1>
            </div>
            <div class="pull-right">
                <a class="btn" href="http://127.0.0.1:8000">Home</a>
                <a class="btn" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($post, ['method' => 'PATCH','route' => ['posts.update', $post->id], 'enctype' => 'multipart/form-data']) !!}
        @include('post.form')
    {!! Form::close() !!}
@endsection