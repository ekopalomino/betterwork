@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Edit Role
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Edit Access Roles</h1>
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
		<div class="col-12">
			<div class="card card-outline card-danger">
				{!! Form::model($data, ['method' => 'POST','route' => ['role.update', $data->id]]) !!}
				@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<label><strong>Role Name</strong></label>
								{!! Form::text('name', null, array('placeholder' => 'Role Name','class' => 'form-control')) !!}
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<div class="card-body table-responsive p-0" style="height: 525px;">
									<table class="table table-bordered table-head-fixed text-nowrap">
										<thead>
											<tr>
												<th>No</th>
												<th>Menu / Function </th>
												<th>Access Menu</th>
												<th>Create </th>
												<th>Edit </th>
												<th>Delete </th>
												<th>Approve / Reject</th>
											</tr>
										</thead>
										<tbody>
											<tr style="text-align:center">
												<td style="font-size:16px;" colspan="7"><strong>Main Menu</strong></td>
											</tr>
											<tr>
												<td><strong>1</strong></td>
												<td>Configuration Menu</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '1')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>Human Resources Menu</td>
												<td style="text-align:center"><input type="checkbox" value="2" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '2')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Grievance Menu</td>
												<td style="text-align:center"><input type="checkbox" value="3" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '3')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Accounting Menu</td>
												<td style="text-align:center"><input type="checkbox" value="4" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '4')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr style="text-align:center">
												<td style="font-size:16px;" colspan="7"><strong>Configuration Sub Menu</strong></td>
											</tr>
											<tr>
												<td><strong>1</strong></td>
												<td>Application Setting</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="33" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '33')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="36" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '36')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>User Database</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="5" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '5')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="6" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '6')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="7" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '7')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Access Roles</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="8" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '8')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="9" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '9')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Human Resources Master Data</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="10" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '10')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="11" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '11')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="12" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '12')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>5</strong></td>
												<td>Accounting Master Data</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="13" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '13')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="14" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '14')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="15" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '15')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>6</strong></td>
												<td>Grievance Master Data</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="37" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '37')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="38" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '38')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="39" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '39')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr style="text-align:center">
												<td style="font-size:16px;" colspan="7"><strong>Human Resources Sub Menu</strong></td>
											</tr>
											<tr>
												<td><strong>1</strong></td>
												<td>Employee Database</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="16" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '16')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="17" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '17')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="18" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '18')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>Attendance & Leave</td>
												<td style="text-align:center"><input type="checkbox" value="34" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '34')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="19" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '19')checked @endif @endforeach /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Training</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="30" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '30')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="31" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '31')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="32" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '32')checked @endif @endforeach /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Appraisal</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="28" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '28')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="29" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '29')checked @endif @endforeach /></td>
											</tr>
											<tr>
												<td><strong>5</strong></td>
												<td>Payroll & Reimbursment</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="20" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '20')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="21" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '21')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="23" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '23')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="22" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '22')checked @endif @endforeach /></td>
											</tr>
											<tr>
												<td><strong>6</strong></td>
												<td>Bulletin Board</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="40" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '40')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="41" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '41')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="42" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '42')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>7</strong></td>
												<td>Reports</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="47" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '47')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr style="text-align:center">
												<td style="font-size:16px;" colspan="7"><strong>Grievance Sub Menu</strong></td>
											</tr>
											<tr>
												<td><strong>1</strong></td>
												<td>Manual Input</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="43" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '43')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="44" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '44')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="49" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '49')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>Moderate Grievance</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="48" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '48')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="45" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '45')checked @endif @endforeach /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Management Response</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="46" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '46')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Reports</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="50" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '50')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr style="text-align:center">
												<td style="font-size:16px;" colspan="7"><strong>Finance Sub Menu</strong></td>
											</tr>
											<tr>
												<td><strong>1</strong></td>
												<td>Transaction</td>
												<td style="text-align:center"><input type="checkbox" value="51" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '51')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="52" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '52')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="53" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '53')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '54')checked @endif @endforeach /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>Import Bank Statement</td>
												<td style="text-align:center"><input type="checkbox" value="51" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="55" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '55')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="53" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Manual Journal</td>
												<td style="text-align:center"><input type="checkbox" value="70" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '70')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="56" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '56')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="53" name="permission[]"  disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Asset Management</td>
												<td style="text-align:center"><input type="checkbox" value="57" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '57')checked @endif @endforeach/></td>
												<td style="text-align:center"><input type="checkbox" value="58" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '58')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="59" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '59')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>5</strong></td>
												<td>Budget Management</td>
												<td style="text-align:center"><input type="checkbox" value="60" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '60')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="61" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '61')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="62" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '62')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>6</strong></td>
												<td>Reports</td>
												<td style="text-align:center"><input type="checkbox" value="63" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '63')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="61" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="62" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>7</strong></td>
												<td>Chart of Account</td>
												<td style="text-align:center"><input type="checkbox" value="64" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '64')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="65" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '65')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="62" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>8</strong></td>
												<td>Asset Category</td>
												<td style="text-align:center"><input type="checkbox" value="66" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '66')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="67" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '67')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="62" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>9</strong></td>
												<td>Bank Account</td>
												<td style="text-align:center"><input type="checkbox" value="68" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '68')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="69" name="permission[]" @foreach($roles as $rolePermissions) @if($rolePermissions->permission_id == '69')checked @endif @endforeach /></td>
												<td style="text-align:center"><input type="checkbox" value="62" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<br>
	                  	<button type="submit" class="btn btn-sm btn-info">Submit</button>
	                  	<a button type="button" class="btn btn-sm btn-danger" href="{{ route('role.index') }}">Cancel</a>
	                </div>
	            {!! Form::close() !!}
	        </div>
        </div>
    </div>
</section>
@endsection