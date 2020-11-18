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
                <h3 class="card-title">History Lokasi Kendaraan</h3>

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
                <div id="googleMap" style="width:100%;height:500px;"></div>

                <script src="<?php echo base_url();?>assets/landing/plugins/jquery/jquery.min.js"></script>
                <script src="<?php echo base_url();?>assets/landing/plugins/jquery-ui/jquery-ui.min.js"></script>
                <script>
                function myMap() {
                    
                const myLatLng = { lat: -8.203184, lng: 113.571038 };


                var mapProp= {
                  center:myLatLng,
                  zoom:13,
                };
                var id_riwayat = $("#id_riwayat").val();
                $.ajax({
                  url : "<?= site_url();?>dashboardtracking/ambilMarker/"+id_riwayat,
                  success : function(s)
                  {
                    var d = s.split("|");
                    for(var i =0; i< d.length-1 ; i++)
                    {
                      var a = d[i].split("~");
                      new google.maps.Marker({
                          position: {lat : parseFloat(a[1]) , lng : parseFloat(a[2])},
                          map,
                          title: a[0]
                        });
                      // alert(a[1]);
                    }

                  }

                });


                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);



                // Menampilkan informasi pada masing-masing marker yang diklik
                function bindInfoWindow(marker, map, infoWindow, html) {
                  google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                  });
                }
                }
                </script>

                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARdVcREeBK44lIWnv5-iPijKqvlSAVwbw&callback=myMap"></script>
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
              <h5 align="center"> Kendaraan yang dipakai </h5>  
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
                        
  
 
