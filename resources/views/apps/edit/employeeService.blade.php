@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['employeeService.update', $data->id],'files'=>'true']) !!}
            @csrf
            <label for="inputEmail" class="col-sm-12 col-form-label">Position</label>
                <div class="col-sm-12">
                    {!! Form::select('position', $grades,old('position'), array('class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Report To</label>
                <div class="col-sm-12">
                    {!! Form::select('report_to', $employees,old('report_to'), array('class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Job Title</label>
                <div class="col-sm-12">
                    {!! Form::text('job_title', null, array('placeholder' => 'Job Title','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Service From Date</label>
                <div class="col-sm-12">
                    {!! Form::date('from', old('from'), array('id' => 'datepicker','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Service To Date</label>
                <div class="col-sm-12">
                    {!! Form::date('to', old('to'), array('id' => 'datepicker','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Net Salary</label>
                <div class="col-sm-12">
                    {!! Form::text('salary', null, array('placeholder' => 'Job Title','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Contract</label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="contract" name="contract">
                            <label class="custom-file-label" for="contract">Choose File</label>
                        </div>
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
<script src="{{ asset('public/bower_components/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    bsCustomFileInput.init();
});
</script>
@endsection
