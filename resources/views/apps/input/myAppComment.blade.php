@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::open(array('route' => 'myAppraisalComment.store','method'=>'POST')) !!}
			@csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Target Expectation</label>
                <div class="col-sm-12">
                    {!! Form::textarea('comments', null, array('placeholder' => 'Target Name','class' => 'form-control')) !!}
                </div>
				{!! Form::hidden('data_id', $data->id, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
				{!! Form::hidden('appraisal_id', $data->Appraisal->id, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
            <div class="modal-footer justify-content-between">
                <button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
