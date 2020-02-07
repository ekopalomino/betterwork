@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['additionalRole.update', $data->id],'class' => 'form-horizontal']) !!}
			@csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Required Competency(s)</label>
                <div class="col-sm-12">
                    {!! Form::text('task', null, array('placeholder' => 'Task','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Notes</label>
                <div class="col-sm-12">
                    {!! Form::textarea('details', null, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
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
