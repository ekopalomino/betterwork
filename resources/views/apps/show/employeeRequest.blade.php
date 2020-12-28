@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['request.update', $data->id]]) !!}
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
            			<label class="col-sm-12 col-form-label">Employee ID</label>
                        {!! Form::text('employee_no', $data->Parent->Employees->employee_no, array('placeholder' => 'Account Name','class' => 'form-control','readonly')) !!}
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label">Request Type</label>
                        {!! Form::text('leave_type', $data->Types->leave_name, array('placeholder' => 'Account Name','class' => 'form-control','readonly')) !!}
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label">Request Date From</label>
                        {!! Form::datetime('leave_start', old('leave_start'), array('id' => 'datepicker','class' => 'form-control','readonly')) !!}
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label">Schedule In</label>
                        {!! Form::datetime('schedule_in', old('schedule_in'), array('id' => 'datepicker','class' => 'form-control','readonly')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label">Employee Name</label>
                        {!! Form::text('employee_name', ($data->Parent->Employees->first_name.' '.$data->Parent->Employees->last_name), array('placeholder' => 'Account Name','class' => 'form-control','readonly')) !!}
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label">Leave Remaining</label>
                        {!! Form::text('remaining', $remaining, array('placeholder' => 'Account Name','class' => 'form-control','readonly')) !!}
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label">Request Date To</label>
                        {!! Form::datetime('leave_end', old('leave_end'), array('id' => 'datepicker','class' => 'form-control','readonly')) !!}
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label">Schedule Out</label>
                        {!! Form::datetime('schedule_out', old('schedule_out'), array('id' => 'datepicker','class' => 'form-control','readonly')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label">Note</label>
                        {!! Form::textarea('notes', null, array('placeholder' => 'Account Name','class' => 'form-control','readonly')) !!}
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label">Request Approval</label>
                        <select name="status_id" class="form-control">
                            <option value="0">Please Select</option>
                            <option value="ca52a2ce-5c37-48ce-a7f2-0fd5311860c2">Approve</option>
                            <option value="6840ffe5-600b-4109-8abf-819bf77b24cf">Reject</option>
                        </select>
                    </div>
                </div>
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
