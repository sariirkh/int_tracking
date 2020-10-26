       <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Tracking</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $kendaraan; ?></h3>

                <p>Kendaraan</p>
              </div>
              <div class="icon">
                <i class="ion ion-model-s"></i>
              </div>
              <a href="kendaraan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $lokasi; ?></h3>

                <p>Request Rute</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-pin"></i>
              </div>
              <a href="request_rute" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $riwayat; ?></h3>

                <p>History Lokasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-time"></i>
              </div>
              <a href="history" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $pengguna_kendaraan; ?></h3>

                <p>Pengguna</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="kendaraan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      

       <!-- Main row -->
       <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">History Kendaraan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <link rel="stylesheet" href="<?= base_url(); ?>/assets/leaflet/leaflet.css" />
                  <script src="<?= base_url(); ?>/assets/leaflet/leaflet.js"></script>
                  
                  <style>
                  #map { height: 500px;
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

                      L.marker([-8.203184,113.571038]).addTo(map)
                      .bindPopup("<b>PT. Mangli Djaya Raya</b><br>JL Mayjend DI Panjaitan No.99, Krajan, Petung, Kec. Bangsalsari, Kabupaten Jember, Jawa Timur 68154</b>")
                      .openPopup();

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
              <!-- /.card-body -->
            </div>
          </div>
       </div>
            <!-- /.card -->

      
        <!-- Small boxes (Stat box) -->
        <div class="row">
      <div class="col-6">
     
     <!-- PIE CHART -->
     <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Kendaraan yang dipakai</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
              <div>
              <h5 align="center"> Kendaraan terakhir yang dipakai </h5>  
              </div>
                <canvas id="pieChartJenis" style="height:230px; min-height:230px"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
              </div>
              <!-- /.footer -->
            
      
            <!-- /.card -->
      

       <div class="col-6">
      <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">History Lokasi Terakhir</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Kendaraan</th>
                      <th>Lokasi</th>
                      <th>Waktu</th>
                      <th style="width: 40px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no =1;
                  foreach($tempat as $baris){
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $baris->jenis_kendaraan?> - <?php echo $baris->nama_kendaraan?> ( <?php echo $baris->nomor_kendaraan?> )</td>
                    <td><?php echo $baris->nama_lokasi?></td>
                    <td><?php echo $baris->r_waktu?></td>
                    <td>
                    <?php            
                    if($baris->status=='di jalan'){
                    ?>
                      <a>Sedang di jalan</a>
                    <?php
                    } 
                    else{
                      echo "Sudah sampai";
                    ?>
                    <?php
                    }?>
                    </td>
                  </tr>
                      <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
       </div>
      </div>
                        
        </div>
        
        <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-gray">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Data Request Rute Dalam 1 Tahun</h3>
                  
                  <div class="card-tools">
                  <a href="Request_rute">View Report</a>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
                </div>
              </div>
              <div class="card-body">
                
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="lineChart" height="200"></canvas>
                </div>

                
              </div>
            </div>

     
          
     
    </section>
                        </div>
                        
  
 
