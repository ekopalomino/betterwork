@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['coaCat.update', $data->id],'class' => 'form-horizontal']) !!}
			@csrf
            <div class="form-group">
			    <label>Account ID</label>
                {!! Form::text('account_id', null, array('placeholder' => 'Account Name','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <label>Account Name</label>
                {!! Form::text('account_name', null, array('placeholder' => 'Account Name','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <label>Account Category</label>
                {!! Form::select('account_category', $categories,old('account_category'), array('class' => 'form-control')) !!}
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-sm btn-success">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
