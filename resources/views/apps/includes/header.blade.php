<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{route('userHome.index') }}" class="nav-link {{set_active(['userHome.index','myLeave.index','myReimburs.index','myGrievance.index','myGrievance.create','myGrievance.edit','myGrievance.show',
			'myAppraisal.index','myAppraisal.create','myAppraisal.detail','myDevelopment.create','myAppraisal.show','myAppraisal.edit','myTraining.index','profile.data','family.data','education.data','myBulletin.index','myKnowledge.index',
			'myAttendance.index','myAttendance.search','myBulletin.show','myGrievancePublished.index','myGrievancePublished.show']) }}">Home</a>
		</li>
		@can('Access Configuration')
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{route('config.index') }}" class="nav-link {{set_active(['application.index','config.index','position.index','leaveType.index','reimbursType.index','docCat.index','grievCat.index','user.index','logs.index','role.index','role.create','role.edit','organization.index','office.index','accSet.index','holiday.index','hrSet.index','division.index']) }}">Configuration</a>
		</li>
		@endcan
		@can('Access Human Resources')
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{route('hr.index') }}" class="nav-link {{set_active(['hr.index','employee.index','employee.create','employee.edit','salary.index','bulletin.index','knowledge.index','bulletin.create','bulletin.edit',
			'bulletin.show','knowledge.create','knowledge.edit','knowledge.show','attendance.search','employeeLeave.index','appraisal.show','appraisal.index','appraisal.edit',
			'training.index','attReport.index','attendance.index','reimburs.index','salary.show','appraisal.close','attReport.result','attReport.detail','salarySlips.show']) }}">Human Resources</a>
		</li>
		@endcan
		@can('Access Grievance')
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{route('grievance.index') }}" class="nav-link {{set_active(['grievance.index','grievanceData.index','managementGrievance.index','grievanceData.edit','grievanceData.show','managementGrievance.show',
			'grievanceData.create','grievancePublished.index','grievancePublished.show']) }}">Grievance</a>
		</li>
		@endcan
		@can('Access Accounting')
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{route('accounting.index') }}" class="nav-link {{set_active(['accounting.index','bank.index','accountTransaction.index','accTransaction.index','accTransaction.create','spend.create','receive.create',
			'bankStatement.index','account.show','asset.index','journal.index','journal.report','budget.index','budgetDetail.create','budgetDetail.edit','statToAcc.index','asset.show','coaCat.index','bankAcc.index','assetCat.index','bankStatement.import','asset.index']) }}">Finance</a>
		</li>
		@endcan
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{route('help.index') }}" class="nav-link {{set_active(['help.index']) }}">Help</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{route('support.index') }}" class="nav-link {{set_active(['support.index']) }}">Report Problem</a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i class="fas fa-sign-out-alt"></i> Sign Out
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</li>
	</ul>
</nav>