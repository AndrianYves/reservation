<?php 

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM account_orgs";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
	$active = '';
	// if($row['active'] == 1) {
	// 	$active = '<label class="label label-success">Active</label>';
	// } else {
	// 	$active = '<label class="label label-danger">Deactive</label>'; 
	// }

	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>

	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['userID'].')"> 
	     <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['userID'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$x,
		$row['firstName'],
		$row['lastName'],
		$row['studOrg'],
		$row['studPosition'],
		$row['studEmail'],
		$row['studPassword'],
		$actionButton
	);

	$x++;
}

// database connection close
$connect->close();

echo json_encode($output);