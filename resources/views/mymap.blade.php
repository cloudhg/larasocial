@extends('layouts.master')

@section('title', 'My Google Map')

@section('content')
</br></br>
<h3>My Google Map</h3>
</br>
<div class="col-sm-12">
  <div id="googleMap" style="width:100%;height:500px;"></div>
  <script>
 
  var a = 1;
  var contentStrings = [];
      contentStrings[0] = '<h5>新宿御苑</h5>';
	  contentStrings[1] = '<h5>新宿三丁目駅</h5>';  
  var positions = [];
      positions[0] = {lat: 35.6865918, lng: 139.7093363};
	  positions[1] = {lat: 35.6907982, lng: 139.7063538};

  function myMap() { 
    var mapProp = { //map property to mymap()
        center:new google.maps.LatLng(35.6897376,139.7003912),
        zoom:15};
		//--------------  Create map  -----------------//
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        //Create markers on map
    var markers = [];
        markers[0] = new google.maps.Marker({position: positions[0], map: map, label:'A'});
        markers[1] = new google.maps.Marker({position: positions[1], map: map, label:'B'});	
        //click info
    var infowindows = [];
        infowindows[0] = new google.maps.InfoWindow({
          content: contentStrings[0],
          position: positions[0],
          maxWidth:200, pixelOffset: new google.maps.Size(20, -20) 
          });
        infowindows[1] = new google.maps.InfoWindow({
          content: contentStrings[1],
          position:positions[1],
          maxWidth:200, pixelOffset: new google.maps.Size(20, -20) 
          });
	    //try open marker
        infowindows[0].open(map,markers[0]);
	    //click event listener
        markers[0].addListener('click',function(){ infowindows[0].open(map, markers[0]); });
        markers[1].addListener('click',function(){ infowindows[1].open(map, markers[1]); });
    }//myMap end
  </script>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBriDEY_hXCMxXRZHuxGbkzTt6BV3alPKM&language=ja&callback=myMap"> </script>
</div> 
@stop