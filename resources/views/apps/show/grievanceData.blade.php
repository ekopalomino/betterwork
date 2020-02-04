@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Grievance Database Show
@endsection
@section('header.styles')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Grievance Database Show</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-widget">
				<div class="card-header">
					<div class="user-block">
          	<span class="username">{{ $data->subject }}</a></span>
          	<span class="description">{{date("d F Y H:i",strtotime($data->created_at)) }}</span>
          </div>
        </div>
        <div class="card-body">
          <p>Category : {{ $data->Categories->category_name }}</p>
          <p>Public Access : @if(($data->is_public) == 1)Yes @else No @endif</p>
          <p>Status : {{ $data->Statuses->name }}</p>
          <p>Description : {!!html_entity_decode($data->description)!!} </p>
          @if(($data->status_id) != '16f30bee-5db5-472d-b297-926f5c8e4d21')
          <a href="{{ route('grievanceData.edit',$data->id) }}" class="btn btn-danger btn-sm">
            <i class="fas fa-edit"></i> Edit
          </a>
          {!! Form::open(['method' => 'POST','route' => ['grievanceData.publish', $data->id],'onsubmit' => 'return ConfirmPublished()']) !!}
          {!! Form::button('<a><i class="fas fa-upload"></i>Publish</a>',['type'=>'submit','class' => 'btn btn-info btn-sm']) !!}
          {!! Form::close() !!}
          @endif
        </div>
        <div class="card-footer card-comments">
         	<p><strong>Comments and Response</strong></p>
          @foreach($data->Child as $child)
         	<div class="card-comment">
            <img class="img-circle img-sm" src="{{ asset('public/bower_components/admin-lte/dist/img/user4-128x128.jpg') }}" alt="User Image">
            <div class="comment-text">
              <span class="username">
                @if(($child->comment_by) == ($data->employee_id))
                Anonymous
                @else
                {{ $child->Responder->first_name}} {{ $child->Responder->last_name}}
                @endif
                <span class="text-muted float-right">{{date("d F Y H:i",strtotime($child->created_at)) }}</span>
              </span><!-- /.username -->
              {!!html_entity_decode($child->comment)!!}
            </div>
         	</div>
          @endforeach
        </div>
        @if(($data->status_id) != '16f30bee-5db5-472d-b297-926f5c8e4d21')
        <div class="card-footer">
         	{!! Form::open(array('method' => 'POST','route' => ['grievanceData.comment', $data->id])) !!}
          @csrf
           	<textarea class="textarea" name="comment" placeholder="Place some text here"
             	style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
            </textarea>
            <button type="submit" class="btn btn-info">Submit</button>
	        {!! Form::close() !!}
        </div>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<script>
    function ConfirmPublished()
    {
    var x = confirm("Data Published?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection