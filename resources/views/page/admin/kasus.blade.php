@extends('admin_main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Kasus Tuberkulosis Sumatera Utara</h3>
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
                      <h3 class="box-title">Data Tuberkulosis Tahun 2023</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                          <table id="example5" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Nama Kabupaten Atau Kota</th>
                                      <th>Penderita</th>
                                      <th>Sembuh</th>
                                      <th>Menderita</th>
                                  </tr>
                              </thead>
                              <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                @foreach ($clstr2023['dataPoints'] as $item)
                                    <tr>
                                        <td>{{ $clstr2023['names'][$count] }}</td>
                                        <td>{{ $item[0] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                    </tr>
                                    @php
                                        $count+=1;
                                    @endphp
                                @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Kabupaten / Kota</th>
                                      <th>Penderita</th>
                                      <th>Sembuh</th>
                                      <th>Menderita</th>
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

      <section class="content">
          <div class="row">
              <div class="col-12">

                  <div class="box">
                      <div class="box-header with-border">
                      <h3 class="box-title">Data Tuberkulosis Tahun 2022</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                          <table id="example5" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Nama Kabupaten Atau Kota</th>
                                      <th>Penderita</th>
                                      <th>Sembuh</th>
                                      <th>Menderita</th>
                                  </tr>
                              </thead>
                              <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                @foreach ($clstr2022['dataPoints'] as $item)
                                    <tr>
                                        <td>{{ $clstr2022['names'][$count] }}</td>
                                        <td>{{ $item[0] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                    </tr>
                                    @php
                                        $count+=1;
                                    @endphp
                                @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Kabupaten / Kota</th>
                                      <th>Penderita</th>
                                      <th>Sembuh</th>
                                      <th>Menderita</th>
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

      <section class="content">
          <div class="row">
              <div class="col-12">

                  <div class="box">
                      <div class="box-header with-border">
                      <h3 class="box-title">Data Tuberkulosis Tahun 2021</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                          <table id="example5" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Nama Kabupaten Atau Kota</th>
                                      <th>Penderita</th>
                                      <th>Sembuh</th>
                                      <th>Menderita</th>
                                  </tr>
                              </thead>
                              <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                @foreach ($clstr2021['dataPoints'] as $item)
                                    <tr>
                                        <td>{{ $clstr2021['names'][$count] }}</td>
                                        <td>{{ $item[0] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                    </tr>
                                    @php
                                        $count+=1;
                                    @endphp
                                @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Kabupaten / Kota</th>
                                      <th>Penderita</th>
                                      <th>Sembuh</th>
                                      <th>Menderita</th>
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
      <section class="content">
          <div class="row">
              <div class="col-12">

                  <div class="box">
                      <div class="box-header with-border">
                      <h3 class="box-title">Data Tuberkulosis Tahun 2020</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                          <table id="example5" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Nama Kabupaten Atau Kota</th>
                                      <th>Penderita</th>
                                      <th>Sembuh</th>
                                      <th>Menderita</th>
                                  </tr>
                              </thead>
                              <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                @foreach ($clstr2020['dataPoints'] as $item)
                                    <tr>
                                        <td>{{ $clstr2020['names'][$count] }}</td>
                                        <td>{{ $item[0] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                    </tr>
                                    @php
                                        $count+=1;
                                    @endphp
                                @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Kabupaten / Kota</th>
                                      <th>Penderita</th>
                                      <th>Sembuh</th>
                                      <th>Menderita</th>
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