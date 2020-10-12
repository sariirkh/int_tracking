       <!-- Begin Page Content -->
       <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kendaraan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href=""><?php echo $kendaraan; ?>    </div>
          </div>
          <div class="col-auto">
            <i class="fas fa fa-truck fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Request Rute</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href=""><?php echo $lokasi; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa fa-map-marker fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">History</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href=""><?php echo $riwayat; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa fa-chart-area fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengguna</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href=""><?php echo $pengguna_kendaraan; ?></div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
       </div>

<!-- leaflet map -->
<div id="mapid" style="width: 100%; height: 500px;" >
<link rel="stylesheet" href="<?= base_url(); ?>/asset/leaflet/leaflet.css" />
<script src="<?= base_url(); ?>/asset/leaflet/leaflet.js"></script>
 
<style>
#map{ margin: 0 auto 0 auto;
  height: 90%;
  width: 80%;
 }
 html, body {
        height: 100%;
      }
</style>

<div id="map"></div>
 
<script>
    var map = L.map('map').setView([42.35, -71.08], 13);
  
    
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
    
    map.on('click', function (e) {
    alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng);
});
     
    // needed token
    //ACCESS_TOKEN = 'pk.eyJ1IjoibWFwYm94IiwiYSI6IjZjNmRjNzk3ZmE2MTcwOTEwMGY0MzU3YjUzOWFmNWZhIn0.Y8bhBaUMqFiPrDRW9hieoQ';
ACCESS_TOKEN = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw';
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + ACCESS_TOKEN, {
        attribution: 'Imagery © <a href="http://mapbox.com">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(map); 
</script>
</div>