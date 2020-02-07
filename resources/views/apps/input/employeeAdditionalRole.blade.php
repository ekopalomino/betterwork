@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::open(array('route' => 'additionalRole.store','method'=>'POST')) !!}
			@csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Task</label>
                <div class="col-sm-12">
                    {!! Form::text('task', null, array('placeholder' => 'Task','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Details</label>
                <div class="col-sm-12">
                    {!! Form::textarea('details', null, array('placeholder' => 'Details','class' => 'form-control')) !!}
					{!! Form::hidden('appraisal_id', $data->appraisal_id, array('class' => 'form-control','readonly')) !!}
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
