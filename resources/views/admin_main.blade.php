<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="{{ asset('admin/images/Logo1.png') }}">

	<title>TBC SUMUT- {{ $title }}</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('admin/css/vendors_css.css') }}">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
	
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/skin_color.css') }}">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
@include('template/admin/header')
	@include('template/admin/sidebar')

	@yield('content')
			
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right d-none d-sm-inline-block">
			<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
			<li class="nav-item">
				<a class="nav-link" href="javascript:void(0)">FAQ</a>
			</li>
			</ul>
		</div>
		&copy; 2024 <a href="#">Tuberkulosis Sumatera Utara</a>. All Rights Reserved.
	</footer>
</div>

	<!-- ./wrapper -->
		
		
		<!-- Vendor JS -->
		<script src="{{ asset('admin/js/vendors.min.js') }}"></script>
		<script src="{{ asset('admin/assets/icons/feather-icons/feather.min.js') }}"></script>	
		<script src="{{ asset('admin/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
		<script src="{{ asset('admin/assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
		<script src="{{ asset('admin/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
		
		<!-- Sunny Admin App -->
		<script src="{{ asset('admin/js/template.js') }}"></script>
		<script src="{{ asset('admin/js/pages/dashboard.js') }}"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>