
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Render &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
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
	 -->

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


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
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
				<div>
					<div class="alert alert-success" id="alertCreatedDrop" style="display:none;">
					  <strong>Success!</strong> <span id="alertMessage">Created a drop.  Someone will pick it up soon.</span>
					</div>
					<div class="alert alert-success" id="alertCompletedDrop" style="display:none;">
					  <strong>Success!</strong> <span id="alertMessage">Your recyclables have been picked up.</span>
					</div>
				</div>
				<!-- <p><strong>Drop Location:</strong><span id="dropLocation">123 Main Ave. Boston, MA 02115</span> -->
				<p><strong>Drop Location:</strong><span id="dropLocation"> </span>
				<button id="myBtn" type="button" class="btn btn-success pull-right">Edit</button>
				</p>
									
				<button id="makeDropBtn" type="button" class="btn btn-primary btn-block">Make Drop</button>
                <br>
                <button id="completeDropBtn" type="button" class="btn btn-success btn-block" disabled>Drop has been picked up</button>
          
            </div>
		</div>						
					
		<script>

		var donators_address = {"street":"315 huntington ave.","city":"boston","state":"ma","zipcode":"02115","status":"active","donator":"username1","recycler":"null"};

		var addresses = [{"street":"315 huntington ave.","city":"boston","state":"ma","zipcode":"02115","status":"active","donator":"username1","recycler":"null"},{"street":"10 Canal park","city":"boston","state":"ma","zipcode":"02141","status":"active","donator":"username1","recycler":"null"},{"street":"25 first st","city":"cambridge","state":"ma","zipcode":"02141","status":"inactive","donator":"username1","recycler":"username2"}];
	
		
		// var placeSearch, autocomplete;
		// var componentForm = {
  //       street_number: 'short_name',
  //       route: 'long_name',
  //       locality: 'long_name',
  //       administrative_area_level_1: 'short_name',
  //       country: 'long_name',
  //       postal_code: 'short_name'
  //     };

  //     function initAutocomplete() {
	 //  console.log("initAutocomplete");
  //       // Create the autocomplete object, restricting the search to geographical
  //       // location types.
  //       autocomplete = new google.maps.places.Autocomplete(
  //           /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
  //           {types: ['geocode']});

  //       // When the user selects an address from the dropdown, populate the address
  //       // fields in the form.
  //       autocomplete.addListener('place_changed', fillInAddress);
  //     }

  //     function fillInAddress() {
  //       // Get the place details from the autocomplete object.
  //       var place = autocomplete.getPlace();

  //       for (var component in componentForm) {
  //         document.getElementById(component).value = '';
  //         document.getElementById(component).disabled = false;
  //       }

  //       // Get each component of the address from the place details
  //       // and fill the corresponding field on the form.
  //       for (var i = 0; i < place.address_components.length; i++) {
  //         var addressType = place.address_components[i].types[0];
  //         if (componentForm[addressType]) {
  //           var val = place.address_components[i][componentForm[addressType]];
  //           document.getElementById(addressType).value = val;
  //         }
  //       }
  //     }

  //     // Bias the autocomplete object to the user's geographical location,
  //     // as supplied by the browser's 'navigator.geolocation' object.
  //     function geolocate() {
  //      if (navigator.geolocation) {
  //         navigator.geolocation.getCurrentPosition(function(position) {
  //           var geolocation = {
  //             lat: position.coords.latitude,
  //             lng: position.coords.longitude
  //           };
  //           var circle = new google.maps.Circle({
  //             center: geolocation,
  //             radius: position.coords.accuracy
  //           });
  //           autocomplete.setBounds(circle.getBounds());
  //         });
  //       }
  //     }
	  
		</script>
		
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
    <!--script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1lw5147pIi03OXyXch260ENtdcPBipT0&libraries=places&callback=initAutocomplete" async defer></script-->
	

<script type="text/javascript">

		var drop_state = undefined;

		// hide alerts
		$(".alert.alert-success #alertCreatedDrop").hide();


		// udpate drop location with users default location
		$( "#dropLocation" ).html(" " + donators_address.street + " " + donators_address.city + " " + donators_address.state + ", " + donators_address.zipcode);

		// watch user for creating a drop
		$( "#makeDropBtn" ).click(function() {

			// show message
			$(".alert.alert-success#alertCreatedDrop").fadeIn(1000);

			// disable make drop button
			$("makeDropBtn").prop("disabled",true);

			// enable drop has been picked up button
			$("#completeDropBtn").prop("disabled", false);

		});

		// watch user to notice the drop has been picked up
		$( "#completeDropBtn" ).click(function() {

			// show message
			$(".alert.alert-success#alertCompletedDrop").fadeIn(1000);


			$("#completeDropBtn").prop("disabled",true);
			$("#makeDropBtn").prop("disabled", false);

		});

		// watch alert to fade out
		// hide message
		$( ".alert.alert-success" ).click(function() {

			// alert( "Thanks for notifiying your recyclables have been picked up." );

			$(".alert.alert-success").fadeOut(2000);

		});
		
	
</script>
	</body>
</html>

