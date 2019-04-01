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
		$get_data = callAPI('GET', 'http://localhost/Fitness-Website/Back-end/api/controllers/trainer/read.php', false);
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
									<a href="classes.html">Classes</a>
									<ul class="dropdown">
										<li><a href="classes-single.html">Classes Single</a></li>
										<li><a href="#">Cardio Classes</a></li>
										<li><a href="#">Muscle Classes</a></li>
										<li><a href="#">Fitness Classes</a></li>
										<li><a href="#">Body Building</a></li>
										<li><a href="#">Kids Classes</a></li>
									</ul>
								</li>
								<li><a href="schedule.html">Schedule</a></li>
								<li class="active"><a href="about.html">Trainers</a></li>
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
				   					<h1>Trainers</h1>
				   					<h2><span><a href="index.php">Home</a> | Trainers</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div class="colorlib-trainers">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Our Experienced Trainers</h2>
						<p>Meet the people who will help you become the best version of yourself! </p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="trainer-img" style="background-image: url(images/trainer-1.jpg)"></div>
							<div class="desc">
                            <?php
							for($i = 0; $i<count($data); $i++) {
							if ($data[$i]['nameTrainer']=='Diego Carter'){
							$ind = $i ; 
						    ?><h3>
							<?php	
							echo($data[$ind]['nameTrainer']) ;
                            ?> </h3>
                            <span>
							<?php	
							echo($data[$ind]['addressTrainer']) ;}}
                            ?> </span>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="trainer-img" style="background-image: url(images/trainer-2.jpg)"></div>
							<div class="desc">
                            <?php
							for($i = 0; $i<count($data); $i++) {
							if ($data[$i]['nameTrainer']=='Lea Young'){
							$ind = $i ; 
						    ?><h3>
							<?php	
							echo($data[$ind]['nameTrainer']) ;
                            ?> </h3>
                            <span>
							<?php	
							echo($data[$ind]['addressTrainer']) ;}}
                            ?> </span>
							
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="trainer-img" style="background-image: url(images/trainer-8.jpg)"></div>
							<div class="desc">
                            <?php
							for($i = 0; $i<count($data); $i++) {
							if ($data[$i]['nameTrainer']=='Tom Scott'){
							$ind = $i ; 
						    ?><h3>
							<?php	
							echo($data[$ind]['nameTrainer']) ;
                            ?> </h3>
                            <span>
							<?php	
							echo($data[$ind]['addressTrainer']) ;}}
                            ?> </span>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="trainer-img" style="background-image: url(images/trainer-6.jpg)"></div>
							<div class="desc">
                            <?php
							for($i = 0; $i<count($data); $i++) {
							if ($data[$i]['nameTrainer']=='Sarah Henderson'){
							$ind = $i ; 
						    ?><h3>
							<?php	
							echo($data[$ind]['nameTrainer']) ;
                            ?> </h3>
                            <span>
							<?php	
							echo($data[$ind]['addressTrainer']) ;}}
                            ?> </span>
                            
							</div>
						</div>
					</div>
				</div>
				<br> <br>
				<div class="row">
					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="trainer-img" style="background-image: url(images/trainer-5.jpg)"></div>
							<div class="desc">
                            <?php
							for($i = 0; $i<count($data); $i++) {
							if ($data[$i]['nameTrainer']=='Mark Brook'){
							$ind = $i ; 
						    ?><h3>
							<?php	
							echo($data[$ind]['nameTrainer']) ;
                            ?> </h3>
                            <span>
							<?php	
							echo($data[$ind]['addressTrainer']) ;}}
                            ?> </span>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="trainer-img" style="background-image: url(images/trainer-7.jpg)"></div>
							<div class="desc">
                            <?php
							for($i = 0; $i<count($data); $i++) {
							if ($data[$i]['nameTrainer']=='Danielle Peter'){
							$ind = $i ; 
						    ?><h3>
							<?php	
							echo($data[$ind]['nameTrainer']) ;
                            ?> </h3>
                            <span>
							<?php	
							echo($data[$ind]['addressTrainer']) ;}}
                            ?> </span>
								
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="trainer-img" style="background-image: url(images/trainer-4.jpg)"></div>
							<div class="desc">
                            <?php
							for($i = 0; $i<count($data); $i++) {
							if ($data[$i]['nameTrainer']=='George Cooper'){
							$ind = $i ; 
						    ?><h3>
							<?php	
							echo($data[$ind]['nameTrainer']) ;
                            ?> </h3>
                            <span>
							<?php	
							echo($data[$ind]['addressTrainer']) ;}}
                            ?> </span>
								
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="trainer-img" style="background-image: url(images/trainer-3.jpg)"></div>
							<div class="desc">
                            <?php
							for($i = 0; $i<count($data); $i++) {
							if ($data[$i]['nameTrainer']=='Alysha Reed'){
							$ind = $i ; 
						    ?><h3>
							<?php	
							echo($data[$ind]['nameTrainer']) ;
                            ?> </h3>
                            <span>
							<?php	
							echo($data[$ind]['addressTrainer']) ;}}
                            ?> </span>
							
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
