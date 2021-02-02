@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['office.update', $data->id]]) !!}
			@csrf
			<label class="col-sm-12 col-form-label">Office Name</label>
            {!! Form::text('office_name', null, array('placeholder' => 'Office Name','class' => 'form-control')) !!}
			<label class="col-sm-12 col-form-label">Office Address</label>
            {!! Form::textarea('office_address', null, array('placeholder' => 'Office Address','class' => 'form-control')) !!}
            <label class="col-sm-12 col-form-label">Province</label>
			{!! Form::select('province', $provinces,old('province'), array('class' => 'form-control')) !!}
			<label class="col-sm-12 col-form-label">City</label>
			{!! Form::select('city', $cities,old('city'), array('class' => 'form-control')) !!}
			<div class="modal-footer">
                <button type="close" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-sm btn-success">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
