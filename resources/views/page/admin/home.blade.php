@extends('admin_main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xxl-4 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Penderita 2023</p>
                                <h3 class="text-white mb-0 font-weight-500">{{ $positif }} <small class="text-danger"><i class="fa fa-caret-up"></i>+{{ $update_positif }}%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Sembuh Tahun 2023</p>
                                <h3 class="text-white mb-0 font-weight-500">{{ $sembuh }} <small style="color: rgb(6, 184, 6)"><i class="fa fa-caret-up"></i>{{ $update_sembuh }}%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Meninggal Tahun 2023</p>
                                <h3 class="text-white mb-0 font-weight-500">{{ $mati }} <small style="color: rgb(6, 184, 6)"><i class="fa fa-caret-up"></i>{{ $update_mati }}%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xxxl-7 col-xl-6 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Grafik kasus TBC Tahun 2023</h4>
                        </div>
                        <div class="box-body">
                            <div id="recent_trend"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xxxl-7 col-xl-6 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Grafik kasus TBC Tahun 2022</h4>
                        </div>
                        <div class="box-body">
                            <div id="recent_trend1"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xxxl-7 col-xl-6 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Grafik kasus TBC Tahun 2021</h4>
                        </div>
                        <div class="box-body">
                            <div id="recent_trend2"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xxxl-7 col-xl-6 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Grafik kasus TBC Tahun 2020</h4>
                        </div>
                        <div class="box-body">
                            <div id="recent_trend3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
    
@endsection