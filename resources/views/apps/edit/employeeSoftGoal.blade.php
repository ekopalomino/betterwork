@extends('apps.layouts.main') 
@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			{!! Form::model($data, ['method' => 'POST','route' => ['softGoal.update', $data->id],'class' => 'form-horizontal']) !!}
			@csrf
			<label for="inputEmail" class="col-sm-12 col-form-label">Required Competency(s)</label>
                <div class="col-sm-12">
                    <select name="competency" class="form-control">
                    	<option value="0" {{ old('competency',$data->competency)=='0' ? 'selected' : ''  }}>Please Select</option>
					    <option value="04bab8fc-d977-4469-adde-7c123c953848" {{ old('competency',$data->competency)=='04bab8fc-d977-4469-adde-7c123c953848' ? 'selected' : ''  }}>Integrity and Transparancy</option>
					    <option value="389c150b-01d4-4b07-8c65-aacd1cec7946" {{ old('competency',$data->competency)=='389c150b-01d4-4b07-8c65-aacd1cec7946' ? 'selected' : ''  }}>Orientation to learning and sharing knowledge</option>
						<option value="d5ffb222-419f-4f4f-a968-1677d08617ca" {{ old('competency',$data->competency)=='d5ffb222-419f-4f4f-a968-1677d08617ca' ? 'selected' : ''  }}>Client Orientation</option>
						<option value="ac349559-1e12-4f1c-95be-1fd8d55b84a0" {{ old('competency',$data->competency)=='ac349559-1e12-4f1c-95be-1fd8d55b84a0' ? 'selected' : ''  }}>Takes responsibility for performance</option>
						<option value="04d751d7-6da3-4a0f-b561-7dd3fefe6915" {{ old('competency',$data->competency)=='04d751d7-6da3-4a0f-b561-7dd3fefe6915' ? 'selected' : ''  }}>Collaboration</option>
					</select>
                </div>
            <label for="inputEmail" class="col-sm-12 col-form-label">Notes</label>
                <div class="col-sm-12">
                    {!! Form::textarea('notes', null, array('placeholder' => 'Job Weight','class' => 'form-control')) !!}
					{!! Form::hidden('appraisal_id', $data->appraisal_id, array('class' => 'form-control','readonly')) !!}
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
