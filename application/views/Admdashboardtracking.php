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
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kendaraan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="Kendaraan" ><?php echo $kendaraan; ?>   </div>
          </div></a> 
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
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="Request_rute"><?php echo $lokasi; ?></div>
          </div></a>
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
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="History"><?php echo $riwayat; ?></div>
          </div></a>
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
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengguna</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="Request_rute"><?php echo $pengguna_kendaraan; ?></div>
              </div></a>
              <div class="col">
                
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

<?php 
  $this->load->view('map/index');
?>
       <!-- <div id="mapid" style="width: 100%; height: 500px;" ></div>
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

	var mymap = L.map('mapid').setView([-7.536064, 112.4620297], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 20,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	L.marker([-7.2636084, 112.7428945]).addTo(mymap)
		.bindPopup("<b>Kota Surabaya</b>")
    .openPopup();

	// L.circle([51.508, -0.11], 500, {
	// 	color: 'red',
	// 	fillColor: '#f03',
	// 	fillOpacity: 0.5
	// }).addTo(mymap).bindPopup("I am a circle.");

	// L.polygon([
	// 	[51.509, -0.08],
	// 	[51.503, -0.06],
	// 	[51.51, -0.047]
	// ]).addTo(mymap).bindPopup("I am a polygon.");


	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);

</script> -->