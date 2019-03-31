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
		$get_data = callAPI('GET', 'http://localhost/Fitness-Website/Back-end/api/controllers/activity_type/read.php', false);
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
								<li class="active"><a href="index.php">Home</a></li>
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
				   					<h1>This is a Lifestyle There is no Finish Line</h1>
				   					<p><a href="account.php" class="btn btn-primary btn-lg btn-learn">Join Classes</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Don't Stop When it Hurts, Stop When You're Done</h1>
				   					<p><a href="account.php" class="btn btn-primary btn-lg btn-learn">Join Classes</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Stop Wishing, Start Doing</h1>
				   					<p><a href="account.php" class="btn btn-primary btn-lg btn-learn">Join Classes</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Working Out is a Reward not a Punishment</h1>
				   					<p><a href="account.php" class="btn btn-primary btn-lg btn-learn">Join Classes</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>	
			  	</ul>
		  	</div>
		</aside>
		
		<div id="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-md-12 intro-wrap animate-box">
						<div class="intro-flex">
							<div class="one-third intro-img" style="background-image: url(images/blog-3.jpg)">
								<div class="desc">
									<h3>Body Building</h3>
									<br><br><br>
									<span class="price text-center">120.00 DT<br><small>/month</small></span>
								</div>
							</div>
							<div class="one-third intro-img" style="background-image: url(images/classes-7.jpg)">
								<div class="desc">
									<h3>Group Classes</h3>
									<br><br><br>
									<span class="price text-center">120.00 DT<br><small>/month</small></span>
								</div>
							</div>
							<div class="one-third intro-img" style="background-image: url(images/intro-img-3.jpg)">
								<div class="desc">
									<h3>Yoga Program</h3>
									<br><br><br>
									<span class="price text-center">120.00 DT<br><small>/month</small></span>
								</div>
							</div>
						</div>
		         </div>
				</div>
			</div>
		</div>
		

		<div id="colorlib-services">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Being fit is attractive</h2>
						<h3>Welcome to the best Fitness Club</h3>
						<p>Fitness Club is a unique gym established for 10 years in Urban Center North.
							Our mission is to inspire, motivate and mentor people of all ages to help them train and improve their well-being.
							It provides its members with conditions conducive to the practice of sport and offers them a friendly environment where real social bonds are woven around the same center of interest: Sport and health.
						</p>
					</div>
				</div>
				<div class="row text-center animate-box">
					<h3>COME JOIN OUR CLASSES TO BE PART OF THIS WONDERFUL COMMUNITY</h3>
					<div class="col-md-3 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="flaticon-gym"></i>
							</span>
							<div class="desc">
								<h3>Cardio Program</h3>
								<p>A variety of classes that give you energy and help you feel liberated and alive</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="flaticon-weightlifting"></i>
							</span>
							<div class="desc">
								<h3>Body Building</h3>
								<p>The ultimate way for strengthening, definition and muscular endurance</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="flaticon-martial-arts"></i>
							</span>
							<div class="desc">
								<h3>Karate Classes</h3>
								<p>For both adults and kids, teaches you to defend yourself while strengthening your muscles</p>
								</div>
						</div>
					</div>
					<div class="col-md-3 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="flaticon-gloves"></i>
							</span>
							<div class="desc">
								<h3>Boxing Program</h3>
								<p>This combat sport helps you develop resistance, speed, flexibility and coordination</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="colorlib-testimony" class="testimony-img" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h3>What People Say</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="row animate-box">
							<div class="owl-carousel1">
								<div class="item">
									<div class="testimony-slide">
										<div class="testimony-wrap">
											<blockquote>
												<span>Sophia Foster</span>
												<p> Where do I start, this gym is what I think about when I think of the perfect gym. I love the awesome energy and knowledge that you get from the trainers here, they are eager to help and will to take time with you. Also they understand what you are striving for and they WILL get you there and further, while having fun.
													I will definitely be returning for a round two, hope to see you there!</p>
											</blockquote>
											<div class="figure-img" style="background-image: url(images/person1.jpg);"></div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide">
										<div class="testimony-wrap">
											<blockquote>
												<span>John Collins</span>
												<p>I never thought I would like to "train" in a gym but Fitness Club has completely changed my mind and transformed my body! The classes are intense for every level athlete, and you will love the diverse workout combinations.</p>
											</blockquote>
											<div class="figure-img" style="background-image: url(images/person2.jpg);"></div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide">
										<div class="testimony-wrap">
											<blockquote>
												<span>Adam Ross</span>
												<p>The instructors are extremely knowledgeable, highly motivated, and awesome people to be around. I've never been in a gym with a better vibe.
													No matter if your goal is to simply stay fit or to train like a hardcore athlete, Fitness Club has what you're looking for.
												</p>
											</blockquote>
											<div class="figure-img" style="background-image: url(images/person3.jpg);"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-event">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Upcoming Events</h2>
						<p>Are you ready for some FUN? Don't miss the chance to celebrate with us these events! <br>
							We will be thrilled to have you among us. <br>
							All events are free but require membership. </p>
					</div>
				</div>
				<div class="row row-pb-sm">
					<div class="col-md-4 animate-box">
						<div class="event-entry">
							<div class="desc">
								<p class="meta"><span class="day">1</span><span class="month">Apr</span></p>
								<p class="organizer"><span>Organized by:</span> <span>DIEGO CARTER</span></p>
								<h2>Special Outdoor Training</h2>
							</div>
							<div class="location">
								<span class="icon"><i class="icon-map"></i></span>
								<p>676 INSAT Urban Center North BP, Tunis Cedex 1080</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="event-entry">
							<div class="desc">
								<p class="meta"><span class="day">19</span><span class="month">Apr</span></p>
								<p class="organizer"><span>Organized by:</span> <span>SARAH HENDERSON</span></p>
								<h2>World Yoga Day at Fitness Club</h2>
							</div>
							<div class="location">
								<span class="icon"><i class="icon-map"></i></span>
								<p>676 INSAT Urban Center North BP, Tunis Cedex 1080</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="event-entry">
							<div class="desc">
								<p class="meta"><span class="day">30</span><span class="month">Apr</span></p>
								<p class="organizer"><span>Organized by:</span> <span>Fitness Club Team</span></p>
								<h2>10th Anniversary of Fitness Club</h2>
							</div>
							<div class="location">
								<span class="icon"><i class="icon-map"></i></span>
								<p>676 INSAT Urban Center North BP, Tunis Cedex 1080</p>
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

