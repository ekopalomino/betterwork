@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12"> 
			{!! Form::model($data, ['method' => 'POST','route' => ['employeeFamily.update', $data->id]]) !!}
            @csrf
            <label for="inputEmail" class="col-sm-12 col-form-label">First Name</label>
                <div class="col-sm-12">
                    {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Last Name</label>
                <div class="col-sm-12">
                    {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Relations</label>
                <div class="col-sm-12">
                    <select name="relations" class="form-control">
                        <option value="0" {{ old('relations',$data->relations)=='0' ? 'selected' : ''  }}>Please Select</option>
                        <option value="1" {{ old('relations',$data->relations)=='1' ? 'selected' : ''  }}>Husband</option>
                        <option value="2" {{ old('relations',$data->relations)=='2' ? 'selected' : ''  }}>Wife</option>
                        <option value="3" {{ old('relations',$data->relations)=='3' ? 'selected' : ''  }}>Parent</option>
                        <option value="4" {{ old('relations',$data->relations)=='4' ? 'selected' : ''  }}>Sibling</option>
                    </select>
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Address</label>
                <div class="col-sm-12">
                    {!! Form::textarea('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Phone</label>
                <div class="col-sm-12">
                    {!! Form::text('phone', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Mobile</label>
                <div class="col-sm-12">
                    {!! Form::text('mobile', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}
                </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-sm btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
