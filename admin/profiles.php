<?php
require_once '../includes/user.php';
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
  <style>#map{height: 500px;width: 100%;}</style>

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
          <li class="nav-item active">
            <a class="nav-link" href="profiles.php" >Profiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_index.php">Dashboard</a>
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
      <h1>Profile Control Panel</h1>
    </div>
  </header>

  <?php if (isset($_SESSION['errorValidations'])) {

  } ?>
  <!-- notifications -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php if (isset($_SESSION['register'])) {?>
        <div class="alert alert-success"><?php echo htmlentities($_SESSION['register']); ?></div>
        <?php }elseif (isset($_SESSION['errorValidations'])) {?>
        <div class="alert alert-warning"><?php echo htmlentities($_SESSION['errorValidations']); ?></div>
        <?php }elseif (isset($_SESSION['deleted'])) {?> 
        <div class="alert alert-success"><?php echo htmlentities($_SESSION['deleted']); ?></div>
        <?php }elseif(isset($_SESSION['updated'])) {?>  
        <div class="alert alert-success"><?php echo htmlentities($_SESSION['updated']); ?></div>
        <?php }unset($_SESSION['register']);unset($_SESSION['errorValidations']);unset($_SESSION['updated']);unset($_SESSION['deleted']); ?></div>

      </div>
    </div>

    <!-- add news form -->
    <div class="container">
      <div class="row">
        <!-- show alerts -->
        <div class="col-lg-5 col-sm-5">
          <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
              <div class="card-header">
                <h4>Profiles - <?php echo htmlentities(User::numOfRows()); ?> </h4></span>
              </div>
              <div class="card-block"> 
                <?php
                $result = User::selectBySql("SELECT * FROM users");
                while ($row = mysqli_fetch_assoc($result)){
                  ?>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <form action="../includes/edit.php" method="GET">
                        <?php 
                        echo htmlentities($row['username']);
                        echo " - "; 
                        echo htmlentities($row['type']);
                        echo "<input type=hidden name=id value =" .htmlentities($row['user_id']). ">";
                        ?> 
                        <br/>
                        <span><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $row['user_id']; ?>" id="edit1">
                          Edit 
                        </button>
                        <span><input type="submit" class="btn btn-danger" name="delete" value="delete" id="delete1"></span>
                      </form>
                    </li>
                  </ul>
                  <!-- edit modal -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="modal fade" id="<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden=" true" >
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" id="editTitle">Edit profiles</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="../includes/edit.php" method="POST">
                                <div class="form-group">
                                  <label>Enter username:</label>
                                  <input type="text" name="username" required class="form-control" value="<?php echo $row['username']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>Enter new-password: </label>
                                  <input type="password" name="newPass" required class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Enter token: </label>
                                  <input type="text" name="token" required class="form-control" value="<?php echo $row['token']; ?>">
                                </div>
                                <div class="form-group">
                                  <?php echo  
                                  "<input type=hidden name=id value =" .htmlentities($row['user_id']). ">";?>  
                                  <input type="submit" class="btn btn-success btn-block" name="submitEdit" required class="form-control">
                                </div>
                              </form>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-sm-7">
            <div class="card">
              <div class="card-header">
                <h4>Add profile</h4>
              </div>
              <div class="card-block">
                <form action="registration.php" method="POST" class="form-group">

                  <strong><label for="First_name">First name</label></strong>
                  <input type="text" name="firstname" class="form-control" id="First_Name" required>

                  <strong><label for="Last_name">Last name</label></strong>
                  <input type="text" name="lastname" class="form-control" id="Last_name" required>

                  <strong><label for="Username">Username</label></strong>
                  <div id="user"></div>
                  <input type="text" class="form-control" name="username" id="Username" required> 

                  <strong><label for="type">Type</label></strong>
                  <select name="type" class="form-control" required>
                    <option>Admin</option>
                    <option>Police Station</option>
                    <option>Grama Niladari</option>
                    <option>Post Office</option>
                    <option>Member</option>
                  </select>

                  <strong><label for="Email">Email</label></strong>
                  <input type="email" class="form-control" name="email" id="Email" required placeholder="valid email address">

                  <strong><label for="tokenNumber">Token</label></strong>
                  <select name="token" class="form-control" id="tokenNumber" required>
                    <option>0</option>
                    <option>1</option>

                  </select>

                  <strong><label for="password1">Password</label></strong>
                  <div id="pass"></div>
                  <input type="password" class="form-control" name="password" id="password1" required placeholder="must include 6-8 characters"> 

                  <strong><label for="password2">Re-enter password</label></strong>
                  <input type="password" class="form-control" name="re_password" id="password2" required placeholder="both passwords should be same">  
                  <br>
                  <input type="submit" name="submitDetails" class="form-control btn btn-success" value="Add Profile" id="submitProfile">
                </form>
              </div>
              <div class="card-footer">
                <p style="text-align: center;">Copyrights@AdminPanel</p>
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
    <script src="../js/custom-js/map.js"></script>

    <!-- Google map javascript api -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN7im7x2eGnb3NXg6aG8eQUvpP7OKgBxA&callback=initMap"> 
  </script>

</body>
</html>