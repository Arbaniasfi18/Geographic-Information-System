@extends('main')

@section('content')

 <!-- ========================
       page title 
    =========================== -->
    {{-- @dd($tbc) --}}
    <section class="page-title pt-30 pb-30 text-center">
        <div class="container">
          <div class="row align-items-center">
            <h1 class="post__title mb-30">
                Peta Sebaran Penyakit Tuberkulosis Tahun {{ $tahun }}
            </h1>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
      <!-- ======================
        Blog Single
      ========================= -->
      <section class="blog blog-single pt-0 pb-80">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
              <div class="post-item mb-0">
                <div id="map" class="post__img" style="height: 500px; width: 100%;"></div>  
              </div><!-- /.post-item --> 
            </div><!-- /.col-lg-8 -->
            <div class="col-sm-12 col-md-12 col-lg-4">
              <aside class="sidebar">
                <div class="widget widget-categories">
                  <h5 class="widget__title">Tahun Penyebaran</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled mb-0">
                      <li><a href="{{ url('peta-sebaran/2020') }}"><span class="cat-count">1</span><span>2020</span></a></li>
                      <li><a href="{{ url('peta-sebaran/2021') }}"><span class="cat-count">2</span><span>2021</span></a></li>
                      <li><a href="{{ url('peta-sebaran/2022') }}"><span class="cat-count">3</span><span>2022</span></a></li>
                      <li><a href="{{ url('peta-sebaran/2023') }}"><span class="cat-count">4</span><span>2023</span></a></li>
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-categories -->
              </aside><!-- /.sidebar -->
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
          <div id="clusters" style="margin-top: 20px">
            <h4>Hasil Klastering</h4>
            @foreach ($tbc['clusters'] as $label => $indices)
                <h6>{{ $label }}</h6>
                <ul>
                    @foreach ($indices as $index)
                        <li>{{ $tbc['names'][$index] }}: 
                            Angka Positif: {{ $tbc['dataPoints'][$index][0] }}, 
                            Sembuh: {{ $tbc['dataPoints'][$index][1] }}, 
                            Angka Mati: {{ $tbc['dataPoints'][$index][2] }}
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
        </div><!-- /.container -->
      </section><!-- /.blog Single -->

      

       <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

  <script>
    // Inisialisasi peta dan set view pada koordinat tertentu (misalnya 51.505, -0.09) dan tingkat zoom 13
    var map = L.map('map').setView([1.8293464,98.0994099], 7);

    // Menambahkan layer peta (misalnya OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    // Menambahkan lingkaran dengan radius tertentu
    var tbcTotal = @json($tbc);
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
      ).addTo(map);
    }

  </script>

@endsection