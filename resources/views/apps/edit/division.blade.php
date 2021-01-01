@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['division.update', $data->id]]) !!}
			@csrf
            <div class="form-group">
			    <label class="col-sm-12 col-form-label">Division Name</label>
                {!! Form::text('leave_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
