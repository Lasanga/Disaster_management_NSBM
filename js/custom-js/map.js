
          function initMap() {

            // declared options for map view initially
            var options = {
                zoom: 12,
                center: {lat:6.9216255,lng:79.85986971}
            }
            //instanstiate map
            var map = new google.maps.Map(document.getElementById('map'),options);

            //function : add location pointers on map
            function addPoints(props){
              var marker = new google.maps.Marker({
                position:props.coords,
                map:map
            });
            }

            //add locaton points to the map
            google.maps.event.addListener(map, 'click', function(event){
              var points =addPoints({coords:event.latLng}); 
            });
          }