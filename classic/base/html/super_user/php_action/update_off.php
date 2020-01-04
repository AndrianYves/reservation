<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$firstName = $lastName = $dept = $email = $pass = "";
//$name_err = $address_err = $salary_err = "";
$firstName_err = $lastName_err = $dept_err = $email_err = $pass_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["officeID"]) && !empty($_POST["officeID"])){
    // Get hidden input value
    $officeID = $_POST["officeID"];
    
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

    $input_dept = trim($_POST["dept"]);
    if(empty($input_dept)){
        $dept_err = "Please enter a name.";
    } elseif(!filter_var($input_dept, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $dept_err = "Please enter a valid name.";
    } else{
        $dept = $input_dept;
    }

    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter a name.";
    } else{
        $email = $input_email;
    }
    $input_password = trim($_POST["pass"]);
    if(empty($input_password)){
        $pass_err = "Please enter a name.";
    } else{
        $pass = $input_password;
    }
    
    // Check input errors before inserting in database
    if(empty($firstName_err) && empty($lastName_err) && empty($dept_err) && empty($email_err) && empty($pass_err)){
        // Prepare an update statement
        $sql = "UPDATE account_office SET firstName=?, lastName=?, depOfc=?, email=?, password=? WHERE officeID=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_fname, $param_lName, $param_dept, $param_email, $param_pass, $param_officeID);
            
            // Set parameters
            $param_fname = $firstName;
            $param_lName = $lastName;
            $param_dept = $dept;
            $param_email = $email;
            $param_pass = $pass;
            $param_officeID = $officeID;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../office_account.php");
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
    if(isset($_GET["officeID"]) && !empty(trim($_GET["officeID"]))){
        // Get URL parameter
        $officeID =  trim($_GET["officeID"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM account_office WHERE officeID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_officeID);
            
            // Set parameters
            $param_officeID = $officeID;
            
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
                $dept = $row["depOfc"];
                $email = $row["email"];
                $pass = $row["password"];
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
                        <div class="form-group <?php echo (!empty($dept_err)) ? 'has-error' : ''; ?>">
                            <label>Department</label>
                            <input type="text" name="dept" class="form-control" value="<?php echo $dept; ?>">
                            <span class="help-block"><?php echo $dept_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email (SLU email)</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="text" name="pass" class="form-control" value="<?php echo $pass; ?>">
                            <span class="help-block"><?php echo $pass_err;?></span>
                        </div>
                        <input type="hidden" name="officeID" value="<?php echo $officeID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../office_account.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>