<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}

            <strong>Content:</strong>
            {{ Form::textarea('content', null, array('id'=>'editor')) }}

            <strong>Category:</strong>
            {!! Form::select('id_category', $categories, null, ['class' => 'form-control']) !!}            

            <br>
            <strong>Image:</strong>            
            {!! Form::file('image') !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor' );
</script>