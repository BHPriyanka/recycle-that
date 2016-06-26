<?php
//include config
require_once('includes/config.php');

// echo "hit";

//check if already logged in
if( $user->is_logged_in() ){ 
	// header('Location: index.php'); 
	header('Location: dashboard.php');
} 

//process login form if submitted
if(isset($_POST['submit'])){

	// echo "hit submit";

	$username = $_POST['username'];
	$password = $_POST['password'];

	// var_dump($username,$password);
	
	if($user->user_login($username,$password)){
		$_SESSION['username'] = $username;
		header('Location: dashboard.php');
		exit;
	
	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}

}//end if submit

// var_dump($error);

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recycle That</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Recycle for social impact" />
    <meta name="keywords" content="drop, donator, recycler, bottle, can" />
    <meta name="author" content="Recycle That Team" />

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
    <link rel="shortcut icon" href="../../assets/images/img/favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
    
	<!-- Animate.css -->
	<link rel="stylesheet" href="../../assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../../assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="../../assets/css/superfish.css">

	<link rel="stylesheet" href="../../assets/css/style.css">

	<!-- Modernizr JS -->
	<script src="../../assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="../../assets/js/respond.min.js"></script>
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
						<h1 id="fh5co-logo"><a href="index.html">Recycle That <img src="../../assets/images/img/bottle-recycling.png"/></a></h1>
                        <!-- START #fh5co-menu-wrap -->
                    <nav id="fh5co-menu-wrap" role="navigation">
                        <ul class="sf-menu" id="fh5co-primary-menu">
                            <li>
                                <a href="../../index.html">Home</a>
                            </li>
                            <li>
                                <a href="index.html">Login</a>
                            </li>
                            <li><a href="../../index.html#about">About</a></li>
                            <li><a href="../../index.html#contact">Contact</a></li>
                        </ul>
                    </nav>
                    </div>
                </div>
            </header>
        </div>
		
		
		<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" style="background-image: url(/assets/images/work-1.jpg);">
				
			</div>

		</div>
		<!-- end:header-top -->
		<div id="fh5co-services-section" class="border-bottom">
			<div class="container">
                <h1 class="text-center">Login</h1>
                <form role="form" method="post" action="" class="form-horizontal">
                	<input type="hidden" name="submit" class="form-control" value="submit">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                      <input type="username" name="username" class="form-control" id="inputUsername" placeholder="User Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                  </div>
                </form>
            </div>
		</div>
        </div>
        </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="../../assets/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="../../assets/js/jquery.waypoints.min.js"></script>
    <!-- Superfish -->
    <script src="../../assets/js/hoverIntent.js"></script>
    <script src="../../assets/js/superfish.js"></script>

    <!-- Main JS (Do not remove) -->
    <script src="../../assets/js/main.js"></script>
	
	</body>
</html>

