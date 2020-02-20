@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['bankAcc.update', $data->id]]) !!}
			@csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Bank Name</label>
            {!! Form::text('bank_name', null, array('placeholder' => 'Bank Name','class' => 'form-control')) !!}
            <label for="inputEmail" class="col-sm-12 col-form-label">Bank Account</label>
            {!! Form::text('account_no', null, array('placeholder' => 'Account No','class' => 'form-control')) !!}
            <div class="modal-footer">
                <button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
