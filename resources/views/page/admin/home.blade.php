@extends('admin_main')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

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
                                <h3 class="text-white mb-0 font-weight-500" id="tess">{{ $positif }} <small class="text-danger"><i class="fa fa-caret-up"></i>+{{ $update_positif }}%</small></h3>
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
            </div>
            <div class="column">
                
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Grafik kasus TBC Tahun 2023</h4>
                        </div>
                        <div class="box-body">
                            <div id="chart2023" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Grafik kasus TBC Tahun 2022</h4>
                        </div>
                        <div class="box-body">
                            <div id="chart2022" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Grafik kasus TBC Tahun 2021</h4>
                        </div>
                        <div class="box-body">
                            <div id="chart2021" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Grafik kasus TBC Tahun 2020</h4>
                        </div>
                        <div class="box-body">
                            <div id="chart2020" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

<script>

    function showchart(year) {

        if (year == '2020') {
            var cluster = @json($cluster2020);
        }else if (year == '2021') {
            var cluster = @json($cluster2021);
        }else if (year == '2022') {
            var cluster = @json($cluster2022);
        }else if (year == '2023') {
            var cluster = @json($cluster2023);
        }

        var datapositif = [];
        var datamati = [];
        var datasembuh = [];
    
        for (let index = 0; index < cluster['names'].length; index++) {
            var temp = {
                label: cluster['names'][index],
                y: cluster['dataPoints'][index][0],
            }
            var temp1 = {
                label: cluster['names'][index],
                y: cluster['dataPoints'][index][1],
            }
            var temp2 = {
                label: cluster['names'][index],
                y: cluster['dataPoints'][index][2],
            }
            datapositif.push(temp);        
            datasembuh.push(temp1);        
            datamati.push(temp2);        
        }

        var div = '#chart' + year;
    
        var chart = new CanvasJS.Chart("chart" + year, {
            exportEnabled: true,
            animationEnabled: true,
            backgroundColor: "transparent",
            axisX: {
                title: "Kota",
                titleFontColor: "white",
                labelFontColor: "white",  
            },
            axisY: {
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC",
            },
            toolTip: {
                shared: true,
            },
            data: [
                {        
                type: "column",
                name: "Positif",
                dataPoints: datapositif,
            },
            {        
                type: "column",
                name: "Mati",
                dataPoints: datamati
            } ,
            {        
                type: "column",
                name: "Sembuh",
                dataPoints: datasembuh
            } 
                
            ]
        });

        chart.render();

    }

    showchart('2020');
    showchart('2021');
    showchart('2022');
    showchart('2023');


</script>
    
@endsection