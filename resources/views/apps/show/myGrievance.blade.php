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
					@if(($data->status_id) != '6a787298-14f6-4d19-a7ee-99a3c8ed6466')
					<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-lg">
						<i class="fas fa-exclamation-circle"></i> Close and Rate
					</button>
					<div class="modal fade" id="modal-lg">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Rate Me</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									{!! Form::open(array('method' => 'POST','route' => ['myGrievance.rate', $data->id])) !!}
									@csrf
									<div class="form-group" id="rating-ability-wrapper">
										<label class="control-label" for="rating">
											<span class="field-label-header">How would you rate your grievance respond?</span><br>
											<span class="field-label-info"></span>
											<input type="hidden" id="selected_rating" name="rating" value="" required="required">
										</label>
										<h2 class="bold rating-header" style="">
											<span class="selected-rating">0</span><small> / 5</small>
										</h2>
										<button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
											<i class="fa fa-star" aria-hidden="true"></i>
										</button>
										<button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
											<i class="fa fa-star" aria-hidden="true"></i>
										</button>
										<button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
											<i class="fa fa-star" aria-hidden="true"></i>
										</button>
										<button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
											<i class="fa fa-star" aria-hidden="true"></i>
										</button>
										<button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
											<i class="fa fa-star" aria-hidden="true"></i>
										</button>
									</div>
								</div>
								<div class="modal-footer">
									<button type="close" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
									<button id="register" type="submit" class="btn btn-sm btn-primary">Submit</button>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
					@endif
				</div>
				<div class="card-footer card-comments">
					<p><strong>Comments and Response</strong></p>
					@foreach($data->Child as $child)
						<div class="card-comment">
							<img class="img-circle img-sm" src="{{ asset('public/bower_components/admin-lte/dist/img/avatar.png') }}" alt="User Image">
							<div class="comment-text">
								<span class="username">
									@if(($child->comment_by) == ($data->employee_id))
									Anonymous
									@else
									Team Grievance
									@endif
									<span class="text-muted float-right">{{date("d F Y H:i",strtotime($child->created_at)) }}</span>
								</span><!-- /.username -->
								{!!html_entity_decode($child->comment)!!}
							</div>
						</div>
					@endforeach
				</div>
				@if(($data->status_id) != '6a787298-14f6-4d19-a7ee-99a3c8ed6466')
				<div class="card-footer">
					{!! Form::open(array('method' => 'POST','route' => ['myGrievance.respond', $data->id])) !!}
					@csrf
					<textarea class="textarea" name="comment" placeholder="Place some text here"
						style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
					</textarea>
					<button type="submit" class="btn btn-sm btn-info">Submit</button>
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
  jQuery(document).ready(function($){
      
    $(".btnrating").on('click',(function(e) {
  
      var previous_value = $("#selected_rating").val();
  
      var selected_value = $(this).attr("data-attr");
      $("#selected_rating").val(selected_value);
  
      $(".selected-rating").empty();
      $(".selected-rating").html(selected_value);
  
      for (i = 1; i <= selected_value; ++i) {
        $("#rating-star-"+i).toggleClass('btn-warning');
        $("#rating-star-"+i).toggleClass('btn-default');
      }
  
      for (ix = 1; ix <= previous_value; ++ix) {
        $("#rating-star-"+ix).toggleClass('btn-warning');
        $("#rating-star-"+ix).toggleClass('btn-default');
      }
  
  }));
  
    
});
</script>
@endsection