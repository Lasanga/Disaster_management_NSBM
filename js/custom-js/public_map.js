
function initMap() {
  // declared options for map view initially
  var options = {
     zoom: 12,
     center: {lat:6.9216255,lng:79.85986971}
 }
    //instanstiate map
    var map = new google.maps.Map(document.getElementById('map'),options);
}