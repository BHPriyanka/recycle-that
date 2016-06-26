<?php



// create/add or change status of a drop
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

	// by default if no information is provided return all created drops
	$drops = array(
			array(
				"street"=>"123 elm st",
				"city"=>"boston",
				"state"=>"ma",
				"zipcode"=>"12345",
				"status"=>"active",
				"donator"=>"username1",
				"recycler"=>"null"
				),
			array(
				"street"=>"333 elm st",
				"city"=>"boston",
				"state"=>"ma",
				"zipcode"=>"12345",
				"status"=>"active",
				"donator"=>"username1",
				"recycler"=>"null"
				),
			array(
				"street"=>"444 uptown st",
				"city"=>"boston",
				"state"=>"ma",
				"zipcode"=>"12345",
				"status"=>"inactive",
				"donator"=>"username1",
				"recycler"=>"username2"
				),
		);

	$results = $drops;

	// echo json_encode($results);
	echo '[{"street":"315 huntington ave.","city":"boston","state":"ma","zipcode":"02115","status":"active","donator":"username1","recycler":"null"},{"street":"10 Canal park","city":"boston","state":"ma","zipcode":"02141","status":"active","donator":"username1","recycler":"null"},{"street":"25 first st","city":"cambridge","state":"ma","zipcode":"02141","status":"inactive","donator":"username1","recycler":"username2"}]';
	exit;

}





 ?>