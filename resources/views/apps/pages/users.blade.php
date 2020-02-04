@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | User Database
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>User Database</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
       		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
         		Add New
         	</button>
         	<div class="modal fade" id="modal-lg">
   	        <div class="modal-dialog modal-lg">
	          	<div class="modal-content">
	            	<div class="modal-header">
	             		<h4 class="modal-title">New User</h4>
	              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                		<span aria-hidden="true">&times;</span>
	              		</button>
	            	</div>
	            	<div class="modal-body">
                  {!! Form::open(array('route' => 'user.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                  @csrf
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Access Role</label>
                        <div class="col-sm-10">
                          {!! Form::select('roles[]', [null=>'Please Select'] + $roles,[], array('class' => 'form-control')) !!}
                        </div>
                    </div>
                  
                 	</div>
				            	<div class="modal-footer justify-content-between">
				              		<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
				              		<button id="register" type="submit" class="btn btn-primary">Save changes</button>
				            	</div>
				          	</div>
                {!! Form::close() !!}
				        </div>
				    </div>
          </div>
         	<div class="card-body">
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
         		<table id="example1" class="table table-bordered table-hover">
         			<thead>
         				<tr>
         					<th>No</th>
         					<th>Username</th>
                  <th>Email</th>
                  <th>Access Role</th>
                  <th>Status</th>
                  <th>Last Login At</th>
                  <th>Last Login From</th>
        					<th>Created At</th>
         					<th></th>
         				</tr>
         			</thead>
         			<tbody>
                @foreach($data as $key=>$user)
         				<tr>
         					<td>{{ $key+1 }}</td>
         					<td>{{ $user->name }}</td>
            					<td>{{ $user->email }}</td>
                      <td>
                        @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                          <span class="badge badge-danger">{{ $v }}</span>
                          @endforeach
                        @endif 
                      </td>
            					<td>
                          @if(($user->status_id) == '13ca0601-de87-4d58-8ccd-d1f01dba78d8' )
                          <span class="badge badge-info">{{ $user->Statuses->name }}</span>
                          @else
                          <span class="badge badge-danger">{{ $user->Statuses->name }}</span>
                          @endif
                      </td>
                      <td>
                          @if(!empty($user->last_login_at)) 
                            {{date("d F Y H:i",strtotime($user->last_login_at)) }}
                          @endif
                      </td>
                      <td>
                          @if(!empty($user->last_login_from)) 
                            {{ $user->last_login_from }}
                          @endif
                      </td>
                      <td>{{date("d F Y H:i",strtotime($user->created_at)) }}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item modalMd" href="#" value="{{ action('Apps\ConfigurationController@userEdit',['id'=>$user->id]) }}" data-toggle="modal" data-target="#modalMd">Edit User</a>
                            {!! Form::open(['method' => 'POST','route' => ['user.suspend', $user->id],'style'=>'dropdown-item','onsubmit' => 'return ConfirmSuspend()']) !!}
                            {!! Form::button('<a>Suspend User</a>',['type'=>'submit','class' => 'dropdown-item']) !!}
                            {!! Form::close() !!}
                            {!! Form::open(['method' => 'POST','route' => ['user.destroy', $user->id],'style'=>'dropdown-item','onsubmit' => 'return ConfirmSuspend()']) !!}
                            {!! Form::button('<a>Delete User</a>',['type'=>'submit','class' => 'dropdown-item']) !!}
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </td>
            				</tr>
                    @endforeach
            			</tbody>
            		</table>
            	</div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script><script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
    function ConfirmDelete()
    {
    var x = confirm("User Akan Dihapus?");
    if (x)
        return true;
    else
        return false;
    }
</script>
<script>
    function ConfirmSuspend()
    {
    var x = confirm("User Akan Dinonaktifkan?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection