<?php 

  include 'DBConnector.php';

	if(isset($_POST['setdate'])){ 
		$datestart = $_POST["datestart"];
		$dateend = $_POST["dateend"];

		$sql = "UPDATE semesterdate SET semesterStart = '$datestart', semesterend = '$dateend'"; 
		mysqli_query($conn, $sql);


 		$sql1 = mysqli_query($conn, "SELECT * from users where status = 'Active' and user_type != 'Super Admin'");
		while ($rows = mysqli_fetch_array($sql1)) { 
		    $sql = "UPDATE users set endofsem = '$dateend' where userID = '".$rows['userID']."'";   
		    mysqli_query($conn, $sql);
		  }

		echo "<script>alert('Date Updated!);</script>";
		header('location: accounts.php');
	}

?>