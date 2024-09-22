
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar-->
	<section class="sidebar">	
		
		<div class="user-profile">
			<div class="ulogo">
				<a href="index.html">
				<!-- logo for regular state and mobile devices -->
					<div class="d-flex align-items-center justify-content-center">					 	
						<img src="{{ asset('admin/images/Logo3.png') }}" alt="">
					</div>
				</a>
			</div>
		</div>
        
    <!-- sidebar menu-->
	<ul class="sidebar-menu" data-widget="tree">  
		
		<li>
			<a href="{{ url('/admin/dashboard') }}">
				<i data-feather="pie-chart"></i>
				<span>Dashboard</span>
			</a>
		</li>
		
		<li>
			<a href="{{ url('/admin/data-penyebaran') }}">
				<i data-feather="map"></i>
				<span>Peta Penyebaran TBC</span>
			</a>
		</li>

		<li>
			<a href="{{ url('/admin/data-kasus') }}">
				<i data-feather="server"></i>
				<span>Data Kasus TBC</span>
			</a>
		</li>

		<li>
			<a href="{{ url('/admin/keluhan') }}">
				<i data-feather="credit-card"></i>
				<span>Keluhan</span>
			</a>
		</li>

		<li>
		<a href="{{ url('logout') }}">
			<i data-feather="lock"></i>
			<span>Log Out</span>
		</a>
		</li> 
		
	</ul>
	</section>
</aside>
