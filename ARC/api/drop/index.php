<?php require('../includes/config.php');

// INSERT INTO `drop`(`id`, `street`, `city`, `state`, `zipcode`, `status`, `donator`, `recycler`) VALUES (null,"123 elm st","boston","ma","99999","active","adamjast", "danjast")

// create/add or change status of a drop
if (false) {

    if ( isset($_POST["username"]) && isset($_POST["drop_status"]) ) {

        if ($_POST["drop_status"] === "add") {
            echo "Added drop";
            # code...
        } else if ( $_POST["drop_status"] === "remove" ) {
            echo "Removed drop";
        }
    } else {
        echo "ERROR: Missing username and drop_status";
    }

    exit;
} else {


        $stmt = $db->prepare('SELECT email FROM recycler');
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        echo $row;

    // // by default if no information is provided return all created drops
    // $drops = array(
    //         array(
    //             "street"=>"123 elm st",
    //             "city"=>"boston",
    //             "state"=>"ma",
    //             "zipcode"=>"12345",
    //             "status"=>"active",
    //             "donator"=>"username1",
    //             "recycler"=>"null"
    //             ),
    //         array(
    //             "street"=>"333 elm st",
    //             "city"=>"boston",
    //             "state"=>"ma",
    //             "zipcode"=>"12345",
    //             "status"=>"active",
    //             "donator"=>"username1",
    //             "recycler"=>"null"
    //             ),
    //         array(
    //             "street"=>"444 uptown st",
    //             "city"=>"boston",
    //             "state"=>"ma",
    //             "zipcode"=>"12345",
    //             "status"=>"inactive",
    //             "donator"=>"username1",
    //             "recycler"=>"username2"
    //             ),
    //     );

    // $results = $drops;

    // // echo json_encode($results);
    // echo '[{"street":"315 huntington ave.","city":"boston","state":"ma","zipcode":"02115","status":"active","donator":"username1","recycler":"null"},{"street":"10 Canal park","city":"boston","state":"ma","zipcode":"02141","status":"active","donator":"username1","recycler":"null"},{"street":"25 first st","city":"cambridge","state":"ma","zipcode":"02141","status":"inactive","donator":"username1","recycler":"username2"}]';
    // exit;

}


// echo $_POST["username"];
// echo $_POST["usertype"];
// exit;

// check for all required post vars
// throw error
// if (!isset($_POST["username"]) || !isset($_POST["usertype"])) {

//     echo "ERROR: You need to provide username and usertype";
//     exit;

// } else {
//     $result = $user->fetch_user('icloud', 'recycler');
//     echo $result;
// }


exit;
// var_dump(expression)

//redirect if user logged_in
// if( $user->is_logged_in() ){ 
//     echo "logged in ";
//     exit;
// } else {
//     echo "not logged in";
//     exit;
// }



//if form submitted, start processing
if(isset($_POST['submit'])){

    //Basic validation, can be improved further as required
    if(strlen($_POST['username']) < 3){
        $error[] = 'Username is too short.';
    } else {
        $stmt = $db->prepare('SELECT username FROM recycler WHERE username = :username');
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
        $stmt = $db->prepare('SELECT email FROM recycler WHERE email = :email');
        $stmt->execute(array(':email' => $_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['email'])){
            $error[] = 'Email provided is already in use.';
        }
    }


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
            $stmt = $db->prepare('INSERT INTO recycler (username,password,email,active) VALUES (:username, :password, :email, :active)');
            $stmt->execute(array(
                ':username' => $_POST['username'],
                ':password' => $hashedPassword,
                ':email' => $_POST['email'],
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

//include header template
require('layout/header.php');
?>


<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-8 