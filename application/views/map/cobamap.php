<html>
<head>
<!-- leaflet map -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/leaflet/leaflet.css" />
<script src="<?= base_url(); ?>/assets/leaflet/leaflet.js"></script>
 
<style>
#map { height: 500px;
    width: 1275px; 
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
    var marker = L.marker([-8.203184,113.571038]).addTo(map);
    marker.bindPopup('<b>PT. Mangli Djaya Raya</b><br>JL Mayjend DI Panjaitan No.99, Krajan, Petung, Kec. Bangsalsari, Kabupaten Jember, Jawa Timur 68154');

    // Create an Empty Popup
    var popup = L.popup()
    .setLatLng([-8.203184,113.571038])
    .setContent("I am a standalone popup.")
    .openOn(mymap);

    // Write function to set Properties of the Popup
    // function onMapClick(e) {
    //     popup
    //     .setLatLng(e.latlng)
    //     .setContent("You clicked the map at " + e.latlng.toString())
    //     .openOn(map);
    // }

    // // Listen for a click event on the Map element
    // map.on('click', onMapClick);
    //buat ambil lat, long
    // map.on('click', function (e) {
    //     alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng);
    // });

    function putDraggable() {
        draggableMarker = L.marker([ map.getCenter().lat, map.getCenter().lng], {draggable:true, zIndexOffset:900}).addTo(map);
        draggableMarker.on('dragend', function(e) {
            $("#lat").val(this.getLatLng().lat);
            $("#lng").val(this.getLatLng().lng);

        });

    }

    // $( document ).ready(function() {
    //     putDraggable();

    // });
    
    // function onLocationFound(e) {
    //      var radius = e.accuracy / 2;
    //      var location = e.latlng
    //      L.marker(location).addTo(map)
    //      L.circle(location, radius).addTo(map);
    //   }

    //   function onLocationError(e) {
    //      alert(e.message);
    //   }

    //   function getLocationLeaflet() {
    //      map.on('locationfound', onLocationFound);
    //      map.on('locationerror', onLocationError);

    //      map.locate({setView: true, maxZoom: 16});
    //   }

//       var startlat = 40.75637123;
// var startlon = -73.98545321;

// var options = {
//  center: [startlat, startlon],
//  zoom: 9
// }

//       document.getElementById('lat').value = startlat;
// document.getElementById('lon').value = startlon;

// var map = L.map('map', options);
// var nzoom = 12;

// L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'}).addTo(map);

// var myMarker = L.marker([startlat, startlon], {title: "Coordinates", alt: "Coordinates", draggable: true}).addTo(map).on('dragend', function() {
//  var lat = myMarker.getLatLng().lat.toFixed(8);
//  var lon = myMarker.getLatLng().lng.toFixed(8);
//  var czoom = map.getZoom();
//  if(czoom < 18) { nzoom = czoom + 2; }
//  if(nzoom > 18) { nzoom = 18; }
//  if(czoom != 18) { map.setView([lat,lon], nzoom); } else { map.setView([lat,lon]); }
//  document.getElementById('lat').value = lat;
//  document.getElementById('lon').value = lon;
//  myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
// });

//       function chooseAddr(lat1, lng1)
// {
//  myMarker.closePopup();
//  map.setView([lat1, lng1],18);
//  myMarker.setLatLng([lat1, lng1]);
//  lat = lat1.toFixed(8);
//  lon = lng1.toFixed(8);
//  document.getElementById('lat').value = lat;
//  document.getElementById('lon').value = lon;
//  myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
// }

// function myFunction(arr)
// {
//  var out = "<br />";
//  var i;

//  if(arr.length > 0)
//  {
//   for(i = 0; i < arr.length; i++)
//   {
//    out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
//   }
//   document.getElementById('results').innerHTML = out;
//  }
//  else
//  {
//   document.getElementById('results').innerHTML = "Sorry, no results...";
//  }

// }

// function addr_search()
// {
//  var inp = document.getElementById("addr");
//  var xmlhttp = new XMLHttpRequest();
//  var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
//  xmlhttp.onreadystatechange = function()
//  {
//    if (this.readyState == 4 && this.status == 200)
//    {
//     var myArr = JSON.parse(this.responseText);
//     myFunction(myArr);
//    }
//  };
//  xmlhttp.open("GET", url, true);
//  xmlhttp.send();
// }
</script>
</head>
<body onLoad="javascript:init();">
<!-- <div class="container">

<b>Coordinates</b>
<form>
<input type="text" name="lat" id="lat" size=12 value="">
<input type="text" name="lon" id="lon" size=12 value="">
</form>

<b>Address Lookup</b>
<div id="search">
<input type="text" name="addr" value="" id="addr" size="58" />
<button type="button" onclick="addr_search();">Search</button>
<div id="results"></div>
</div> -->
   <!-- <input type="button" value="Locate me!" onClick="javascript:getLocationLeaflet();"> -->
   
</body>
</html>
    