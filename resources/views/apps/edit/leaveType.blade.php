@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['leaveType.update', $data->id]]) !!}
			@csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Leave Type Name</label>
                <div class="col-sm-12">
                    {!! Form::text('leave_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">First Approval</label>
                <div class="col-sm-12">
                    {!! Form::select('first_approval', [null=>'Please Select'] + $firsts,[], array('class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Second Approval</label>
                <div class="col-sm-12">
                    {!! Form::select('second_approval', [null=>'Please Select'] + $seconds,[], array('class' => 'form-control')) !!}
                </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
