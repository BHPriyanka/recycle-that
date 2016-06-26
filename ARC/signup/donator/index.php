<?php require('includes/config.php');

//redirect if user logged_in
if( $user->is_logged_in() ){ header('Location: members.php'); }

//if form submitted, start processing
if(isset($_POST['submit'])){

//     var_dump($_POST);
// exit;


    //Basic validation, can be improved further as required
    if(strlen($_POST['username']) < 3){
        $error[] = 'Username is too short.';
    } else {
        $stmt = $db->prepare('SELECT username FROM donator WHERE username = :username');
        $stmt->execute(array(':username' => $_POST['username']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['username'])){
            $error[] = 'Username provided is already in use.';
        }

    }

    if(strlen($_POST['password']) < 3){
        $error[] = 'Password is too short.';
    }

    if(strlen($_POST['passwordConfirm']) < 3){
        $error[] = 'Confirm password is too short.';
    }

    if($_POST['password'] != $_POST['passwordConfirm']){
        $error[] = 'Passwords do not match.';
    }

    //email validation
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error[] = 'Please enter a valid email address';
    } else {
        $stmt = $db->prepare('SELECT email FROM donator WHERE email = :email');
        $stmt->execute(array(':email' => $_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['email'])){
            $error[] = 'Email provided is already in use.';
        }
    }

    // var_dump($error);
    // exit;


    //if no errors, forward to registration
    if(!isset($error)){

        //hash the password
        $hashedPassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

        //create the associated activation code//random
        // $activation = md5(uniqid(rand(),true));
        // make user active don't require email auth
        $activation = 'Yes';



        try {

            //insert into database with a prepared statement
            $stmt = $db->prepare('INSERT INTO donator (username,password,email,active,street,city,state,zipcode) VALUES (:username, :password, :email, :active, :street, :city, :state, :zipcode)');
            $stmt->execute(array(
                ':username' => $_POST['username'],
                ':password' => $hashedPassword,
                ':email' => $_POST['email'],
                ':street' => $_POST['inputStreet'],
                ':city' => $_POST['inputCity'],
                ':state' => $_POST['inputState'],
                ':zipcode' => $_POST['inputZipcode'],
                ':active' => $activation
            ));
            $id = $db->lastInsertId('memberID');

            //send email with activation link
            $to = $_POST['email'];
            $subject = "Registration Confirmation";
            $body = "Thank you for registering.\n\n To activate your account, please click on this link:\n\n ".DIR."activate.php?x=$id&y=$activation\n\n Regards Site Admin \n\n";
            $additionalHeaders = "From: <".SITEEMAIL.">\r\n";
            $additionalHeaders .= "Reply-To: ".SITEEMAIL."";
            mail($to, $subject, $body, $additionalHeaders);

            //redirect to index page
            header('Location: index.php?action=registered');
            exit;

            //else catch the exception and show the error.
        } catch(PDOException $e) {
            $error[] = $e->getMessage();
        }

    }

}

//define page title
$title = 'Sample Login';

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
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

  <!-- 
    //////////////////////////////////////////////////////

    FREE HTML5 TEMPLATE 
    DESIGNED & DEVELOPED by FREEHTML5.CO
        
    Website:        http://freehtml5.co/
    Email:          info@freehtml5.co
    Twitter:        http://twitter.com/fh5co
    Facebook:       https://www.facebook.com/fh5co

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
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                    </div>
                </div>
            </header>
        </div>
        
        
        <div class="fh5co-hero">
            <div class="fh5co-overlay"></div>
            <div class="fh5co-cover text-center" style="background-image: url(../../assets/images/work-1.jpg);">
                
            </div>

        </div>
        <!-- end:header-top -->
        <div id="fh5co-services-section" class="border-bottom">
            <div class="container">
                <h1 class="text-center">Sign up as a Donator!</h1>
				<form class="form-vertical" role="form" method="post" action="">
				<div class="col-md-8 col-lg-offset-3">
					<div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">User Name</label>
					<div class="col-sm-6 input-group">
						<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						  <input type="text" name="username" class="form-control" id="inputUsername" placeholder="User Name">
					</div>
                    </div>
				
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6 input-group">
					<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-6 input-group">
					<span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress" class="col-sm-2 control-label">Address</label>
                    <div class="input-address col-sm-6 input-group">
					<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>  
                      <input type="text" class="form-control" id="inputStreet" placeholder="Street">
                      <input type="text" class="form-control" id="inputCity" placeholder="City">
                      <input type="text" class="form-control" id="inputState" placeholder="State">
                      <input type="text" class="form-control" id="inputZipcode" placeholder="Zip Code">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                      <button type="submit" class="btn btn-default">Sign up</button>
                    </div>
                  </div>
				  </div>
                </form>
				
				
				
				
                <form role="form" method="post" action="" class="form-horizontal">
                  <input type="hidden" name="submit" value="submit">
                  <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control" id="inputUsername" placeholder="User Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="passwordConfirm" class="col-sm-2 control-label">Password Confirm</label>
                    <div class="col-sm-10">
                      <input type="password" name="passwordConfirm" class="form-control" id="passwordConfirm" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" name="inputStreet" class="form-control" id="inputStreet" placeholder="Street" required>
                      <input type="text" name="inputCity" class="form-control" id="inputCity" placeholder="City" required>
                      <input type="text" name="inputState" class="form-control" id="inputState" placeholder="State" required>
                      <input type="text" name="inputZipcode" class="form-control" id="inputZipcode" placeholder="Zip Code" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign up</button>
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

