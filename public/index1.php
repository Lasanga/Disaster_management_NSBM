<?php 
session_start();
require_once '../includes/news.php';
require_once '../includes/comman.php';
?>
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
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

  <!-- custom CSS -->
  <link rel="stylesheet" href="../css/custom-css/header.css">
  <link rel="stylesheet" href="../css/custom-css/button.css">
  <link rel="stylesheet" href="../css/custom-css/footer.css">
  <link rel="stylesheet" href="../css/custom-css/modal.css">
  <link rel="stylesheet" href="../css/custom-css/body.css">

  <!-- Map size -->
  <style>#map{height: 350px;width: 100%;}</style>
</head>
<body>
  <!-- to check whether user exists or not -->
  <?php
  if (isset($_SESSION['not_found'])) {
    ?>
    <script>alert("No such user!")</script>
    <?php
  }unset($_SESSION['not_found']);
  ?>

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
            <a class="nav-link" href="index1.php">Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#map">Map</a>
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
        <button class="btn btn-danger" id="subscribe">Subscribe</button>
      </div>  
    </div>
  </header>

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
            <form action="../includes/login.php" method="POST">
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

  <!-- map -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="py-5" >
          Map 
        </h2>
      </div>
    </div>
    <div class=" py-4 embed-responsive">
      <div id="map" class="rounded" >
      </div>
    </div> 
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="py-5 " >
          Latest news
        </h2>
      </div>
    </div>

    <!-- Pagination  -->
    <?php
    
    $page     = isset($_GET['page']) ?(int)$_GET['page']:0; 
    $per_page = isset($_GET['per_page']) && $_GET['per_page'] <=4 ? (int)$_GET['per_page']:4;
    $start    = ($page > 1) ? ($page * $per_page)- $per_page:0;
    $news = new News();
    $result = $news->showPublicNews("disaster",$page,$per_page); 
    $sql = new Comman();
    $total = $sql->selectBySql("SELECT FOUND_ROWS() as total ");

    while ($rows = mysqli_fetch_assoc($total)){
     $pages = $rows['total'];
   }
   $page_nos = ceil($pages/$per_page);

   ?>
   
   <!-- latest story cards -->
   <div class="row">
    <?php 
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-md-3 col-sm-3">
        <div class="card">
          <div class="card-header">
            News Block 
          </div>
          <div class="card-block">
            <?php echo '<img height=150px class="rounded card-img" src="data:image/jpeg;base64,'.base64_encode( $row['images'] ).'"/>';?>  
            <br>
            <p><strong><?php echo htmlentities($row['headline']);?></strong></p>
          </div>
          <div class="card-footer">
            <center>
              <button  class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $row['disaster_id']; ?>" >
                Read more
              </button>
            </center>
          </div>
        </div>
      </div>
      <div class="modal fade" id="<?php echo $row['disaster_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newsTitle" aria-hidden=" true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newsTitle"><?php echo htmlentities($row['headline']); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" data-target="#ne">
              <p>
                <?php echo htmlentities($row['description']); ?>
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
    <!--  Pagination  -->
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center">
            <?php for ($i=0; $i <= $page_nos ; $i++) {?> 
            <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>&$per_page=<?php echo $per_page;?>"><?php echo $i; ?></a></li>
            <?php
          } ?>
        </ul>
      </nav>
    </div>
  </div>

</div>

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
          <td>
            <ul>
              <li><form action="" method="POST" class="form-group">
                <textarea class="form-control" placeholder="feedback"></textarea>
                <br>
                <input type="submit" name="feedbackSubmit" value="submit" class="btn btn-default">
              </form>
            </li>
          </ul>
        </td>
      </table>
    </div>
  </div>
  <p class="mbr-text mb-0 mbr-fonts-style mbr-white display-7">
    © Copyright 2017 Disaster Managment Department - All Rights Reserved
  </p>
</div>
</footer>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="../js/jQuery/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<!-- bootstrap core js -->
<script src="../js/js/bootstrap.min.js"></script>
<script src="../js/js/bootstrap.bundle.min.js"></script>

<!-- custom javascripts -->
<script src="../js/custom-js/java.js"></script>
<script src="../js/custom-js/public_map.js"></script>

<!-- Google map javascript api -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN7im7x2eGnb3NXg6aG8eQUvpP7OKgBxA&callback=initMap"> 
</script>

</body>
</html>