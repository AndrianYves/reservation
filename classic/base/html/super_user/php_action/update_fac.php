<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$firstName = $lastName = $org = $position = $type = $email = $pass = "";
$firstName_err = $lastName_err = $org_err = $position_err =$type_err= $email_err = $pass_err = "";

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
$input_org = trim($_POST["org"]);
if(empty($input_org)){
$org_err = "Please enter a name.";
} elseif(!filter_var($input_org, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
$org_err = "Please enter a valid name.";
} else{
$org = $input_org;
}
$input_position = trim($_POST["position"]);
if(empty($input_position)){
$position_err = "Please enter a name.";
} elseif(!filter_var($input_position, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
$position_err = "Please enter a valid name.";
} else{
$position = $input_position;
}
$input_type = trim($_POST["type"]);
if(empty($input_type)){
$type_err = "Please enter a name.";
} else{
$type = $input_type;
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
$sql = "UPDATE users SET firstName=?, lastName=?, orgs=?, pos=?, user_type=?, facEmail=?, facPass=? WHERE userID=?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "sssssss", $param_fname, $param_lName, $param_org, $param_pos, $param_type, $param_email, $param_pass);

// Set parameters
$param_fname = $firstName;
$param_lName = $lastName;
$param_org = $org;
$param_pos = $position;
$param_type = $type;
$param_email = $email;
$param_pass = $pass;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Records updated successfully. Redirect to landing page
header("location: ../faculty_account.php");
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
if(isset($_GET["userID"]) && !empty(trim($_GET["userID"]))){
// Get URL parameter
$userID =  trim($_GET["userID"]);

// Prepare a select statement
$sql = "SELECT * FROM account_fac WHERE userID = ?";
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
$type = $row["user_type"];
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
                            <div class="form-group <?php echo (!empty($org_err)) ? 'has-error' : ''; ?>">
                                <label>Organization</label>
                                <input type="text" name="org" class="form-control" value="<?php echo $org; ?>">
                                <span class="help-block"><?php echo $org_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($position_err)) ? 'has-error' : ''; ?>">
                                <label>Position</label>
                                <input type="text" name="position" class="form-control" value="<?php echo $position; ?>">
                                <span class="help-block"><?php echo $position_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($type_err)) ? 'has-error' : ''; ?>">
                                <label>User Type</label>
                                <input type="text" name="type" class="form-control" value="<?php echo $type; ?>">
                                <span class="help-block"><?php echo $type;?></span>
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
                            
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <a href="index.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>