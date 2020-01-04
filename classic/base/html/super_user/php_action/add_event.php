<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$firstName = $lastName = $org = $eve = $ven = $part = $sd = $ed = $st = $et ="";
//$name_err = $address_err = $salary_err = "";
$firstName_err = $lastName_err = $org_err = $eve_err = $ven_err = $part_err = $sd_err = $ed_err = $st_err = $et_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
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

                        $input_org = trim($_POST["org"]);
                        if(empty($input_org)){
                            $org_err = "Please enter a name.";
                        } elseif(!filter_var($input_org, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                            $org_err = "Please enter a valid name.";
                        } else{
                            $org = $input_org;
                        }

                        $input_eve = trim($_POST["eve"]);
                        if(empty($input_eve)){
                            $eve_err = "Please enter a name.";
                        } elseif(!filter_var($input_eve, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                            $eve_err = "Please enter a valid name.";
                        } else{
                            $eve = $input_eve;
                        }

                        $input_ven = trim($_POST["ven"]);
                        if(empty($input_ven)){
                            $ven_err = "Please enter a name.";
                        } else{
                            $ven = $input_ven;
                        }
                        $input_part = trim($_POST["part"]);
                        if(empty($input_part)){
                            $part_err = "Please enter a name.";
                        } else{
                            $part = $input_part;
                        }
                        $input_sd = trim($_POST["sd"]);
                        if(empty($input_sd)){
                            $sd_err = "Please enter a name.";
                        } else{
                            $sd = $input_sd;
                        }
                        $input_ed = trim($_POST["ed"]);
                        if(empty($input_ed)){
                            $ed_err = "Please enter a name.";
                        } else{
                            $ed = $input_ed;
                        }
                        $input_st = trim($_POST["st"]);
                        if(empty($input_st)){
                            $st_err = "Please enter a name.";
                        } else{
                            $st = $input_st;
                        }
                        $input_et = trim($_POST["et"]);
                        if(empty($input_et)){
                            $et_err = "Please enter a name.";
                        } else{
                            $et = $input_et;
                        }

                        
                        
                        // Check input errors before inserting in database
                        if(empty($firstName_err) && empty($lastName_err) && empty($org_err) && empty($eve_err) && empty($ven_err) && empty($part_err) && empty($sd_err) && empty($ed_err) && empty($st_err) && empty($et_err)){
                            // Prepare an insert statement
                            $sql = "INSERT INTO events (firstName, lastName, eventOrg, actEve, actVenue, numPart, startDate, endDate, startTime, endTime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                             
                            if($stmt = mysqli_prepare($link, $sql)){
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "ssssssssss", $param_fname, $param_lName, $param_org, $param_eve, $param_ven, $param_part, $param_sd, $param_ed, $param_st, $param_et);
                                
                                // Set parameters
                                $param_fname = $firstName;
                                $param_lName = $lastName;
                                $param_org = $org;
                                $param_eve = $eve;
                                $param_ven = $ven;
                                $param_part = $part;
                                $param_sd = $sd;
                                $param_ed = $ed;
                                $param_st = $st;
                                $param_et = $et;
                                
                                // Attempt to execute the prepared statement
                                if(mysqli_stmt_execute($stmt)){
                                    // Records created successfully. Redirect to landing page
                                    header("location:../events.php");
                                    exit();
                                } else{
                                    echo "Something went wrong. Please try again later.";
                                }
                    // Close statement
                            mysqli_stmt_close($stmt);
                            }else {
                        echo "Something's wrong with the query: " . mysqli_error($link);
                    }
                             
                            
                        }
                        
                        // Close connection
                        mysqli_close($link);
                    }
                    ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Event</h2>
                    </div>
                    <p>Please fill this form.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>">
                            <span class="help-block"><?php echo $firstName_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="lastName" class="form-control" value="<?php echo $lastName; ?>">
                            <span class="help-block"><?php echo $lastName_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($org_err)) ? 'has-error' : ''; ?>">
                            <label>Organization</label>
                            <input type="text" name="org" class="form-control" value="<?php echo $org; ?>">
                            <span class="help-block"><?php echo $org_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($eve_err)) ? 'has-error' : ''; ?>">
                            <label>Event</label>
                            <input type="text" name="eve" class="form-control" value="<?php echo $eve; ?>">
                            <span class="help-block"><?php echo $eve_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ven_err)) ? 'has-error' : ''; ?>">
                            <label>Venue</label>
                            <input type="text" name="ven" class="form-control" value="<?php echo $ven; ?>">
                            <span class="help-block"><?php echo $ven_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_err)) ? 'has-error' : ''; ?>">
                            <label>Number of Participants</label>
                            <input type="number" name="part" class="form-control" value="<?php echo $part; ?>">
                            <span class="help-block"><?php echo $part_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($st_err)) ? 'has-error' : ''; ?>">
                            <label>Start Date</label>
                            <input type="date" name="sd" class="form-control" value="<?php echo $sd; ?>">
                            <span class="help-block"><?php echo $sd_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ed_err)) ? 'has-error' : ''; ?>">
                            <label>End Date</label>
                            <input type="date" name="ed" class="form-control" value="<?php echo $ed; ?>">
                            <span class="help-block"><?php echo $ed_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($st_err)) ? 'has-error' : ''; ?>">
                            <label>Start Time</label>
                            <input type="time" name="st" class="form-control" value="<?php echo $st; ?>">
                            <span class="help-block"><?php echo $st_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($et_err)) ? 'has-error' : ''; ?>">
                            <label>End Time</label>
                            <input type="time" name="et" class="form-control" value="<?php echo $et; ?>">
                            <span class="help-block"><?php echo $et_err;?></span>
                        </div>
                        
                        
                        <div class="modal-footer">
                              <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../events.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>