<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
	        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
	    </li>
	    <li class="nav-item d-none d-sm-inline-block">
        	<a href="{{route('home.index') }}" class="nav-link {{set_active('home.index') }}">Home</a>
      	</li>
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="{{route('config.index') }}" class="nav-link {{set_active('config.index') }}">Configuration</a>
      	</li>
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="{{route('hr.index') }}" class="nav-link {{set_active('hr.index') }}">Human Resources</a>
      	</li>
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="{{route('grievance.index') }}" class="nav-link {{set_active('grievance.index') }}">Grievance</a>
      	</li>
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="{{route('accounting.index') }}" class="nav-link {{set_active('accounting.index') }}">Accounting</a>
      	</li>
      
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" href="#">
				<i class="fas fa-sign-out-alt"></i>
			</a>
		</li>
	</ul>
</nav>