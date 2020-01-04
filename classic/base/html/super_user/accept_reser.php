<?php
    include('functions.php');
    $eventID = $_GET['eventID'];
    $query = "select * from `request_su` where `eventID` = '$eventID'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
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
            $query = "INSERT INTO `dean_office` (`eventID`, `firstName`, `lastName`, `mobNum`, `org`, `pos`, `adviser`, `eveName`, `numPart`, `startDate`, `endDate`, `startTime`, `endTime`) VALUES (NULL, '$firstName', '$lastName', '$mobNum', 'org', '$pos', '$adviser', '$eveName', '$numPart', '$startDate', '$endDate', '$startTime', '$endTime');";
        }
        $query .= "DELETE FROM `request_su` WHERE `request_su`.`eventID` = '$eventID';";
        if(performQuery($query)){
            echo "";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
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
                        <h1>Reservation Accepted</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-success fade in">
                            <input type="hidden" name="eventID" value="<?php echo trim($_GET["eventID"]); ?>"/>
                            <p>The reservation is now Pending to the Offices.</p><br>
                            <p>

                                <a href="reservation.php" class="btn btn-default">Back</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>