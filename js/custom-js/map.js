
var map;
var marker;
var infowindow;
var messagewindow;

function initMap() {
  var colombo = {lat:6.9216255,lng:79.85986971};
  map = new google.maps.Map(document.getElementById('map'), {
    center:colombo,
    zoom: 11
  });

  var html = "<table>" +
  "<tr><td>Name:</td> <td><input type='text' id='name'/> </td> </tr>" +
  "<tr><td>Address:</td> <td><input type='text' id='address'/></td> </tr>" +
  "<tr><td>Type:</td> <td><select id='type'>" +
  "<option value='fire' SELECTED>fire</option>" +
  "<option value='flood'>flood</option>" +
  "<option value='earthquake'>earthquake</option>" +
  "<option value='cyclone'>cyclone</option>" +
  "</select> </td></tr>" +
  "<tr><td></td><td><input type='button' value='Save & Close'     onclick='saveData()'/></td></tr>";
  infowindow = new google.maps.InfoWindow({
   content: html
 });

  var response = "<div>Added</div>"

  messagewindow = new google.maps.InfoWindow({
    content:response
  });

  google.maps.event.addListener(map, 'click', function(event) {
    marker = new google.maps.Marker({
      position: event.latLng,
      map: map,
      draggable:true
    });


    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
    });
  });
}

function saveData() {
  var name = escape(document.getElementById('name').value);
  var address = escape(document.getElementById('address').value);
  var type = document.getElementById('type').value;
  var latlng = marker.getPosition();
  var url = '../includes/mapphp.php?name=' + name + '&address=' + address +
  '&type=' + type + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

  downloadUrl(url, function(data, responseCode) {

    if (responseCode == 200 && data.length <= 1) {
      infowindow.close();
      messagewindow.open(map, marker);
    }
  });
}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
  new ActiveXObject('Microsoft.XMLHTTP') :
  new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request.responseText, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

function doNothing () {
}

