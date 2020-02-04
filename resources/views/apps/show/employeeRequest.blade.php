@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['request.update', $data->id]]) !!}
            @csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Employee ID</label>
                <div class="col-sm-12">
                    {!! Form::text('employee_no', $data->Employees->employee_no, array('placeholder' => 'Account Name','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Employee Name</label>
                <div class="col-sm-12">
                    {!! Form::text('employee_name', ($data->Employees->first_name.' '.$data->Employees->last_name), array('placeholder' => 'Account Name','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Request Date From</label>
                <div class="col-sm-12">
                    {!! Form::datetime('leave_start', old('leave_start'), array('id' => 'datepicker','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Request Date To</label>
                <div class="col-sm-12">
                    {!! Form::datetime('leave_end', old('leave_end'), array('id' => 'datepicker','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Request Type</label>
                <div class="col-sm-12">
                    {!! Form::text('leave_type', $data->Types->leave_name, array('placeholder' => 'Account Name','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Request Note</label>
                <div class="col-sm-12">
                    {!! Form::textarea('notes', null, array('placeholder' => 'Account Name','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Request Approval</label>
                <div class="col-sm-12">
                    <select name="status_id" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="ca52a2ce-5c37-48ce-a7f2-0fd5311860c2">Approve</option>
                        <option value="6840ffe5-600b-4109-8abf-819bf77b24cf">Reject</option>
                    </select>
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
