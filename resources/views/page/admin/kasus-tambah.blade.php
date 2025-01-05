@extends('admin_main')

@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<div class="container-full">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<h3 class="page-title">Tambah Data Kasus Tuberkulosis Sumatera Utara</h3>
						<div class="d-inline-block align-items-center">
						</div>
					</div>
				</div>
			</div>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title">Tambah Data Tuberkulosis Tahun {{ $tahun }}</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="row">
									<div class="col">
									<form action="{{ url('/admin/data-kasus/tambah/' . $tahun) }}" method="POST">
										@csrf
										<div class="row">
											<div class="col-12">	
												<div class="form-group">
													<h5>Nama Kabupaten atau Kota <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="kota" class="form-control" required data-validation-required-message="This field is required"> </div>
													<div class="form-control-feedback"></div>
												</div>					
												<div class="form-group">
													<h5>Penderita <span class="text-danger">*</span></h5>
													<div class="input-group"> <input type="number" name="penderita" class="form-control" required data-validation-required-message="This field is required"> </div>
												</div>
												<div class="form-group">
													<h5>Sembuh <span class="text-danger">*</span></h5>
													<div class="input-group"> <input type="number" name="sembuh" class="form-control" required data-validation-required-message="This field is required"> </div>
												</div>
												<div class="form-group">
													<h5>Meninggal <span class="text-danger">*</span></h5>
													<div class="input-group"> <input type="number" name="meninggal" class="form-control" required data-validation-required-message="This field is required"> </div>
												</div>
												<div class="form-group">
													<h5>Latitude <span class="text-danger">*</span></h5>
													<div class="input-group"> <input type="number" name="latitude" class="form-control" required data-validation-required-message="This field is required"> </div>
												</div>
												<div class="form-group">
													<h5>Longitude <span class="text-danger">*</span></h5>
													<div class="input-group"> <input type="number" name="longitude" class="form-control" required data-validation-required-message="This field is required"> </div>
												</div>
											
												<div class="text-xs-right">
													<button type="submit" class="btn btn-rounded btn-info">Submit</button>
												</div>
											</div>
										</form>
					
									</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
							</div>
							<!-- /.box-body -->
						</div>
						
					<!-- /.box -->      
					</div> 
					<!-- /.col -->
				</div>
			<!-- /.row -->
			</section>
			<!-- /.content -->
		
		</div>
	</div>
	<!-- /.content-wrapper -->
	


@endsection