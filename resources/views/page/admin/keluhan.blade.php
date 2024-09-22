@extends('admin_main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-12">

                  <div class="box">
                      <div class="box-header with-border">
                      <h3 class="box-title">Pertanyaan dan keluhan Masyarakat</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                          <table id="example5" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Nama</th>
                                      <th>Email</th>
                                      <th>Telepon</th>
                                      <th>Permasalahan</th>
                                      <th>Pesan</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($keluhan as $item)
                                    
                                <tr>
                                    <th>{{ $item['nama'] }}</th>
                                    <th>{{ $item['emaiL'] }}</th>
                                    <th>{{ $item['telepon'] }}</th>
                                    <th>{{ $item['permasalahan'] }}</th>
                                    <th>{{ $item['pesan'] }}</th>
                                </tr>

                                @endforeach
                                  
                              <tfoot>
                                  <tr>
                                      <th>Nama</th>
                                      <th>Email</th>
                                      <th>Telepon</th>
                                      <th>Permasalahan</th>
                                      <th>Pesan</th>
                                  </tr>
                              </tfoot>
                          </table>
                          </div>
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