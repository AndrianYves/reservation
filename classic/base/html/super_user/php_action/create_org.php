<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$studFirst = $_POST['studFirst'];
	$studLast = $_POST['studLast'];
	$studOrg = $_POST['studOrg'];
	$studPos = $_POST['studPos'];
	$studEmail = $_POST['studEmail'];
	$studPass = $_POST['studPass'];

	$sql = "INSERT INTO account_orgs (firstName, lastName, studOrg, studPosition, studEmail, studPassword) VALUES ('$studFirst', '$studLast', '$studOrg', '$studPos', '$studEmail', '$studPass')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";	
		// echo "success";	
	} else {		
		 $validator['success'] = false;
		 $validator['messages'] = "Error while adding the member information";
		// echo "error";	
	}

	// close the database connection
	$connect->close();

	 echo json_encode($validator);

}