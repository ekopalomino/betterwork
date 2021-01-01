@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">  
			{!! Form::model($data, ['method' => 'POST','route' => ['employeeService.update', $data->id],'files'=>'true']) !!}
            @csrf
			<div class="form-group row">
			   	<label class="col-sm-2 col-form-label">Grade</label>
			    <div class="col-sm-10">
			        {!! Form::select('grade', [null=>'Please Select'] + $grades,old('grade'), array('class' => 'form-control')) !!}
			    </div>
			</div>
			<div class="form-group row">
			   	<label class="col-sm-2 col-form-label">Report To</label>
			    <div class="col-sm-10">
			        {!! Form::select('report_to', [null=>'Please Select'] + $employees,old('report_to'), array('class' => 'form-control')) !!}
			    </div>
			</div>
            <div class="form-group row">
			   	<label class="col-sm-2 col-form-label">Position</label>
			    <div class="col-sm-10">
			        {!! Form::text('position', null, array('placeholder' => 'Job Title','class' => 'form-control')) !!}
			    </div>
			</div>
			<div class="form-group row">
			   	<label class="col-sm-2 col-form-label">Division</label>
			    <div class="col-sm-10">
			        {!! Form::select('division_id', [null=>'Please Select'] + $divisions,old('division_id'), array('class' => 'form-control')) !!}
			    </div>
			</div>
            <div class="form-group row">
			   	<label class="col-sm-2 col-form-label">Service From Date</label>
			    <div class="col-sm-10">
			        {!! Form::date('from', old('from'), array('id' => 'datepicker','class' => 'form-control')) !!}
			    </div>
			</div>
            <div class="form-group row">
			   	<label class="col-sm-2 col-form-label">Service To Date</label>
			    <div class="col-sm-10">
			        {!! Form::date('to', old('to'), array('id' => 'datepicker','class' => 'form-control')) !!}
			    </div>
			</div>
            <div class="form-group row">
			   	<label class="col-sm-2 col-form-label">Nett Salary</label>
			    <div class="col-sm-10">
			        {!! Form::text('salary', null, array('placeholder' => 'Job Title','class' => 'form-control')) !!}
			    </div>
			</div>
            <div class="form-group row">
			  	<label for="inputEmail" class="col-sm-2 col-form-label">Contract</label>
			    <div class="col-sm-10">								                       
					<div class="input-group">
					   	<div class="custom-file">
			   				<input type="file" class="custom-file-input" id="contract" name="contract">
			   				<label class="custom-file-label" for="contract">Choose Contract</label>
						</div>
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
<script src="{{ asset('bower_components/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    bsCustomFileInput.init();
});
</script>
@endsection
