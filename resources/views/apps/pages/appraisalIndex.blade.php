@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Appraisal
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Appraisal</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Appraisal Data</h3>
		</div>
		<div class="card-body p-0">
			<table class="table table-striped projects">
				<thead>
                  	<tr>
                      	<th style="width: 1%">
                        	#
                      	</th>
                      	<th style="width: 20%">
                        	Appraisal Period
                      	</th>
                      	<th style="width: 30%">
                        	Employee
                      	</th>
                      	<th>
                        	Appraisal Progress
                      	</th>
                      	<th style="width: 8%" class="text-center">
                        	Status
                      	</th>
                      	<th style="width: 20%">
                      	</th>
                  	</tr>
              	</thead>
              	<tbody>
              		<tr>
              			<td>
              				1
              			</td>
              			<td>
              				2019
              			</td>
              			<td>
              				<ul class="list-inline">
              					<li class="list-inline-item">
                                	<img alt="Avatar" class="table-avatar" src="{{ asset('public/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}">
                              	</li>
                            </ul>
              			</td>
              			<td class="project_progress">
              				<div class="progress progress-sm">
                            	<div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                              	</div>
                          	</div>
                          	<small>
                            	57% Complete
                          	</small>
                        </td>
                        <td class="project-state">
                        	<span class="badge badge-success">On Progress</span>
                      	</td>
                      	<td class="project-actions text-right">
                        	<a class="btn btn-primary btn-sm" href="#">
                            	<i class="fas fa-folder">
                              	</i>
                              	View
                          	</a>
                          	<a class="btn btn-info btn-sm" href="#">
                            	<i class="fas fa-pencil-alt">
                              	</i>
                              	Edit
                          	</a>
                          	<a class="btn btn-danger btn-sm" href="#">
                            	<i class="fas fa-trash">
                              	</i>
                              	Delete
                          	</a>
                      	</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection