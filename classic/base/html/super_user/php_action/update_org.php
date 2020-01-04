<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$level = $_POST['editLevel'];
	$room = $_POST['editRoom'];
	$type = $_POST['editType'];
	$description = $_POST['editDescription'];
	$capacity = $_POST['editCapacity'];

	$sql = "UPDATE student_orgs SET firstName = '$level', lastName = '$room', studOrg = '$type', studPosition = '$description', studEmail = '$capacity',studPassword ='$' WHERE facilityID = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}