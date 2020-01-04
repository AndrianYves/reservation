<?php 

$connect = new PDO('mysql:host=localhost;dbname=database_itproject2', 'root', '');

$data = array();

$query = "SELECT * FROM events ORDER BY eventID";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row){
	$data[] = array(

		'id'		=> $row["eventID"],
		'title'		=> $row["eveName"],
		'start'		=> $row["startDate"],
		'end'		=> $row["endDate"]
	);
}

echo json_encode($data);
 ?>