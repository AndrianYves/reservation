<?php
// Check existence of id parameter before processing further
if(isset($_GET["eventID"]) && !empty(trim($_GET["eventID"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM events WHERE eventID = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_eventID);
        
        // Set parameters
        $param_eventID = trim($_GET["eventID"]);
        
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
                $org = $row["eventOrg"];
                $eve = $row["actEve"];
                $ven = $row["actVenue"];
                $part = $row["numPart"];
                $sd = $row["startDate"];
                $ed = $row["endDate"];
                $st = $row["startTime"];
                $et = $row["endTime"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>ID:</label>
                        <p class="form-control-static"><?php echo $row["eventID"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>First Name:</label>
                        <p class="form-control-static"><?php echo $row["firstName"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <p class="form-control-static"><?php echo $row["lastName"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Organization:</label>
                        <p class="form-control-static"><?php echo $row["eventOrg"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Event:</label>
                        <p class="form-control-static"><?php echo $row["actEve"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Venue:</label>
                        <p class="form-control-static"><?php echo $row["actVenue"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Participants:</label>
                        <p class="form-control-static"><?php echo $row["numPart"]; ?></p>
                    </div>
                     <div class="form-group">
                        <label>Start Date:</label>
                        <p class="form-control-static"><?php echo $row["startDate"]; ?></p>
                    </div>
                     <div class="form-group">
                        <label>End Date:</label>
                        <p class="form-control-static"><?php echo $row["endDate"]; ?></p>
                    </div>
                     <div class="form-group">
                        <label>Start Time:</label>
                        <p class="form-control-static"><?php echo $row["startTime"]; ?></p>
                    </div>
                     <div class="form-group">
                        <label>End Time:</label>
                        <p class="form-control-static"><?php echo $row["endTime"]; ?></p>
                    </div>
                    <p><a href="../events.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>