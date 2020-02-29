@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['organization.update', $data->id]]) !!}
			@csrf
			<label class="col-sm-12 col-form-label">Organization Name</label>
            {!! Form::text('name', null, array('placeholder' => 'Organization Name','class' => 'form-control')) !!}
            <label class="col-sm-12 col-form-label">Parent</label>
			{!! Form::select('parent', $parents,old('parent'), array('class' => 'form-control')) !!}
			<div class="modal-footer">
                <button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
