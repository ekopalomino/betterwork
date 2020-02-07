@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['employeeTraining.update', $data->id],'files'=>'true']) !!}
            @csrf
            <label for="inputEmail" class="col-sm-12 col-form-label">Training Provider</label>
                <div class="col-sm-12">
                    {!! Form::text('training_provider', null, array('placeholder' => 'Training Provider','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Training Title</label>
                <div class="col-sm-12">
                    {!! Form::text('training_title', null, array('placeholder' => 'Training Title','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Training Location</label>
                <div class="col-sm-12">
                    {!! Form::text('location', null, array('placeholder' => 'Training Location','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Training From Date</label>
                <div class="col-sm-12">
                    {!! Form::date('training_start', old('from'), array('id' => 'datepicker','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Training To Date</label>
                <div class="col-sm-12">
                    {!! Form::date('training_end', old('to'), array('id' => 'datepicker','class' => 'form-control','readonly')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Status</label>
                <div class="col-sm-12">
                    <select name="status" class="form-control" readonly>
                        <option value="0" {{ old('status',$data->status)=='0' ? 'selected' : ''  }}>Please Select</option>
                        <option value="c64ca24c-78c6-4026-ac65-e6dc3de288ac" {{ old('status',$data->status)=='c64ca24c-78c6-4026-ac65-e6dc3de288ac' ? 'selected' : ''  }}>Proposed</option>
                        <option value="c0c2bde9-b149-489c-9e0d-a10e4d2fd661" {{ old('status',$data->status)=='c0c2bde9-b149-489c-9e0d-a10e4d2fd661' ? 'selected' : ''  }}>On Going</option>
                        <option value="97904ce7-87e2-4c61-b16e-c52a3c9f8b6d" {{ old('status',$data->status)=='97904ce7-87e2-4c61-b16e-c52a3c9f8b6d' ? 'selected' : ''  }}>Completed</option>
                    </select>
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Certification</label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="certificate" name="certificate">
                            <label class="custom-file-label" for="certificate">Choose File</label>
                        </div>
                    </div>
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Training Reports</label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="reports" name="reports">
                            <label class="custom-file-label" for="reports">Choose File</label>
                        </div>
                    </div>
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Training Material</label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="materials" name="materials">
                            <label class="custom-file-label" for="materials">Choose File</label>
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
