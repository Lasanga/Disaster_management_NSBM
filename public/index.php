<?php //require "includes/db.php";?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="description=" content="oop concept project">
		<meta name="keywords" content="html,css,javascript,php">

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- tab-icon of the website -->
		<link rel="icon" type="image/x-icon" href="images/main_icon.png" >

		<title>Save city</title>

		<!-- Bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap-css/bootstrap.min.css">

		<!-- custom css -->
		<link rel="stylesheet" type="text/css" href="css/custom/header.css">
		<link rel="stylesheet" type="text/css" href="css/custom/footer.css">

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
	              <a class="nav-link" href="login.php">Login</a>
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

	    <div class="container">
	    	<br />
	    	<br />
	    	<br />
	    	<br />
	    	<br /><br />
	    	<h1>adadada</h1>
	    </div>

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

	    <!-- js and jQuery files -->
    	<script src="javascript/bootstrap-js/bootstrap.min.js"></script>
    	<script src="jQuery/jquery-3.2.1.min.js"></script>

    	<!-- custom js file -->
    	<script type="text/javascript" src="javascript/java.js"></script>	
	</body>
</html>