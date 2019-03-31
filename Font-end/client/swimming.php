<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Robust Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
			<?php
			include_once "./scripts/callApi.php";
			$get_data1 = callAPI('GET', 'http://localhost/Fitness-Website/Back-end/api/controllers/activity_type/read.php', false);
			$response = json_decode($get_data1, true);
			$data1 = $response['records'];
			
            ?>
            <?php
			include_once "./scripts/callApi.php";
			$get_data = callAPI('GET', 'http://localhost/Fitness-Website/Back-end/api/controllers/activity/read.php', false);
			$response = json_decode($get_data, true);
			$data = $response['records'];
			
            ?>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div id="colorlib-logo"><a href="index.php">Robust</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li class="has-dropdown active">
									<a href="classes.php">Classes</a>
									<ul class="dropdown">
											<?php
											for($i = 0; $i<count($data1); $i++) {
												$var =($data1[$i]['nameType']);
												$lien=$var.".php";
												?>
									  <li><a href=" <?php echo($lien)?>">
										 <?php
												print_r($data1[$i]['nameType']);}	
										 ?>
									  </a></li>
                                           
                                     </ul>
								</li>
									<li><a href="schedule.html">Schedule</a></li>
									<li><a href="about.html">Trainers</a></li>
									<li><a href="deals.html">Deals</a></li>
									<li><a href="account.php">Account</a></li>
									<li><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Classes</h1>
				   					<h2><span><a href="index.html">Home</a> | <a href="classes.html">Classes</a> | Swimming </span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		
		<div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 animate-box">
						<div class="classes">
                                <div class="desc">
                                <h1><a href="#"><strong> Swimming  </strong></a></h1>
								<!-- 
                                <?php 
					            // for($i = 0; $i<count($data); $i++) {
							    // if ($data[$i]['nameActivity']=='Swimming'){
							    // $ind = $i ; 
								?>
								<br> 
                                <p>
                                    <?php //echo($data[$ind]['description']) ;}}?>
                                </p> -->
                                <p>Aimed at the children between the age of 6 and 12 years old.Our lessons provide an introduction to professionnal swimming Practiced under the supervision of our coach </p>
                                <h3> The general benefits of Swimming  </h3>
                                <p><br>Contributes to the development of all muscles.</br>
                                <br>Harmoniously solicits the respiratory system and develops lung capacity.</br>
                                <br>Activity that soothes and relaxes.</br></p>
                                </div>
                                   
                                    
							<div class="classes-img classes-img-single"  style="background-image: url(images/k2.jpg );width:100%; float: left; margin-right: -100%; position: relative"></div>
							
						</div>
						
					</div>
				</div>
			</div>	
		</div>
	
		
		<footer id="colorlib-footer">
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								<small class="block">&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </small><br> 
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

