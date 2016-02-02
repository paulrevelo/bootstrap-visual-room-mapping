
$(document).ready(function(){/* google maps -----------------------------------------------------*/

var map;
var infoWindow;

google.maps.event.addDomListener(window, 'load', initialize);

function initialize() {

  map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 18,
    center: {lat: 8.23997567, lng: 124.24481962},
    scrollWheel: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  });
  
  var coopCoords = [
    {lat: 8.239951774877131, lng: 124.24466907978058},
    {lat: 8.23982502155891, lng: 124.24481458961964},
    {lat: 8.239952438506952, lng: 124.2449440062046},
    {lat: 8.240079191784359, lng: 124.24479514360428}
  ];

  var adminCoords = [
    {lat: 8.24001216518724, lng: 124.24445115029812},
    {lat: 8.239664423055505, lng: 124.24412190914154},
    {lat: 8.23975467676792, lng: 124.2440166324377},
    {lat: 8.240100427931582, lng: 124.24434788525105}
  ];

  var coopBuild = new google.maps.Polygon({
    path:coopCoords,
    strokeColor:'#0000FF',
    strokeOpacity:0.8,
    strokeWeight:2,
    fillColor:'#0000FF',
    fillOpacity:0.8
  });
  coopBuild.setMap(map);

  var adminBuild = new google.maps.Polygon({
    path:adminCoords,
    strokeColor:'#0000FF',
    strokeOpacity:0.8,
    strokeWeight:2,
    fillColor:'#0000FF',
    fillOpacity:0.8
  });
  adminBuild.setMap(map);


  coopBuild.addListener('click', showArrays);
  adminBuild.addListener('click', showArrays);

  infoWindow = new google.maps.InfoWindow;};


/** @this {google.maps.Polygon} */
function showArrays(event) {
  // Since this polygon has only one path, we can call getPath() to return the
  // MVCArray of LatLngs.
  var vertices = this.getPath();

  var contentString = '<b>COOP Building</b><br>' +
      'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
      '<br>';

  // Iterate over the vertices.
  for (var i =0; i < vertices.getLength(); i++) {
    var xy = vertices.getAt(i);
    contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
        xy.lng();
  }

  // Replace the info window's content and position.
  infoWindow.setContent(contentString);
  infoWindow.setPosition(event.latLng);

  infoWindow.open(map);
}
});