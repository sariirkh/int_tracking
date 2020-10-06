<!-- leaflet map -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/leaflet/leaflet.css" />
<script src="<?= base_url(); ?>/assets/leaflet/leaflet.js"></script>
 
<style>
#map { height: 500px;
    width: 1000px; 
    }
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
    var marker = L.marker([-8.203184,113.571038]).addTo(map);
    marker.bindPopup('<b>PT. Mangli Djaya Raya</b><br>JL Mayjend DI Panjaitan No.99, Krajan, Petung, Kec. Bangsalsari, Kabupaten Jember, Jawa Timur 68154');

    //buat ambil lat, long
    map.on('click', function (e) {
    alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng);
});
</script>