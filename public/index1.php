<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- tab-icon of the website -->
    <link rel="icon" type="image/x-icon" href="images/main_icon.png" >

    <title>Save city</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css-2/css/bootstrap.min.css">

    <!-- custom CSS -->
    <link rel="stylesheet" href="css-2/custom/header.css">
    <link rel="stylesheet" href="css-2/custom/button.css">
    <link rel="stylesheet" href="css-2/custom/footer.css">
    <link rel="stylesheet" href="css-2/custom/modal.css">
    <link rel="stylesheet" href="css-2/custom/py.css">

    <style>#map{height: 500px;width: 100%;}</style>

  </head>
  <body>
   
    <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <h3 style="color: #ffffff;margin-bottom:0px">Public</h3>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.php">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="map.php">Map</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#footer">Contact</a>
              </li>
              <li class="nav-item">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login_form">
                  <div class="nav-link"> Login</div>
                </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
    <!-- header image -->
    <header class="py-4 bg-image-full" style="background-image: url('images/fire.jpeg');">
      <div class="container">
        <br />
        <h1>Disasters on time</h1>
        <br>
        <div class="description">
          <p>Community participation in rescue and relief operations and reconstruction after a disaster is always essential.</p>
          <p>It is a good sign that everyone starts feeling the gravity of the situation and
          </p>
          <p> comes forward with a helping hand.</p>
        </div>
        <div style="margin-top: 20px;">
          <button class="btn btn-danger" id="subscribe" onclick="subscribe(this) ">Subscribe</button>
        </div>  
      </div>
    </header>

    
       <div class="container-fluid" style="background-color: "> 
            <div class="container">
              <!-- Modal -->
                <div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-labelledby="LoginFormTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="LoginFormTitle">Login</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Login form for users and admin -->
                        <form action="" method="POST">
                          <div class="form-group">
                            <label for="username">Username </label>
                            <input type="text" name="username" required class="form-control" id="username"/>
                          </div>
                          <div class="form-group">
                            <label for="password">Password </label>
                            <input type="password" name="password" required class="form-control" id="password"/>
                          </div>
                          <div class="form-group">
                            <label for="remember">Remember me</label>
                            <input type="checkbox" name="check" id="remember">
                          </div>
                          <div class="form-group">
                            <input type="submit" name="submit" value="Login" class="btn btn-primary form-control">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="container">
              <div class="row">
                <div class=" py-1 col-sm-1" style="background-color: grey;margin-top: 10px;"></div>
              </div>
              <h4 class="py-5 " >
                Locations where incidents took place
              </h4>
              <div class=" py-4 embed-responsive">
              <div id="map" ></div>
            </div> 
          </div>
      </div>


        <script>
          function initMap() {

            // declared options for map view initially
            var options = {
                zoom: 13,
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
        </script>
          <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN7im7x2eGnb3NXg6aG8eQUvpP7OKgBxA&callback=initMap">
          </script>



      <!-- footer -->
      <footer class ="py-4 bg-dark" id="footer">
        <div class="container">
          <div class="menu-items">
            <div class="table-responsive">
              <table class="table">
                <td>
                <ul>
                  <li>contact us:<dl><dt>011-2-566444</dt><dt>011-5-887-997</dt> <dt>0778-98-45-666</dt></dl></li>
                </ul>
                </td>
                <td>
                <ul>
                  <li>email:<dl><dt>SampleDisasterManagment@gmail.com</dt></dl>
                  </li>
                </ul>
                </td>
                <td>
                <ul>
                  <li>Fax:<dl><dt>+00976654321</dt></dl>
                  </li>
                </ul>
                </td>
              </table>
            </div>
          </div>
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white display-7">
                    © Copyright 2017 Disaster Managment Centre - All Rights Reserved
                </p>
            </div>
      </footer>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="js-2/jQuery/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <!-- bootstrap core js -->
    <script src="js-2/js/bootstrap.min.js"></script>
    <script src="js-2/js/bootstrap.bundle.min.js"></script>
    <script src="js-2/custom/java.js"></script>

  </body>
</html>