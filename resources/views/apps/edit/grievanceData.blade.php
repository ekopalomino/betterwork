@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Grievance Database Edit
@endsection
@section('header.styles')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Grievance Database Edit</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
    @if (count($errors) > 0) 
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
		<div class="col-md-12">
			<div class="card card-widget"> 
        {!! Form::model($data, ['method' => 'POST','route' => ['grievanceData.update', $data->id]]) !!}
        @csrf
				<div class="card-header">
					<div class="user-block">
          	<span class="username">{{ $data->subject }}</a></span>
          	<span class="description">{{date("d F Y H:i",strtotime($data->created_at)) }}</span>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <p>Category : {!! Form::select('type_id', $types,old('type_id'), array('class' => 'form-control')) !!}</p>
              <p>Public Access : 
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="is_public" name="is_public" {{old('is_public') == 0 ? 'checked' : ''}}>
                  <label class="custom-control-label" for="is_public">Toggle this switch to make data public</label>
                </div>
              </p>
              <p>Approval :
                <select name="status_id" class="form-control required">
                  <option value="">Please Select</option>
                  <option value="ca52a2ce-5c37-48ce-a7f2-0fd5311860c2">Yes</option>
                  <option value="6840ffe5-600b-4109-8abf-819bf77b24cf">No</option>
                </select>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="inputEmail" class="col-sm-12 col-form-label">Description</label>
                {!! Form::textarea('description', old('description', $data->description), array('placeholder' => 'Konten','class' => 'form-control summernote')) !!} 
              
            </div>
          </div>
          <button id="register" type="submit" class="btn btn-sm btn-primary">Save changes</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script type="text/javascript">
   $(document).ready(function() {
    $('.summernote').summernote({
          height: 500,
     });
  });
</script>
@endsection