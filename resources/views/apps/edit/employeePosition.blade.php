@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['position.update', $data->id]]) !!}
			@csrf
            <div class="form-group">
			    <label>Position Name</label>
                {!! Form::text('position_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
