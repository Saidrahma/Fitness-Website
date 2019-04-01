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
								<li><a href="schedule.php">Schedule</a></li>
								<li><a href="about.php">Trainers</a></li>
								<li><a href="deals.php">Deals</a></li>
								<li><a href="account.php">Account</a></li>
								<li class="active"><a href="contact.php">Contact</a></li>
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
				   					<h1>Contact</h1>
				   					<h2><span><a href="index.php">Home</a> | Contact</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h2>Contact Information</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="contact-info-wrap-flex">
									<div class="con-info">
										<p><span><i class="icon-location-2"></i></span> 676 INSAT Urban Center North BP, Tunis Cedex 1080</p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+216 71 703 829</a></p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">info@FitnessClub.com</a></p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-globe"></i></span> <a href="#">FitnessClub.com</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h2>Get In Touch</h2>
						<form action="#">
							<div class="row form-group">
								<div class="col-md-6">
									<!-- <label for="fname">First Name</label> -->
									<input type="text" id="fname" class="form-control" placeholder="First Name">
								</div>
								<div class="col-md-6">
									<!-- <label for="lname">Last Name</label> -->
									<input type="text" id="lname" class="form-control" placeholder="Last Name">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="email">Email</label> -->
									<input type="email" id="email" class="form-control" placeholder="Email">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="subject">Subject</label> -->
									<input type="text" id="subject" class="form-control" placeholder="Subject of this message">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="message">Message</label> -->
									<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Send Message" class="btn btn-primary">
							</div>
						</form>		
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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

