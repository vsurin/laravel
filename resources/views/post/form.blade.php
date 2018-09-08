<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
            <strong>Content:</strong>
            {!! Form::text('content', null, array('placeholder' => 'Content','class' => 'form-control')) !!}            
            <strong>Category:</strong>
            {!! Form::select('id_category', $categories, null, ['class' => 'form-control']) !!}
            <strong>Image:</strong>
            {!! Form::file('image') !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>