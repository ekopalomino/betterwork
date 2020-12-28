@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['employeeEducation.update', $data->id]]) !!}
            @csrf
            <label for="inputEmail" class="col-sm-12 col-form-label">Insitution Name</label>
                <div class="col-sm-12">
                    {!! Form::text('institution_name', null, array('placeholder' => 'Insitution Name','class' => 'form-control')) !!}
                </div>
			<label for="inputEmail" class="col-sm-12 col-form-label">Graduate On</label>
                <div class="col-sm-12">
                    {!! Form::date('date_of_graduate', '', array('id' => 'datepicker','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Degree</label>
                <div class="col-sm-12">
                    {!! Form::select('degree', $degrees,old('degree'), array('class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Major</label>
                <div class="col-sm-12">
                    {!! Form::text('major', null, array('placeholder' => 'Major','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">GPA</label>
                <div class="col-sm-12">
                    {!! Form::text('gpa', null, array('placeholder' => 'GPA','class' => 'form-control')) !!}
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
