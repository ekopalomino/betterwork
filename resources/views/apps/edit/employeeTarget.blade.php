@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['appraisalTarget.update', $data->id],'class' => 'form-horizontal']) !!}
			@csrf
			<label class="col-sm-12 col-form-label">Target</label>
                <div class="col-sm-12">
                    {!! Form::text('target', null, array('placeholder' => 'Target Name','class' => 'form-control')) !!}
                </div>
            <label class="col-sm-12 col-form-label">Job Weight</label>
                <div class="col-sm-12">
                    {!! Form::number('job_weight', null, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
                </div>
			<div class="modal-footer">
                <button type="close" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-sm btn-success">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
