@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['docCat.update', $data->id]]) !!}
			@csrf
			<label for="category_name" class="col-sm-12 col-form-label">Category Name</label>
                <div class="col-sm-12">
                    {!! Form::text('category_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-sm btn-success">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
