@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Show Category</h1>
            </div>

            <div class="pull-right">
                <a class="btn" href="http://127.0.0.1:8000">Home</a>
                <a class="btn" href="{{ route('category.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $category->title }}
            </div>
        </div>        
    </div>
@endsection