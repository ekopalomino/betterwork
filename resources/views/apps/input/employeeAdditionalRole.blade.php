@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::open(array('route' => 'additionalRole.store','method'=>'POST')) !!}
			@csrf
			<label class="col-sm-12 col-form-label">Task</label>
                <div class="col-sm-12">
                    {!! Form::text('task', null, array('placeholder' => 'Task','class' => 'form-control')) !!}
                </div>
            <label class="col-sm-12 col-form-label">Details</label>
                <div class="col-sm-12">
                    {!! Form::textarea('details', null, array('placeholder' => 'Details','class' => 'form-control')) !!}
					{!! Form::hidden('appraisal_id', $data->id, array('class' => 'form-control','readonly')) !!}
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
