@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::open(array('route' => ['myTarget.update','id'=>$data->id],'method'=>'POST','files'=>'true')) !!}
			@csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Target Realization</label>
                <div class="col-sm-12">
                    {!! Form::textarea('details', null, array('placeholder' => 'Target Name','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">File</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file">
                        <label class="custom-file-label" for="certificate">Choose File</label>
                    </div>
                </div>
				{!! Form::hidden('data_id', $data->Data->id, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
            <div class="modal-footer justify-content-between">
                <button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-primary">Save changes</button>
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
