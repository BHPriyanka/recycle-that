<?php
include('passwordClass.php');
class UserClass extends PasswordClass{

    private $_db;

    function __construct($db){
    	parent::__construct();
    
    	$this->_db = $db;
    }

	public function fetch_user($username, $usertype){

		// echo $usertype;
		// exit;

    	// echo "getting user details";
    	// exit;

		try {
			if ($usertype === 'recycler') {
				$stmt = $this->_db->prepare('SELECT * FROM recycler WHERE username = :username AND active="Yes" ');

				# code...
			} else if ($usertype === 'donator') {
				$stmt = $this->_db->prepare('SELECT * FROM donator WHERE username = :username AND active="Yes" ');
				# code...
			}
			
			$stmt->execute(
				array('username' => $username)
				);
			
			$row = $stmt->fetch();

			// var_dump($row);
			// var_dump(json_encode($row));
			return json_encode($row); 
			// exit;

			// return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
}


?>