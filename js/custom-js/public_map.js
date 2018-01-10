var customLabel = {
	fire: {
		label: 'F'
	},
	flood: {
		label: 'FL'
	},
	earthquake:{
		label: 'E'
	},
	cyclone:{
		label: 'C'
	}
};

function initMap() {
  // declared options for map view initially
  var options = {
  	zoom: 11,
  	center: {lat:6.9216255,lng:79.85986971}
  }

    //instanstiate map
    var map = new google.maps.Map(document.getElementById('map'),options);
    var infoWindow = new google.maps.InfoWindow;

    // Change this depending on the name of your PHP or XML file
    downloadUrl('../includes/public_map.php', function(data) {
    	var xml = data.responseXML;
    	var markers = xml.documentElement.getElementsByTagName('marker');
    	Array.prototype.forEach.call(markers, function(markerElem) {
    		var id = markerElem.getAttribute('id');
    		var name = markerElem.getAttribute('name');
    		var address = markerElem.getAttribute('address');
    		var type = markerElem.getAttribute('type');
    		var point = new google.maps.LatLng(
    			parseFloat(markerElem.getAttribute('lat')),
    			parseFloat(markerElem.getAttribute('lng')));

    		var infowincontent = document.createElement('div');
    		var strong = document.createElement('strong');
    		strong.textContent = name
    		infowincontent.appendChild(strong);
    		infowincontent.appendChild(document.createElement('br'));

    		var text = document.createElement('text');
    		var text2 = document.createElement('text');
    		text.textContent = address
    		infowincontent.appendChild(text);
    		infowincontent.appendChild(text2);
    		var icon = customLabel[type] || {};
    		var marker = new google.maps.Marker({
    			map: map,
    			position: point,
    			label: icon.label
    		});
    		marker.addListener('click', function() {
    			infoWindow.setContent(infowincontent);
    			infoWindow.open(map, marker);
    		});
    	});
    });
}



function downloadUrl(url, callback) {
	var request = window.ActiveXObject ?
	new ActiveXObject('Microsoft.XMLHTTP') :
	new XMLHttpRequest;

	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			request.onreadystatechange = doNothing;
			callback(request, request.status);
		}
	};

	request.open('GET', url, true);
	request.send(null);
}

function doNothing() {}

