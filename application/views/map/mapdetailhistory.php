    <!-- /.card-header -->
    <div class="card-body p-0">
    <div class="d-md-flex">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/leaflet/leaflet.css" />
        <script src="<?= base_url(); ?>/assets/leaflet/leaflet.js"></script>
        
        <style>
        #map { height: 550px;
            width: 100%; 
            }
            .address { cursor:pointer }
        .address:hover { color:#AA0000;text-decoration:underline }
        </style>
        <div id="map"></div>

        
        <script>
            //lat, long
            var map = L.map('map').setView([-8.203184,113.571038], 13);

            
            L.tileLayer('http://tiles.mapc.org/basemap/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 17,
                minZoom: 9   
            }).addTo(map);
        
            // bike lanes
            L.tileLayer('http://tiles.mapc.org/trailmap-onroad/{z}/{x}/{y}.png', {
                maxZoom: 17,
                minZoom: 9
            }).addTo(map);
        
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 17,
                minZoom: 9   
            }).addTo(map);
            
            
            // needed token
            ACCESS_TOKEN = 'pk.eyJ1IjoibWFwYm94IiwiYSI6IjZjNmRjNzk3ZmE2MTcwOTEwMGY0MzU3YjUzOWFmNWZhIn0.Y8bhBaUMqFiPrDRW9hieoQ';
            ACCESS_TOKEN = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw';
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + ACCESS_TOKEN, {
                attribution: 'Imagery © <a href="http://mapbox.com">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(map); 

            //buat titik lokasi
            // var marker = L.marker([-8.203184,113.571038]).addTo(map);
            // marker.bindPopup('<b>PT. Mangli Djaya Raya</b><br>JL Mayjend DI Panjaitan No.99, Krajan, Petung, Kec. Bangsalsari, Kabupaten Jember, Jawa Timur 68154');
            
            <?php foreach ($marker as $key =>  $value) { ?>
            L.marker([<?= $value['lat'] ?>, <?= $value['lng'] ?>])
            .bindPopup("<h5><b>Lokasi : <?= $value['nama_lokasi'] ?> </b></h5>")
            .addTo(map);
            <?php } ?>

            // L.marker([-8.203184,113.571038]).addTo(map)
            // .bindPopup("<b>PT. Mangli Djaya Raya</b><br>JL Mayjend DI Panjaitan No.99, Krajan, Petung, Kec. Bangsalsari, Kabupaten Jember, Jawa Timur 68154</b>")
            // .openPopup();

            var popup = L.popup();
        function onMapClick(e) {
            popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(mymap);
        }
        mymap.on('click', onMapClick);

        map.on('draw:created', function (e) {
                    layer = e.layer;
                    var lat = layer.getLatLng().lat;
                    var lng = layer.getLatLng().lng;

                    if (e.layerType === '-8.203184,113.571038') {
                        //layer.bindPopup('A popup!');
                    }
                });
        
        </script>

    </div><!-- /.d-md-flex -->
    </div>

<!-- /.card -->
            </div>