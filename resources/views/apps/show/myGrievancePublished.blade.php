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