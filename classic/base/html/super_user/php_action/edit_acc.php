<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$firstName = $lastName = $orgs = $pos = $utype = $email = $pass = $stat ="";
//$name_err = $address_err = $salary_err = "";
$firstName_err = $lastName_err = $orgs_err = $pos_err = $utype_err = $email_err = $pass_err = $stat_err="";
 
// Processing form data when form is submitted
if(isset($_POST["userID"]) && !empty($_POST["userID"])){
    // Get hidden input value
    $userID = $_POST["userID"];
    
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

    $input_orgs = trim($_POST["orgs"]);
    if(empty($input_orgs)){
        $orgs_err = "Please enter a name.";
    } elseif(!filter_var($input_orgs, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $orgs_err = "Please enter a valid name.";
    } else{
        $orgs = $input_orgs;
    }

    $input_pos = trim($_POST["pos"]);
    if(empty($input_pos)){
        $pos_err = "Please enter a name.";
    } elseif(!filter_var($input_pos, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $pos_err = "Please enter a valid name.";
    } else{
        $pos = $input_pos;
    }

    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter a name.";
    } else{
        $email = $input_email;
    }
    $input_utype = trim($_POST["utype"]);
    if(empty($input_utype)){
        $utype_err = "Please enter a name.";
    } else{
        $utype = $input_utype;
    }
    $input_pass = trim($_POST["pass"]);
    if(empty($input_pass)){
        $pass_err = "Please enter a name.";
    } else{
        $pass = $input_pass;
    }
    $input_stat = trim($_POST["stat"]);
    if(empty($input_stat)){
        $stat_err = "Please enter a name.";
    } elseif(!filter_var($input_stat, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $stat_err = "Please enter a valid name.";
    } else{
        $stat = $input_stat;
    }
    
    // Check input errors before inserting in database
    if(empty($firstName_err) && empty($lastName_err) && empty($orgs_err) && empty($pos_err) && empty($email_err) && empty($utype_err) &&empty($pass_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET firstName=?, lastName=?, orgs=?, pos=?, email=?, user_type=?, password=?, status=? WHERE userID=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssi", $param_fname, $param_lName, $param_orgs, $param_pos, $param_email, $param_utype, $param_pass, $param_stat, $param_userID);
            
            // Set parameters
            $param_fname = $firstName;
            $param_lName = $lastName;
            $param_orgs = $orgs;
            $param_pos = $pos;
            $param_email = $email;
            $param_utype = $utype;
            $param_pass = $pass;
            $param_stat = $stat;
            $param_userID = $userID;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../accounts.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.". mysqli_error($link);
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["userID"]) && !empty(trim($_GET["userID"]))){
        // Get URL parameter
        $userID =  trim($_GET["userID"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE userID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_userID);
            
            // Set parameters
            $param_userID = $userID;
            
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
                $orgs = $row["orgs"];
                $pos = $row["pos"];
                $email = $row["email"];
                $utype = $row["user_type"];
                $pass = $row["password"];
                $stat = $row["status"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    echo "error!";
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
    }
      else{
        // URL doesn't contain id parameter. Redirect to error page
        echo "Oops! Something went wrong. Please try again later.";
        exit();
    }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                        <div class="form-group <?php echo (!empty($orgs_err)) ? 'has-error' : ''; ?>">
                            <label>Organization</label>
                            <input type="text" name="orgs" class="form-control" value="<?php echo $orgs; ?>">
                            <span class="help-block"><?php echo $orgs_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pos_err)) ? 'has-error' : ''; ?>">
                            <label>Position</label>
                            <input type="text" name="pos" class="form-control" value="<?php echo $pos; ?>">
                            <span class="help-block"><?php echo $pos_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($utype_err)) ? 'has-error' : ''; ?>">
                            <label>User Type</label>
                            <input type="text" name="utype" class="form-control" value="<?php echo $utype; ?>">
                            <span class="help-block"><?php echo $utype_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="text" name="pass" class="form-control" value="<?php echo $pass; ?>">
                            <span class="help-block"><?php echo $pass_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($stat_err)) ? 'has-error' : ''; ?>">
                            <label>Status</label>
                            <input type="text" name="stat" class="form-control" value="<?php echo $stat; ?>">
                            <span class="help-block"><?php echo $stat_err;?></span>
                        </div>
                        
                        <div class="modal-footer">
                                <input type="hidden" name="userID" value="<?php echo $userID; ?>"/>
                              <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../accounts.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>