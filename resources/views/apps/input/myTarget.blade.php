@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::open(array('route' => 'myTarget.store','method'=>'POST')) !!}
			@csrf
            <div class="form-group">
			    <label class="col-sm-12 col-form-label">Target Name</label>
                {!! Form::text('target', null, array('placeholder' => 'Target Name','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <label class="col-sm-12 col-form-label">Job Weight</label>
                {!! Form::number('weight', null, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
            </div>
				{!! Form::hidden('data_id', $data->id, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
				{!! Form::hidden('appraisal_id', $data->Appraisal->id, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
            <div class="modal-footer">
                <button type="close" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-sm btn-success">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
