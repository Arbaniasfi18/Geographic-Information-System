    @extends('admin_main')

    @section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header" style="margin-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Data Kasus Tuberkulosis Sumatera Utara</h3>
                    <div class="d-inline-block align-items-center">
                    </div>
                </div>
                <div>
                    <button type="button" class="btn-md btn-success rounded-lg" data-toggle="modal" data-target="#import-modal" style="cursor:pointer;color: white"><strong><i data-feather="file" style="margin-right: 5px"></i><span style="position:relative; top: 2px">Import Data Tahun</span></strong></button>
                </div>
            </div>
      </div>

      @if (\Session::has('success'))
        <div class="alert alert-success">
        {!! \Session::get('success') !!}
        </div>
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger">
        {!! \Session::get('error') !!}
        </div>
    @endif

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-12">

                  <div class="box">
                      <div class="box-header with-border d-flex justify-content-between">
                        <div class="my-auto">
                            <h3 class="box-title">Data Tuberkulosis Tahun 2023</h3>
                        </div>
                        <div class="btn-md btn-success rounded-lg" style="cursor:pointer">
                            <a href="{{ url('admin/data-kasus/tambah/2023') }}" style="color: white"><strong><i data-feather="plus" style="margin-right: 5px"></i><span style="position:relative; top: 2px">Tambah Data</span></strong></a>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                          <table id="example5" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                  <tr>
                                        <th width="230"><center>Action</center></th>
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
                                        <td>
                                            <center>
                                                <a href="{{ url('/admin/data-kasus/update/2023/' . $item[0]) }}" class="btn btn-md btn-warning" style="color: white"><i data-feather="edit" style="margin-right: 5px"></i><span style="position:relative; top: 3px;"><strong>Edit</strong></span></a>
                                                <a href="{{ url('/admin/data-kasus/delete/2023/' . $item[0]) }}" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-md btn-danger" style="color: white"><i data-feather="trash" style="margin-right: 5px"></i><span style="position:relative; top: 3px;"><strong>Delete</strong></span></a>
                                            </center>
                                        </td>
                                        <td>{{ $clstr2023['names'][$count] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                        <td>{{ $item[3] }}</td>
                                    </tr>
                                    @php
                                        $count+=1;
                                    @endphp
                                @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th width="230"><center>Action</center></th>
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
                    <div class="box-header with-border d-flex justify-content-between">
                        <div class="my-auto">
                            <h3 class="box-title">Data Tuberkulosis Tahun 2022</h3>
                        </div>
                        <div class="btn-md btn-success rounded-lg" style="cursor:pointer">
                            <a href="{{ url('admin/data-kasus/tambah/2022') }}" style="color: white"><strong><i data-feather="plus" style="margin-right: 5px"></i><span style="position:relative; top: 2px">Tambah Data</span></strong></a>
                        </div>
                    </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                          <table id="example5" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                  <tr>
                                        <th width="230"><center>Action</center></th>
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
                                        <td>
                                            <center>
                                                <a href="{{ url('/admin/data-kasus/update/2022/' . $item[0]) }}" class="btn btn-md btn-warning" style="color: white"><i data-feather="edit" style="margin-right: 5px"></i><span style="position:relative; top: 3px;"><strong>Edit</strong></span></a>
                                                <a href="{{ url('/admin/data-kasus/delete/2022/' . $item[0]) }}" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-md btn-danger" style="color: white"><i data-feather="trash" style="margin-right: 5px"></i><span style="position:relative; top: 3px;"><strong>Delete</strong></span></a>
                                            </center>
                                        </td>
                                        <td>{{ $clstr2022['names'][$count] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                        <td>{{ $item[3] }}</td>
                                    </tr>
                                    @php
                                        $count+=1;
                                    @endphp
                                @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th width="230"><center>Action</center></th>
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
                    <div class="box-header with-border d-flex justify-content-between">
                        <div class="my-auto">
                            <h3 class="box-title">Data Tuberkulosis Tahun 2021</h3>
                        </div>
                        <div class="btn-md btn-success rounded-lg" style="cursor:pointer">
                            <a href="{{ url('admin/data-kasus/tambah/2021') }}" style="color: white"><strong><i data-feather="plus" style="margin-right: 5px"></i><span style="position:relative; top: 2px">Tambah Data</span></strong></a>
                        </div>
                    </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                          <table id="example5" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                  <tr>
                                        <th width="230"><center>Action</center></th>
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
                                        <td>
                                            <center>
                                                <a href="{{ url('/admin/data-kasus/update/2021/' . $item[0]) }}" class="btn btn-md btn-warning" style="color: white"><i data-feather="edit" style="margin-right: 5px"></i><span style="position:relative; top: 3px;"><strong>Edit</strong></span></a>
                                                <a href="{{ url('/admin/data-kasus/delete/2021/' . $item[0]) }}" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-md btn-danger" style="color: white"><i data-feather="trash" style="margin-right: 5px"></i><span style="position:relative; top: 3px;"><strong>Delete</strong></span></a>
                                            </center>
                                        </td>
                                        <td>{{ $clstr2021['names'][$count] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                        <td>{{ $item[3] }}</td>
                                    </tr>
                                    @php
                                        $count+=1;
                                    @endphp
                                @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th width="230"><center>Action</center></th>
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
                    <div class="box-header with-border d-flex justify-content-between">
                        <div class="my-auto">
                            <h3 class="box-title">Data Tuberkulosis Tahun 2020</h3>
                        </div>
                        <div class="btn-md btn-success rounded-lg" style="cursor:pointer">
                            <a href="{{ url('admin/data-kasus/tambah/2020') }}" style="color: white"><strong><i data-feather="plus" style="margin-right: 5px"></i><span style="position:relative; top: 2px">Tambah Data</span></strong></a>
                        </div>
                    </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                          <table id="example5" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                  <tr>
                                        <th width="200">Action</center></th>
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
                                        <td>
                                            <center>
                                                <a href="{{ url('/admin/data-kasus/update/2020/' . $item[0]) }}" class="btn btn-md btn-warning" style="color: white"><i data-feather="edit" style="margin-right: 5px"></i><span style="position:relative; top: 3px;"><strong>Edit</strong></span></a>
                                                <a href="{{ url('/admin/data-kasus/delete/2020/' . $item[0]) }}" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-md btn-danger" style="color: white"><i data-feather="trash" style="margin-right: 5px"></i><span style="position:relative; top: 3px;"><strong>Delete</strong></span></a>
                                            </center>
                                        </td>
                                        <td>{{ $clstr2020['names'][$count] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                        <td>{{ $item[3] }}</td>
                                    </tr>
                                    @php
                                        $count+=1;
                                    @endphp
                                @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th width="230"><center>Action</center></th>
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



<!-- Modal -->
<div class="modal fade" id="import-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: white; font-size: 20px">Import File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/admin/data-kasus/import') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="custom-file">
                            <input type="file" accept=".xlsx" id="inputGroupFile01" name="import" aria-describedby="inputGroupFileAddon01" style="color: white">
                            </div>
                        </div>
                        <a href="{{ url('/admin/data-kasus/template') }}" style="color: white; font-size: 15px">Download template</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#inputGroupFile01').on('change', function() {
        console.log($(this).val());
    });
</script>
  
@endsection