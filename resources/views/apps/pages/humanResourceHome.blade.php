@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Human Resources
@endsection
@section('header.plugins')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawGenderChart);
	google.charts.setOnLoadCallback(drawAgeChart);
    function drawGenderChart() {
        var gender = <?php echo $getGender; ?>;
        var data = google.visualization.arrayToDataTable(gender);
        var options = {
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.PieChart(document.getElementById('Gender_chart_div'));
        chart.draw(data, options);
    }
	function drawAgeChart() {
        var ages = <?php echo $getAge; ?>;
        var data = google.visualization.arrayToDataTable(ages);
        var options = {
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('Age_chart_div'));
        chart.draw(data, options);
    }
</script>
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Human Resources Dashboard</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
	<div class="row">
		<div class="col-8">
			<div class="row">
				<div class="col-md-6">
					<div class="card card-danger card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<p><strong>Employee On Leave Today</strong></p>
								<table class="table table-head-fixed text-nowrap">
									<thead>
										<tr>
											<th>ID</th>
											<th>Employee Name</th>
											<th>Active On</th>
										</tr>
									</thead>
									<tbody>
										@foreach($onLeave as $leave)
										<tr>
											<td>{{ $leave->Employees->employee_no }}</td>
											<td>{{ $leave->Employees->first_name }} {{ $leave->Employees->last_name }}</td>
											<td>{{date("d F Y H:i",strtotime($leave->leave_end)) }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card card-info card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<p><strong>Employee Birthday Today</strong></p>
								<table class="table table-head-fixed text-nowrap">
									<thead>
										<tr>
											<th>ID</th>
											<th>Employee Name</th>
											<th>Birthday</th>
										</tr>
									</thead>
									<tbody>
										@foreach($onBirthday as $date)
										<tr>
											<td>{{ $date->employee_no }}</td>
											<td>{{ $date->first_name }} {{ $date->last_name }}</td>
											<td>{{date("d F Y",strtotime($date->date_of_birth)) }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card card-secondary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<p><strong>Employee by Gender</strong></p>
								<div id="Gender_chart_div" style="width: 100%; min-height: 250px"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card card-secondary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<p><strong>Employee by Age</strong></p>
								<div id="Age_chart_div" style="width: 100%; min-height: 250px"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card card-secondary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<p><strong>Employee by Services</strong></p>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card card-secondary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<p><strong>Employee by Turnover</strong></p>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="card card-lime card-outline">
				<div class="card-body box-profile">
					<div class="text-center">
						<p><strong>Weekly Working Hours</strong></p>
						<table class="table table-head-fixed text-nowrap">
							<thead>
								<tr>
									<th>ID</th>
									<th>Employee Name</th>
									<th>Total Hours</th>
								</tr>
							</thead>
							<tbody>
								@foreach($onAttendance as $absence)
								<tr>
									<td>{{ $absence->employee_no }}</td>
									<td>{{ $absence->first_name }} {{ $absence->last_name }}</td>
									<td>
										{{ $absence->Hours}}
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection