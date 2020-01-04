<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$level = $_POST['level'];
	$room = $_POST['room'];
	$type = $_POST['type'];
	$capacity = $_POST['capacity'];
	$description = $_POST['description'];

	$sql = "INSERT INTO facilities (facilityLevel, facilityRoom, roomType, roomDescription, roomCapacity) VALUES ('$level', '$room', '$type', '$description', '$capacity')";
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