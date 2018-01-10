<?php
require_once '../includes/db.php';
require_once '../includes/user.php';
require_once '../includes/news.php';
require_once '../includes/session.php';


// to check whether logged in or not and whether an admin or not

if (!$Session->is_logged_in()){
  header("Location: ../public/index1.php ");
}elseif ($_SESSION['token'] == 0) {
  $_SESSION['admin_error'] = "yes";
  header("Location:../users/users_index.php");
}
?>

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
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

  <!-- custom CSS -->
  <link rel="stylesheet" href="../css/custom-css/header.css">
  <link rel="stylesheet" href="../css/custom-css/button.css">
  <link rel="stylesheet" href="../css/custom-css/footer.css">
  <link rel="stylesheet" href="../css/custom-css/modal.css">
  <link rel="stylesheet" href="../css/custom-css/body.css">
  <link rel="stylesheet" href="../css/custom-css/alert.css">

  <!-- Map size -->
  <style>#map{height: 300px;width: 100%;}</style>

</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <h3 style="color: #ffffff;margin-bottom:0px">Admin panel</h3>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="../public/index1.php">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="profiles.php" >Profiles</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="admin_index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#alerts">Alerts<span class="badge badge-pill badge-danger">1</span></a>
          </li>
          <li class="nav-item ">
            <form action="../includes/logout.php" method="POST">
              <input type ="submit" name="Logout" class="nav-link btn btn-primary" value="Logout">
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- header starts -->
  <header class="py-4 bg-image-full" style="background-color:#67747e;">
    <div class="container">
      <h1>Data Manipulation Panel</h1>
    </div>
  </header>

  <?php
  if (isset($_SESSION['error'])) {
    ?>
    <script> alert("select an image"); </script>
    <?php
  }elseif (isset($_SESSION['added'])) {
    ?> <div class="row">
      <div class="col-lg-12">
        <div class=" alert alert-success">
          News Added Successfully!
        </div>
      </div>
    </div>
    <?php
  }elseif (isset($_SESSION['deleted'])) {
    ?> <div class="row">
      <div class="col-lg-12">
        <div class=" alert alert-success">
          Record Deleted!
        </div>
      </div>
    </div>
    <?php
  }elseif (isset($_SESSION['updated'])) {
    ?> <div class="row">
      <div class="col-lg-12">
        <div class=" alert alert-success">
          Record updated!
        </div>
      </div>
    </div>
    <?php
  }
  unset($_SESSION['error']); unset($_SESSION['added']);unset($_SESSION['deleted']);unset($_SESSION['updated']);
  ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="py-5" >
          Configure Map
        </h2>
      </div>
    </div>
    <div class=" py-4 embed-responsive">
      <div id="map" class="rounded" >
      </div>
    </div> 
  </div>


  <!-- data tables: User -->
  <?php 
  $news = new News();
  $result = $news->showNews("temp_disasters");
  ?>
  <!-- data tables -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-6">
        <table class="table table-bordered table-hover table-responsive">
          <tr>
            <th>Author</th>
            <th>Headline</th>
            <th>Description</th>
            <th>Location</th>
            <th>Images</th>
            <th colspan="2" style="text-align: center;">Options</th>
          </tr>
          <?php while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form action ="admin_news.php" method="POST" class="form-group">
              <tr>
                <td>
                  <input readonly class=" form-control"  type="text" name="author" value="<?php echo htmlentities($row['author_name']); ?>">
                </td>
                <td>
                  <input class=" form-control"  type="text" name="headline" value="<?php echo htmlentities($row['headline']); ?>">
                </td>
                <td width="350px">
                  <textarea class=" form-control"  name="description"><?php echo htmlentities($row['description']); ?></textarea>
                </td>
                <td>
                  <input class=" form-control"  type="text" name="location" value="<?php echo htmlentities($row['location']); ?>">
                </td>
                <td>
                  <?php echo '<img name=image width="100px" height="100px" src="data:image/jpeg;base64,'.base64_encode( $row['images'] ).'"/>';?></td>
                  <?php echo "<input type=hidden name=author_id value =" .htmlentities($row['author_id']). ">";?>
                  <?php echo "<input type=hidden name=news_id value =" .htmlentities($row['temp_disaster_id']). ">";?>
                  <?php echo "<input type=hidden name=images value =" .base64_encode($row['images']). ">";?>
                  <td>
                    <input type="submit" name="submitApprove" class="btn btn-md btn-success" value="Approve">
                  </td>
                  <td>
                    <input type="submit" name="submitDel" class="btn btn-md btn-danger" value="Delete">
                  </td>
                </tr>
              </form>
              <?php
            } 
            ?>
          </table>
        </div>
      </div>
    </div>

    <!-- add news form -->
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-sm-5">
          <div class="card">
            <div class="card-header">
              <h4>Send Message</h4>
            </div>
            <div class="card-block">
              <form action="message.php" method="POST" class="form-group">
                <strong><label for="Sender">Sender</label></strong>
                <input type="text" name="sender" class="form-control" id="Sender" required>
                <strong><label for="Receiver">Receiver</label></strong>
                <input type="text" name="receiver" class="form-control" id="Receiver" required>
                <strong><label for="Message">Message</label></strong>
                <textarea class="form-control" name="message" id="Message" required=""></textarea> 
                <small>Add Images(if any)</small>
                <input type="file" class="form-control-file" id="exampleInputFile">
                <br>
                <input type="submit" name="submitDetails" class="form-control btn btn-success" value="Send">
              </form>
            </div>
          </div>
        </div>
        <?php 
        $news = new News();
        $result = $news->showAllNews("disaster");
        ?>
        <div class="col-lg-4 col-sm-5">
          <div class="card">
            <div class="card-header">
              <h4>Old News</h4>
            </div>
            <div class="card-block">
              <table class="table table-bordered table-responsive table-hover">
                  <th width="100%">Headline</th>
                  <th>Option</th>
                  <?php while($rows = mysqli_fetch_assoc($result)) { ?>
                  <form action="admin_news.php" method="POST" class="form-group">
                  <tr>
                    <td><?php echo htmlentities($rows['headline']); ?></td>
                    <?php echo "<input type=hidden name=id value =" .htmlentities($rows['disaster_id']).">";?>
                    <td><input type="submit" name="submitDelete" class="btn btn-md btn-danger" value="Delete"></td>
                  </tr>
                </form>
                <?php }?>
              </table>
            </div>
          </div>
        </div>

        <!-- show alerts -->
        <div class="col-lg-3 col-sm-3">
          <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card" id="alerts">
              <div class="card-header">
                <h4>Alerts <span class="badge badge-pill badge-danger">1</h4></span>
              </div>
              <div class="card-block"> 
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><a data-toggle="collapse" data-parent="#accordion" href="#messages" aria-expanded="true" aria-controls="messages">
                    Messages
                  </a></li>
                  <div id="messages" class="collapse show" role="tabpanel">
                    <div class="card-block">
                    </div>
                  </div>
                  <li class="list-group-item"><a data-toggle="collapse" data-parent="#accordion" href="#notifications" aria-expanded="true" aria-controls="notifications">
                    Notification
                  </a></li>
                </ul>
              </div>
              <div id="notifications" class="collapse show" role="tabpanel">
                <div class="card-block">

                </div>
              </div>
            </div>
          </div>
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