@extends('admin_main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Peta Penyebaran Kasus Tuberkulosis Sumatera Utara</h3>
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
                      <div class="box-header">
                          <h4 class="box-title align-items-start flex-column">
                              Peta Penyebaran Tahun 2023
                          
                          </h4>
                      </div>
                      <div class="box-body">
                          <div id="map2023" class="post__img" style="height: 400px; width: 100%;"></div> 
                      </div>
                  </div>  
              </div>
              <div class="col-12">
                  <div class="box">
                      <div class="box-header">
                          <h4 class="box-title align-items-start flex-column">
                              Peta Penyebaran Tahun 2022
                              
                          </h4>
                      </div>
                      <div class="box-body">
                          <div id="map2022" class="post__img" style="height: 400px; width: 100%;"></div> 
                      </div>
                  </div>  
              </div>
              <div class="col-12">
                  <div class="box">
                      <div class="box-header">
                          <h4 class="box-title align-items-start flex-column">
                              Peta Penyebaran Tahun 2021
                              
                          </h4>
                      </div>
                      <div class="box-body">
                          <div id="map2021" class="post__img" style="height: 400px; width: 100%;"></div> 
                      </div>
                  </div>  
              </div>
              <div class="col-12">
                  <div class="box">
                      <div class="box-header">
                          <h4 class="box-title align-items-start flex-column">
                              Peta Penyebaran Tahun 2020
                              
                          </h4>
                      </div>
                      <div class="box-body">
                          <div id="map2020" class="post__img" style="height: 400px; width: 100%;"></div> 
                      </div>
                  </div>  
              </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
    
  	
	 

	<!-- Leaflet JS -->
	<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
	<script>
	  // Inisialisasi peta dan set view pada koordinat tertentu (misalnya 51.505, -0.09) dan tingkat zoom 13
	  var map2020 = L.map('map2020').setView([1.8293464,98.0994099], 7);
	  var map2021 = L.map('map2021').setView([1.8293464,98.0994099], 7);
	  var map2022 = L.map('map2022').setView([1.8293464,98.0994099], 7);
	  var map2023 = L.map('map2023').setView([1.8293464,98.0994099], 7);
  
	  // Menambahkan layer peta (misalnya OpenStreetMap)
	  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	  }).addTo(map2020);
	  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	  }).addTo(map2021);
	  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	  }).addTo(map2022);
	  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	  }).addTo(map2023);

      // Menambahkan lingkaran dengan radius tertentu
    var tbcTotal = @json($clstr2020);
    var dataPoints = tbcTotal['dataPoints'];
    var clusters = tbcTotal['clusters'];

    var clusterColors = ['red', 'orange', 'green', 'yellow']; // Warna untuk setiap cluster

    for (let index = 0; index < dataPoints.length; index++) {
      var cluster = 0;
      
      if (clusters['Cluster 1'].includes(index)) {
        cluster = 0;
      }else if (clusters['Cluster 2'].includes(index)) {
        cluster = 1;
      }else if (clusters['Cluster 3'].includes(index)) {
        cluster = 2;
      }else if (clusters['Cluster 4'].includes(index)) {
        cluster = 3;
      }

      var circle = L.circleMarker([dataPoints[index][3], dataPoints[index][4]], {
        color: clusterColors[cluster],
        fillOpacity: 0.5,
        radius: 5
      }).bindPopup(
        '<b>' + tbcTotal['names'][index] + '</b><br>' +
        'Angka Positif: ' + dataPoints[index][0] + '<br>' +
        'Sembuh: ' + dataPoints[index][1] + '<br>' +
        'Angka Mati: ' + dataPoints[index][2]
      ).addTo(map2020);
    }


    var tbcTotal = @json($clstr2021);
    var dataPoints = tbcTotal['dataPoints'];
    var clusters = tbcTotal['clusters'];

    var clusterColors = ['red', 'orange', 'green', 'yellow']; // Warna untuk setiap cluster

    for (let index = 0; index < dataPoints.length; index++) {
      var cluster = 0;
      
      if (clusters['Cluster 1'].includes(index)) {
        cluster = 0;
      }else if (clusters['Cluster 2'].includes(index)) {
        cluster = 1;
      }else if (clusters['Cluster 3'].includes(index)) {
        cluster = 2;
      }else if (clusters['Cluster 4'].includes(index)) {
        cluster = 3;
      }

      var circle = L.circleMarker([dataPoints[index][3], dataPoints[index][4]], {
        color: clusterColors[cluster],
        fillOpacity: 0.5,
        radius: 5
      }).bindPopup(
        '<b>' + tbcTotal['names'][index] + '</b><br>' +
        'Angka Positif: ' + dataPoints[index][0] + '<br>' +
        'Sembuh: ' + dataPoints[index][1] + '<br>' +
        'Angka Mati: ' + dataPoints[index][2]
      ).addTo(map2021);
    }


    var tbcTotal = @json($clstr2022);
    var dataPoints = tbcTotal['dataPoints'];
    var clusters = tbcTotal['clusters'];

    var clusterColors = ['red', 'orange', 'green', 'yellow']; // Warna untuk setiap cluster

    for (let index = 0; index < dataPoints.length; index++) {
      var cluster = 0;
      
      if (clusters['Cluster 1'].includes(index)) {
        cluster = 0;
      }else if (clusters['Cluster 2'].includes(index)) {
        cluster = 1;
      }else if (clusters['Cluster 3'].includes(index)) {
        cluster = 2;
      }else if (clusters['Cluster 4'].includes(index)) {
        cluster = 3;
      }

      var circle = L.circleMarker([dataPoints[index][3], dataPoints[index][4]], {
        color: clusterColors[cluster],
        fillOpacity: 0.5,
        radius: 5
      }).bindPopup(
        '<b>' + tbcTotal['names'][index] + '</b><br>' +
        'Angka Positif: ' + dataPoints[index][0] + '<br>' +
        'Sembuh: ' + dataPoints[index][1] + '<br>' +
        'Angka Mati: ' + dataPoints[index][2]
      ).addTo(map2022);
    }


    var tbcTotal = @json($clstr2023);
    var dataPoints = tbcTotal['dataPoints'];
    var clusters = tbcTotal['clusters'];

    var clusterColors = ['red', 'orange', 'green', 'yellow']; // Warna untuk setiap cluster

    for (let index = 0; index < dataPoints.length; index++) {
      var cluster = 0;
      
      if (clusters['Cluster 1'].includes(index)) {
        cluster = 0;
      }else if (clusters['Cluster 2'].includes(index)) {
        cluster = 1;
      }else if (clusters['Cluster 3'].includes(index)) {
        cluster = 2;
      }else if (clusters['Cluster 4'].includes(index)) {
        cluster = 3;
      }

      var circle = L.circleMarker([dataPoints[index][3], dataPoints[index][4]], {
        color: clusterColors[cluster],
        fillOpacity: 0.5,
        radius: 5
      }).bindPopup(
        '<b>' + tbcTotal['names'][index] + '</b><br>' +
        'Angka Positif: ' + dataPoints[index][0] + '<br>' +
        'Sembuh: ' + dataPoints[index][1] + '<br>' +
        'Angka Mati: ' + dataPoints[index][2]
      ).addTo(map2023);
    }
  
	</script>


@endsection