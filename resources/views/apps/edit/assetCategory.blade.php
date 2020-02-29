@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['assetCat.update', $data->id]]) !!}
			@csrf
			<label class="col-sm-12 col-form-label">Category Name</label>
            {!! Form::text('category_name', null, array('placeholder' => 'Category Name','class' => 'form-control')) !!}
            <label class="col-sm-12 col-form-label">Depreciation Account</label>
            {!! Form::select('charts_id', $accounts,old('chart_of_account_id'), array('class' => 'form-control')) !!}
            <div class="modal-footer">
                <button type="close" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-sm btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
