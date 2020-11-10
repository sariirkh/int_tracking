<!DOCTYPE html>
<html>
<body>

<h1>Detail history </h1>

<div id="googleMap" style="width:100%;height:500px;"></div>
<input type="hidden" id="id_riwayat" value="<?= $id_riwayat;?>">
<script src="<?php echo base_url();?>assets/landing/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/landing/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
function myMap() {
    
const myLatLng = { lat: -8.203184, lng: 113.571038 };


var mapProp= {
  center:myLatLng,
  zoom:17,
};

var id_riwayat = $("#id_riwayat").val();
$.ajax({
  url : "<?= site_url();?>detailhistory/ambilMarker/" + id_riwayat,
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

</body>
</html>