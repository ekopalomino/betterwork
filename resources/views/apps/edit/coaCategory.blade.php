@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['coaCat.update', $data->id],'class' => 'form-horizontal']) !!}
			@csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Account ID</label>
                <div class="col-sm-12">
                    {!! Form::text('account_id', null, array('placeholder' => 'Account Name','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Account Name</label>
                <div class="col-sm-12">
                    {!! Form::text('account_name', null, array('placeholder' => 'Account Name','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Account Category</label>
                <div class="col-sm-12">
                    <select name="account_category" class="form-control">
                        <option value="0" {{old('account_category') == 0 ? 'selected' : ''}}>Please Select</option>
                        <option value="1" {{old('account_category') == 1 ? 'selected' : ''}}>Asset</option>
                        <option value="2" {{old('account_category') == 2 ? 'selected' : ''}}>Liabilities</option>
                        <option value="3" {{old('account_category') == 3 ? 'selected' : ''}}>Revenue</option>
                        <option value="4" {{old('account_category') == 4 ? 'selected' : ''}}>Expense</option>
                    </select>
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Account Parent</label>
                <div class="col-sm-12">
                    {!! Form::select('account_parent', $parents,old('account_parent'), array('class' => 'form-control')) !!}
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
