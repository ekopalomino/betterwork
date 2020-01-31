@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['reimbursType.update', $data->id]]) !!}
			@csrf
			<div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Reimburs Type Name</label>
                    <div class="col-sm-10">
            	        {!! Form::text('reimburs_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
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
