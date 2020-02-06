@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::open(array('route' => ['myTarget.update','id'=>$data->id],'method'=>'POST')) !!}
			@csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Target Realization</label>
                <div class="col-sm-12">
                    {!! Form::text('target_real', null, array('placeholder' => 'Target Name','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Progress</label>
                <div class="col-sm-12">
                    {!! Form::number('weight_real', null, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
                </div>
				{!! Form::hidden('data_id', $data->Data->id, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
            <div class="modal-footer justify-content-between">
                <button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
