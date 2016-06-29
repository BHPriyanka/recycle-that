

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Recycle That Dashboard</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />

	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />

	<meta name="author" content="FREEHTML5.CO" />



  <!-- 

	//////////////////////////////////////////////////////



	FREE HTML5 TEMPLATE 

	DESIGNED & DEVELOPED by FREEHTML5.CO

		

	Website: 		http://freehtml5.co/

	Email: 			info@freehtml5.co

	Twitter: 		http://twitter.com/fh5co

	Facebook: 		https://www.facebook.com/fh5co



	//////////////////////////////////////////////////////



	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="shortcut icon" href="favicon.ico">



	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>

	

	<!-- Animate.css -->

	<link rel="stylesheet" href="css/animate.css">

	<!-- Icomoon Icon Fonts-->

	<link rel="stylesheet" href="css/icomoon.css">

	<!-- Bootstrap  -->

	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Superfish -->

	<link rel="stylesheet" href="css/superfish.css">



	<link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/map.css">





	<!-- Modernizr JS -->

	<script src="js/modernizr-2.6.2.min.js"></script>

	<!-- FOR IE9 below -->

	<!--[if lt IE 9]>

	<script src="js/respond.min.js"></script>

	<![endif]-->



	</head>

	<body>

		<div id="fh5co-wrapper">

		<div id="fh5co-page">

		<div id="fh5co-header">

			<!-- end:top -->

			<header id="fh5co-header-section">

				<div class="container">

					<div class="nav-header">

						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>

						<h1 id="fh5co-logo"><a href="<?php echo URL::Route('dashboard'); ?>">Dashboard</a></h1>

						<!-- START #fh5co-menu-wrap -->

					<nav id="fh5co-menu-wrap" role="navigation">

						<ul class="sf-menu" id="fh5co-primary-menu">

							<li class="active">

								<a href="<?php echo URL::Route('dashboard'); ?>">Home</a>

							</li>

							<li>

								<a href="#">Help</a>

							</li>

							<li><a href="<?php echo URL::Route('showcase'); ?>">Logout</a></li>

						</ul>

					</nav>

					</div>

				</div>

			</header>

		</div>

		

		

		<div class="fh5co-hero">

			<div class="fh5co-overlay"></div>

			<div class="fh5co-cover text-center" style="background-image: url(images/work-1.jpg);">

				

			</div>



		</div>

		<!-- end:header-top -->

		<div id="fh5co-services-section" class="border-bottom">

			<div class="container">
                <div id="alert-div" class="text-center alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Thank you for saving the environment!</strong></div>
                <div id="map"></div>

                <br>

                <div class="form-group">
				<div class="dropdown col-sm-6 col-md-12">
					<button class="btn btn-success dropdown-toggle form-control" type="button" data-toggle="dropdown">Drop Pick Up
					<span class="caret"></span></button>
					<ul class="dropdown-menu col-md-12 col-sm-12">
						<li><a id="pickup" class="dropdown-items" href="#">315 Huntington Ave. Boston,MA 02115</a></li>
						<li><a href="#">151 Cambridge St. Cambridge,MA 02114</a></li>
						<li><a href="#">25 First St. Cambridge, MA 02141</a></li>
					</ul>
				</div>
				</div>

            </div>

		</div>

        </div>

        </div>

	<script src="js/jquery.min.js"></script>

	<!-- jQuery Easing -->

	<script src="js/jquery.easing.1.3.js"></script>

	<!-- Bootstrap -->

	<script src="js/bootstrap.min.js"></script>

	<!-- Waypoints -->

	<script src="js/jquery.waypoints.min.js"></script>

	<!-- Superfish -->

	<script src="js/hoverIntent.js"></script>

	<script src="js/superfish.js"></script>



	<!-- Main JS (Do not remove) -->

	<script src="js/main.js"></script>

    <script src="js/map.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANbznbiyqSlvBZKNGUoPr2GtCiYrNboag&callback=initMap"

    async defer></script>

        

    

	</body>

</html>


