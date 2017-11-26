<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- tab-icon of the website -->
  <link rel="icon" type="image/x-icon" href="../public/images/main_icon.png" >

  <title>Save city</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../public/css-2/css/bootstrap.min.css">

  <!-- custom CSS -->
  <link rel="stylesheet" href="../public/css-2/custom/footer.css">
  <link rel="stylesheet" href="../public/css-2/custom/modal.css">
  <link rel="stylesheet" href="../public/css-2/custom/user_header.css">
  <link rel="stylesheet" href="../public/css-2/custom/body.css">

  <!-- Map size -->
  <style>#map{height: 500px;width: 100%;}</style>

</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <h3 style="color: #ffffff;margin-bottom:0px">Username</h3>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="../public/index1.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="users_index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Alerts<span class="badge badge-pill badge-danger">1</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../public/index1.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- header starts -->
  <header class="py-4 bg-image-full" style="background-color:#67747e;">
    <div class="container">
      <h1>Daily Updates Insertion</h1>
    </div>
  </header>
  
  <!-- add news form -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-sm-8">
        <div class="card">
          <div class="card-header">
            <h4>Add News</h4>
          </div>
          <div class="card-block">
            <form action="" method="POST" class="form-group">
              <strong><label for="authorName">Author</label></strong>
              <input type="text" name="autho" class="form-control" id="authorName" required>
              <strong><label for="head">Headline</label></strong>
              <input type="text" name="headline" class="form-control" id="head" required>
              <strong><label for="desc">Description</label></strong>
              <textarea class="form-control" name="description" id="desc" required=""></textarea>
              <strong><label for="loc">Location</label></strong>
              <input type="text" name="location" class="form-control" id="loc" required>
              <small>Add Images(if any)</small>
              <input type="file" class="form-control-file" id="exampleInputFile">
              <br>
              <input type="submit" name="submitDetails" class="form-control btn btn-success" value="Add">
            </form>
          </div>
        </div>
      </div>
           <div class="col-lg-4 col-sm-4">
          <div class="card">
          <div class="card-header">
            <h4>Alerts <span class="badge badge-pill badge-danger">5</h4></span>
          </div>
          <div class="card-block">
            
          </div>
        </div>
        </div>
    </div>
  </div>

  <!-- show alerts -->
 

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
        © Copyright 2017 Disaster Managment Department - All Rights Reserved
      </p>
    </div>
  </footer>

  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="js-2/jQuery/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

  <!-- bootstrap core js -->
  <script src="js-2/js/bootstrap.min.js"></script>
  <script src="js-2/js/bootstrap.bundle.min.js"></script>

  <!-- custom javascripts -->
  <script src="js-2/custom/java.js"></script>
  <script src="js-2/custom/map.js"></script>

</body>
</html>