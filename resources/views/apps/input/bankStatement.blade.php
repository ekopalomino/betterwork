@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['statementFile.import', $data->id],'files'=>'true']) !!}
			@csrf
			<label for="name" class="col-sm-12 col-form-label">Bank Statement File</label>
                <div class="col-sm-12">
                    {!! Form::file('statement', null, array('placeholder' => 'Bank Statement File','class' => 'form-control')) !!}
					{!! Form::hidden('account_id', $data->id, array('class' => 'form-control')) !!}
                </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-sm btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
