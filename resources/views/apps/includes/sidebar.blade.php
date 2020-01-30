<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="index3.html" class="brand-link">

      <img src="{{ asset('public/assets/img/logo_resize.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><img src="{{ asset('public/assets/img/logo.png') }}" style="opacity: .8"></span>

     
    </a>
    <div class="sidebar">
    	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
	        <div class="image">
	           <img src="{{ asset('public/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
	        </div>
	        <div class="info">
	           <a href="{{ route('home.index') }}" class="d-block">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a>
	        </div>
	    </div>
	    <nav class="mt-2">
	    	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{set_open('dashboard.index') }}">
	    			<a href="{{ route('dashboard.index') }}" class="nav-link {{set_active('dashboard.index') }}">
            	<i class="nav-icon fas fa-tachometer-alt"></i>
            	<p>
            		Main Dashboard
            	</p>
            </a>
          </li>
          @if(\Route::current()->getName() == 'home.index')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grievance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Appraisal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Training</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reimbursment</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(\Route::is(['application.index','config.index','position.index','leaveType.index','reimbursType.index','docCat.index','grievCat.index','coaCat.index','assetCat.index','user.index','logs.index','role.index','role.create']))
          <li class="nav-item">
            <a href="{{ route('application.index') }}" class="nav-link {{set_active('application.index') }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Application
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{set_open(['user.index','logs.index','role.index','role.create']) }}">
            <a href="#" class="nav-link {{set_active(['user.index','logs.index','role.index','role.create']) }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{set_active('user.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Database</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link {{set_active(['role.index','role.create']) }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Access Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logs.index') }}" class="nav-link {{set_active('logs.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Activity Log</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{set_open(['position.index','leaveType.index','reimbursType.index','docCat.index','grievCat.index']) }}">
            <a href="#" class="nav-link {{set_active(['position.index','leaveType.index','reimbursType.index','docCat.index','grievCat.index']) }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Human Resources
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('position.index') }}" class="nav-link {{set_active('position.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Position</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('leaveType.index') }}" class="nav-link {{set_active('leaveType.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('reimbursType.index') }}" class="nav-link {{set_active('reimbursType.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reimbursment Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('docCat.index') }}" class="nav-link {{set_active('docCat.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Document Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('grievCat.index') }}" class="nav-link {{set_active('grievCat.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grievance Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{set_open(['coaCat.index','assetCat.index']) }}">
            <a href="#" class="nav-link {{set_active(['coaCat.index','assetCat.index']) }}">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Accounting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('coaCat.index') }}" class="nav-link {{set_active('coaCat.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chart of Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('assetCat.index') }}" class="nav-link {{set_active('assetCat.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asset Category</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(\Route::is(['hr.index','employee.index','attendance.index','request.index','appraisal.index']))
          <li class="nav-item {{set_open(['employee.index']) }}">
            <a href="{{ route('employee.index') }}" class="nav-link {{set_active('employee.index') }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Employee Database
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{set_open(['attendance.index','request.index']) }}">
            <a href="#" class="nav-link {{set_active(['attendance.index','request.index']) }}">
              <i class="nav-icon fas fa-user-clock"></i>
              <p>
                Attendance
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{set_open(['attendance.index']) }}">
                <a href="{{ route('attendance.index') }}" class="nav-link {{set_active('attendance.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Attendance</p>
                </a>
              </li>
              <li class="nav-item {{set_open(['request.index']) }}">
                <a href="{{ route('request.index') }}" class="nav-link {{set_active('request.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Approval</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-certificate"></i>
              <p>
                Training
              </p>
            </a>
          </li>
          <li class="nav-item {{set_open('appraisal.index') }}">
            <a href="{{ route('appraisal.index') }}" class="nav-link {{set_active('appraisal.index') }}">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
                Appraisal
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Bulletin Board
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Bulletin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Knowledge Base</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Bulletin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Knowledge Base</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(\Route::current()->getName() == 'grievance.index')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Manual Input
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Grievance Process
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Database</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management Respond</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Bulletin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Knowledge Base</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(\Route::is(['accounting.index','bank.index']))
          <li class="nav-item {{set_open('bank.index') }}">
            <a href="{{ route('bank.index') }}" class="nav-link {{set_active('bank.index') }}">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Bank Statement
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Transaction
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Asset Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Budget Manager
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
    </div>
</aside>

            	