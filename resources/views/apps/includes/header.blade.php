<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">

       <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
     	<a href="{{route('userHome.index') }}" class="nav-link {{set_active(['userHome.index','myLeave.index','myReimburs.index','myGrievance.index','myGrievance.create','myGrievance.edit','myGrievance.show','myAppraisal.index','myAppraisal.create','myAppraisal.detail','myDevelopment.create','myAppraisal.show','myAppraisal.edit','myTraining.index']) }}">Home</a>
   	</li>
   	<li class="nav-item d-none d-sm-inline-block">
     	<a href="{{route('config.index') }}" class="nav-link {{set_active(['application.index','config.index','position.index','leaveType.index','reimbursType.index','docCat.index','grievCat.index','coaCat.index','assetCat.index','user.index','logs.index','role.index','role.create']) }}">Configuration</a>
   	</li>
   	<li class="nav-item d-none d-sm-inline-block">
     	<a href="{{route('hr.index') }}" class="nav-link {{set_active(['hr.index','employee.index','employee.create','employee.edit','salary.index','bulletin.index','knowledge.index','bulletin.create','bulletin.edit','bulletin.show','knowledge.create','knowledge.edit','knowledge.show','attendance.search','salary.create','employeeLeave.index','appraisal.show','appraisal.index','appraisal.edit']) }}">Human Resources</a>
   	</li>
   	<li class="nav-item d-none d-sm-inline-block">
     	<a href="{{route('grievance.index') }}" class="nav-link {{set_active(['grievance.index','grievanceData.index','managementGrievance.index','grievanceData.edit','grievanceData.show','managementGrievance.show']) }}">Grievance</a>
   	</li>
   	<li class="nav-item d-none d-sm-inline-block">
     	<a href="{{route('accounting.index') }}" class="nav-link {{set_active(['accounting.index','bank.index']) }}">Accounting</a>
   	</li>     

	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i class="fas fa-sign-out-alt"></i>
			</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
		</li>
	</ul>
</nav>