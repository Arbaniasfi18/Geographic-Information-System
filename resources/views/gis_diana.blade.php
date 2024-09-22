<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta GIS Clustering DIANA</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
        #clusters {
            margin-top: 20px;
        }
        h2, h3 {
            margin-bottom: 10px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 5px;
        }
        h1 {
            text-align:center;
        }
    </style>
</head>
<body>
    <h1>Peta GIS COVID-19 Clustering DIANA Provinsi Sumatera Utara</h1>
    <div id="map"></div>
    <div id="clusters">
        <h2>Hasil Klastering</h2>
        @foreach ($clusters as $label => $indices)
            <h3>{{ $label }}</h3>
            <ul>
                @foreach ($indices as $index)
                    <li>{{ $names[$index] }}: 
                        Angka Positif: {{ $dataPoints[$index][0] }}, 
                        Sembuh: {{ $dataPoints[$index][1] }}, 
                        Angka Mati: {{ $dataPoints[$index][2] }}
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([3.5852, 98.6756], 7); // Mengatur posisi awal peta
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var clusterColors = ['red', 'orange', 'green', 'yellow']; // Warna untuk setiap cluster

        var dataClusters = @json($clusters);
        var dataPoints = @json($dataPoints);
        var names = @json($names);

        Object.keys(dataClusters).forEach(function(label, clusterIndex) {
            var color = clusterColors[clusterIndex];
            dataClusters[label].forEach(function(index) {
                var point = dataPoints[index];
                var name = names[index];
                var latitude = point[3];
                var longitude = point[4];

                L.circleMarker([latitude, longitude], {
                    color: color,
                    radius: 8
                }).bindPopup(
                    '<b>' + name + '</b><br>' +
                    'Angka Positif: ' + point[0] + '<br>' +
                    'Sembuh: ' + point[1] + '<br>' +
                    'Angka Mati: ' + point[2]
                ).addTo(map);
            });
        });
    </script>
</body>
</html>
        