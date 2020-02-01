@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['position.update', $data->id]]) !!}
			@csrf
			<label for="position_name" class="col-sm-2 col-form-label">Position Name</label>
                <div class="col-sm-10">
                    {!! Form::text('position_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            <div class="modal-footer justify-content-between">
                <button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
