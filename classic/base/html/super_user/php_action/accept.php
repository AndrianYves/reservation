<?php
// Include config file
require_once "config.php";

$firstName = $lastName = $mobNum = $org = $pos = $adviser = $eveName = $numPart = $startDate = $endDate = $startTime =$endTime = "";
$firstName_err = $lastName_err = $mobNum_err = $org_err = $pos_err = $adviser_err = $eveName_err = $numPart_err = $startDate_err = $endDate_err = $startTime_err = $endTime_err = "";

// Processing form data when form is submitted
if(isset($_POST["eventID"]) && !empty($_POST["eventID"])){
// Get hidden input value
$eventID = $_POST["eventID"];
// Validate name
$input_fname = trim($_POST["firstName"]);
if(empty($input_fname)){
$firstName_err = "Please enter a name.";
} elseif(!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
$firstName_err = "Please enter a valid name.";
} else{
$firstName = $input_fname;
}

$input_lname = trim($_POST["lastName"]);
if(empty($input_lname)){
$lastName_err = "Please enter a name.";
} elseif(!filter_var($input_lname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
$lastName_err = "Please enter a valid name.";
} else{
$lastName = $input_lname;
}

$input_mobNum = trim($_POST["mobNum"]);
if(empty($input_mobNum)){
$mobNum_err = "Please enter a name.";
} else{
$mobNum = $input_mobNum;
}

$input_org = trim($_POST["org"]);
if(empty($input_org)){
$org_err = "Please enter a name.";
}else{
$org = $input_org;
}

$input_pos = trim($_POST["pos"]);
if(empty($input_pos)){
$pos_err = "Please enter a name.";
} elseif(!filter_var($input_pos, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
$pos_err = "Please enter a valid name.";
} else{
$pos = $input_pos;
}

$input_adviser = trim($_POST["adviser"]);
if(empty($input_adviser)){
$adviser_err = "Please enter a name.";
} else{
$adviser = $input_adviser;
}

$input_eveName = trim($_POST["eveName"]);
if(empty($input_eveName)){
$eveName_err = "Please enter a name.";
} else{
$eveName = $input_eveName;
}

$input_numPart = trim($_POST["numPart"]);
if(empty($input_numPart)){
$numPart_err = "Please enter a name.";
} else{
$numPart = $input_numPart;
}

$input_startDate = trim($_POST["startDate"]);
if(empty($input_startDate)){
$startDate_err = "Please enter a name.";
} else{
$startDate = $input_startDate;
}

$input_endDate = trim($_POST["endDate"]);
if(empty($input_endDate)){
$endDate_err = "Please enter a name.";
} else{
$endDate = $input_endDate;
}

$input_startTime = trim($_POST["startTime"]);
if(empty($input_startTime)){
$startTime_err = "Please enter a name.";
} else{
$startTime = $input_startTime;
}

$input_endTime= trim($_POST["endTime"]);
if(empty($input_endTime)){
$endTime_err = "Please enter a name.";
} else{
$endTime = $input_endTime;
}
// Check input errors before inserting in database
if(empty($firstName_err) && empty($lastName_err) && empty($mobNum_err) && empty($org_err) && empty($pos_err) && empty($adviser_err) && empty($eveName_err) && empty($numPart_err) && empty($startDate_err) && empty($endDate_err) && empty($startTime_err) && empty($endTime_err)){
// Prepare an update statement
// $sql = "INSERT INTO dean_office (firstName, lastName, mobNum, org, pos, adviser, eveName, numPart, startDate, endDate, startTime, endTime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sql = "UPDATE request_su SET firstName=?, lastName=?, mobNum=?, org=?, pos=?, adviser=?, eveName=?, numPart=?, startDate=?, endDate=?, startTime=?, endTime=? WHERE eventID=?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ssssssssssss", $param_fname, $param_lName, $param_mobNum, $param_org, $param_pos, $param_adviser, $param_eveName, $param_numPart, $param_startDate, $param_endDate, $param_startTime, $param_endTime);

// Set parameters
$param_fname = $firstName;
$param_lName = $lastName;
$param_mobNum = $mobNum;
$param_org = $org;
$param_pos = $pos;
$param_adviser = $adviser;
$param_eveName = $eveName;
$param_numPart = $numPart;
$param_startDate = $startDate;
$param_endDate = $endDate;
$param_startTime = $startTime;
$param_endTime = $endTime;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Records updated successfully. Redirect to landing page
header("location: ../reservation.php");
exit();
} else{
echo "Something went wrong. Please try again later.". mysqli_error($link);
}
// Close statement
mysqli_stmt_close($stmt);
}


}

// Close connection
mysqli_close($link);
} else{
// Check existence of id parameter before processing further
if(isset($_GET["eventID"]) && !empty(trim($_GET["eventID"]))){
// Get URL parameter
$eventID =  trim($_GET["eventID"]);

// Prepare a select statement
$sql = "SELECT * FROM request_su WHERE eventID = ?";
if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "i", $param_eventID);

// Set parameters
$param_eventID = $eventID;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 1){
/* Fetch result row as an associative array. Since the result set
contains only one row, we don't need to use while loop */
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

// Retrieve individual field value
$firstName = $row["firstName"];
$lastName = $row["lastName"];
$mobNum = $row["mobNum"];
$org = $row["org"];
$pos = $row["pos"];
$adviser = $row["adviser"];
$eveName = $row["eveName"];
$numPart = $row["numPart"];
$startDate = $row["startDate"];
$endDate = $row["endDate"];
$startTime = $row["startTime"];
$endTime = $row["endTime"];

} else{
// URL doesn't contain valid id. Redirect to error page
header("location: error.php");
exit();
}

} else{
echo "Oops! Something went wrong. Please try again later.". mysqli_error($link);
}
}

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($link);
}  else{
// URL doesn't contain id parameter. Redirect to error page
header("location: error.php");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Accept Record</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
        .wrapper{
        width: 500px;
        margin: 0 auto;
        }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Accept Reservation</h2>
                        </div>
                        <p>Please edit the input values and submit to update the record.</p>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                            <div class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>" >
                                <span class="help-block"><?php echo $firstName_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                <label>Last Name</label>
                                <input type="text" name="lastName" class="form-control" value="<?php echo $lastName; ?>" >
                                <span class="help-block"><?php echo $lastName_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($mobNum_err)) ? 'has-error' : ''; ?>">
                                <label>Mobile Number</label>
                                <input type="text" name="mobNum" class="form-control" value="<?php echo $mobNum; ?>" >
                                <span class="help-block"><?php echo $mobNum_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($org_err)) ? 'has-error' : ''; ?>">
                                <label>Organization</label>
                                <input type="text" name="org" class="form-control" value="<?php echo $org; ?>" >
                                <span class="help-block"><?php echo $org_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($pos_err)) ? 'has-error' : ''; ?>">
                                <label>Position</label>
                                <input type="text" name="pos" class="form-control" value="<?php echo $pos; ?>" >
                                <span class="help-block"><?php echo $pos_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($adviser_err)) ? 'has-error' : ''; ?>">
                                <label>Adviser</label>
                                <input type="text" name="adviser" class="form-control" value="<?php echo $adviser; ?>" >
                                <span class="help-block"><?php echo $adviser_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($eveName_err)) ? 'has-error' : ''; ?>">
                                <label>Event Name</label>
                                <input type="text" name="eveName" class="form-control" value="<?php echo $eveName; ?>">
                                <span class="help-block"><?php echo $eveName_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($numPart_err)) ? 'has-error' : ''; ?>">
                                <label>Number of Participants</label>
                                <input type="text" name="numPart" class="form-control" value="<?php echo $numPart; ?>" >
                                <span class="help-block"><?php echo $numPart_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($startDate_err)) ? 'has-error' : ''; ?>">
                                <label>Start Date</label>
                                <input type="text" name="startDate" class="form-control" value="<?php echo $startDate; ?>" >
                                <span class="help-block"><?php echo $startDate_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($endDate_err)) ? 'has-error' : ''; ?>">
                                <label>End Date</label>
                                <input type="text" name="endDate" class="form-control" value="<?php echo $endDate; ?>" >
                                <span class="help-block"><?php echo $endDate_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($startTime_err)) ? 'has-error' : ''; ?>">
                                <label>Start Time</label>
                                <input type="text" name="startTime" class="form-control" value="<?php echo $startTime; ?>" >
                                <span class="help-block"><?php echo $startTime_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($endTime_err)) ? 'has-error' : ''; ?>">
                                <label>End Time</label>
                                <input type="text" name="endTime" class="form-control" value="<?php echo $endTime; ?>">
                                <span class="help-block"><?php echo $endTime_err;?></span>
                            </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Accept">
                                    <a href="../reservation.php" class="btn btn-default">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>