@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create Role
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create Access Roles</h1>
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
				{!! Form::open(array('route' => 'role.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
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
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>Human Resources Menu</td>
												<td style="text-align:center"><input type="checkbox" value="2" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Grievance Menu</td>
												<td style="text-align:center"><input type="checkbox" value="3" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Accounting Menu</td>
												<td style="text-align:center"><input type="checkbox" value="4" name="permission[]" /></td>
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
												<td style="text-align:center"><input type="checkbox" value="33" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="36" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>User Database</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="5" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="6" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="7" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Access Roles</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="8" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="9" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Human Resources Master Data</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="10" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="11" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="12" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>5</strong></td>
												<td>Accounting Master Data</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="13" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="14" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="15" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>6</strong></td>
												<td>Grievance Master Data</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="37" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="38" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="39" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr style="text-align:center">
												<td style="font-size:16px;" colspan="7"><strong>Human Resources Sub Menu</strong></td>
											</tr>
											<tr>
												<td><strong>1</strong></td>
												<td>Employee Database</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="16" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="17" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="18" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>Attendance & Leave</td>
												<td style="text-align:center"><input type="checkbox" value="34" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="19" name="permission[]" /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Training</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="30" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="31" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="32" name="permission[]" /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Appraisal</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="28" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="29" name="permission[]" /></td>
											</tr>
											<tr>
												<td><strong>5</strong></td>
												<td>Payroll & Reimbursment</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="20" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="21" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="23" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="22" name="permission[]" /></td>
											</tr>
											<tr>
												<td><strong>6</strong></td>
												<td>Bulletin Board</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="40" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="41" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="42" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>7</strong></td>
												<td>Reports</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="47" name="permission[]" /></td>
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
												<td style="text-align:center"><input type="checkbox" value="43" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="44" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="49" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>Moderate Grievance</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="48" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="45" name="permission[]" /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Management Response</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="46" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Reports</td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="50" name="permission[]" /></td>
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
												<td style="text-align:center"><input type="checkbox" value="51" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="52" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="53" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" /></td>
											</tr>
											<tr>
												<td><strong>2</strong></td>
												<td>Import Bank Statement</td>
												<td style="text-align:center"><input type="checkbox" value="51" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="55" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="53" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>3</strong></td>
												<td>Manual Journal</td>
												<td style="text-align:center"><input type="checkbox" value="70" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="56" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="53" name="permission[]"  disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>4</strong></td>
												<td>Asset Management</td>
												<td style="text-align:center"><input type="checkbox" value="57" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="58" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="59" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>5</strong></td>
												<td>Budget Management</td>
												<td style="text-align:center"><input type="checkbox" value="60" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="61" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="62" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>6</strong></td>
												<td>Reports</td>
												<td style="text-align:center"><input type="checkbox" value="63" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="61" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="62" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>7</strong></td>
												<td>Chart of Account</td>
												<td style="text-align:center"><input type="checkbox" value="64" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="65" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="62" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>8</strong></td>
												<td>Asset Category</td>
												<td style="text-align:center"><input type="checkbox" value="66" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="67" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="62" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td style="text-align:center"><input type="checkbox" value="54" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>9</strong></td>
												<td>Bank Account</td>
												<td style="text-align:center"><input type="checkbox" value="68" name="permission[]" /></td>
												<td style="text-align:center"><input type="checkbox" value="69" name="permission[]" /></td>
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