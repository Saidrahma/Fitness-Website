<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fitness Club</title>
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
			$get_data = callAPI('GET', 'http://localhost:8080/Fitness-Website/Back-end/api/controllers/activity_type/read.php', false);
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
							<div id="colorlib-logo"><a href="index.php">Fitness Club</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li class="has-dropdown">
									<a href="classes.php">Classes</a>
									<ul class="dropdown">
											<?php
														for($i = 0; $i<count($data); $i++) {
															$var =($data[$i]['nameType']);
															$lien=$var.".php";
		
																												?>
												
												<li>	<a href=" <?php echo($lien)?>">
												
												
													<?php
															print_r($data[$i]['nameType']);
														}
													?>
												</a></li>
												
											</ul>
								</li>
								<li class="active"><a href="schedule.php">Schedule</a></li>
								<li><a href="about.php">Trainers</a></li>
								<li><a href="deals.php">Deals</a></li>
								<li><a href="account.php">Account</a></li>
								<li><a href="contact.php">Contact</a></li>
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
				   					<h1>Schedule</h1>
				   					<h2><span><a href="index.php">Home</a> | Schedule</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		
		<div id="colorlib-schedule" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Our Class Schedule</h2>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
					</div>
				</div>
				<div class="row" id="ancre">
					<div class="schedule text-center animate-box">
						<div class="col-md-12">
							<ul class="week">
								<li><a href="schedule.html#ancre">Sunday</a></li>
								<li><a href="monday.html#ancre">Monday</a></li>
								<li><a href="tuesday.html#ancre">Tuesday</a></li>
								<li><a href="wednesday.html#ancre">Wednesday</a></li>
								<li><a href="thursday.html#ancre">Thursday</a></li>
								<li><a href="friday.html#ancre">Friday</a></li>
								<li class="active"><a href="#ancre">Saturday</a></li>
							</ul>
						</div>
						<div class="schedule-flex">
							<div class="entry-forth">
                                <p class="icon"><span><i class="flaticon-meditation"></i></span></p>
								<p class="time"><span>6 am - 8 am</span></p>
								<h3>Yoga Classes</h3>
								<p class="trainer"><span>Sarah Henderson</span></p>
							</div>
							<div class="entry-forth">
                                <p class="icon"><span><i class="flaticon-swimmer"></i></span></p>
                                <p class="time"><span>8 am - 10 am</span></p>
								<h3>Swimming Program</h3>
								<p class="trainer"><span>Diego Carter</span></p>
							</div>
							<div class="entry-forth">
                                <p class="icon"><span><i class="flaticon-gym"></i></span></p>
								<p class="time"><span>10 am - 12 pm</span></p>
								<h3>Cardio Program</h3>
								<p class="trainer"><span>Danielle Peter</span></p>
							</div>
							<div class="entry-forth">
                                <p class="icon"><span><i class="flaticon-weightlifting"></i></span></p>
								<p class="time"><span>12 pm - 2 pm</span></p>
								<h3>Body Building</h3>
								<p class="trainer"><span>George Cooper</span></p>
							</div>
						</div>
						<div class="schedule-flex">
							<div class="entry-forth">
								<p class="icon"><span><i class="flaticon-martial-arts"></i></span></p>
								<p class="time"><span>2 pm - 4 pm</span></p>
								<h3>Karate Classes</h3>
								<p class="trainer"><span>Diego Carter</span></p>
							</div>
							<div class="entry-forth">
								<p class="icon"><span><i class="flaticon-gloves"></i></span></p>
								<p class="time"><span>4 pm - 6 pm</span></p>
								<h3>Boxing Program</h3>
								<p class="trainer"><span>Mark Brook</span></p>
							</div>
							<div class="entry-forth">
								<p class="icon"><span><i class="flaticon-exercise-2"></i></span></p>
								<p class="time"><span>6 pm - 8 pm</span></p>
								<h3>Loose Weight Program</h3>
								<p class="trainer"><span>Tom Scott</span></p>
							</div>
							<div class="entry-forth">
								<p class="icon"><span><i class="flaticon-man"></i></span></p>
								<p class="time"><span>8 pm - 10 pm</span></p>
								<h3>Basic Exercise</h3>
								<p class="trainer"><span>Alysha Reed</span></p>
							</div>
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

