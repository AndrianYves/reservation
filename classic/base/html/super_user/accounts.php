<?php  
    session_start();
    include("functions.php");
    if($_SESSION['login'] !==true){
      header('location:../../../../index.php');
    }
?>
<?php
  include('DBConnector.php');
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    
    <title>Accounts | Super User</title>
    
    <link rel="apple-touch-icon" href="../../assets/images/samcis.png">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">
    
    <!-- Stylesheets -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../../../global/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../../assets/css/site.min.css">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="../../../global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../../../global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="../../../global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="../../../global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="../../../global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="../../../global/vendor/flag-icon-css/flag-icon.css">
    
    <link rel="stylesheet" href="../../../global/vendor/footable/footable.core.css">
    <link rel="stylesheet" href="../../assets/examples/css/tables/footable.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="../../../global/fonts/7-stroke/7-stroke.css">
    <link rel="stylesheet" href="../../../global/fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="../../../global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../../../global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!-- Fonts -->
    <link rel="stylesheet" href="../../../global/fonts/7-stroke/7-stroke.css">
    <link rel="stylesheet" href="../../../global/fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="../../../global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../../../global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="../../../global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center">
          <img class="navbar-brand-logo" src="../../assets/images/samcis.png" title="Remark">
          <span class="navbar-brand-text hidden-xs-down">Super User</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
          data-toggle="collapse">
          <span class="sr-only">Toggle Search</span>
          <i class="icon wb-search" aria-hidden="true"></i>
        </button>
      </div>
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
            <li class="nav-item hidden-float">
              <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                role="button">
                <span class="sr-only">Toggle Search</span>
              </a>
            </li>
          </ul>
          <!-- End Navbar Toolbar -->
    
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="../../../global/portraits/admin.jpg" alt="...">
                  <i></i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">

              <form method="post" class="dropdown-item">
            <button name="logout" class='btn btn-danger my-2'>Logout</button>
          </form>
          <?php
          if(isset($_POST['logout'])) {
            session_destroy();
            echo '<script type="text/javascript">';
            echo 'alert("You have been succesfully logout");';
            echo 'window.location.href = "../../../../index.php";';
            echo '</script>';
          }
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon wb-bell" aria-hidden="true"></i>
                <span class="badge badge-pill badge-danger up">5</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <div class="dropdown-menu-header">
                  <h5>NOTIFICATIONS</h5>
                  <span class="badge badge-round badge-danger">New 5</span>
                </div>
    
                <div class="list-group">
                  <div data-role="container">
                    <div data-role="content">
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">A new order has been placed</h6>
                            <time class="media-meta" datetime="2018-06-12T20:50:48+08:00">5 hours ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Completed the task</h6>
                            <time class="media-meta" datetime="2018-06-11T18:29:20+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Settings updated</h6>
                            <time class="media-meta" datetime="2018-06-11T14:05:00+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Event started</h6>
                            <time class="media-meta" datetime="2018-06-10T13:50:18+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Message received</h6>
                            <time class="media-meta" datetime="2018-06-10T12:34:48+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu-footer">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    All notifications
                  </a>
                </div>
              </div>
            </li>
            
            
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <div class="input-search">
                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav>    <div class="site-menubar">
      <div class="site-menubar-body">
        <div>
          <div>
            <ul class="site-menu" data-plugin="menu">
              <li class="site-menu-category">General</li>
              <li class="site-menu-item has-sub">
                <a href="super_user.php">
                        <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                        <span class="site-menu-title">Dashboard</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="calendar.php">
                        <i class="site-menu-icon wb-calendar" aria-hidden="true"></i>
                        <span class="site-menu-title">Calendar</span>
                </a>
              </li>
              <li class="site-menu-category">Controls</li>
              <li class="site-menu-item has-sub active">
                <a href="accounts.php">
                        <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                        <span class="site-menu-title">Accounts</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="facilities.php">
                        <i class="site-menu-icon wb-briefcase" aria-hidden="true"></i>
                        <span class="site-menu-title">Facilities</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="equipments.php">
                        <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                        <span class="site-menu-title">Equipments</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="reservation.php">
                        <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                        <span class="site-menu-title">Reservation</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="events.php">
                        <i class="site-menu-icon wb-clipboard" aria-hidden="true"></i>
                        <span class="site-menu-title">Events</span>
                </a>
              </li>
          </div>
        </div>
      </div>
    </div>    

    <!-- Page -->
    <div class="page">
      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          <?php
                    // Include config file
                    require_once "config.php";
                     
                    // Define variables and initialize with empty values
                    $firstName = $lastName = $orgs = $pos = $utype = $email = $pass = "";
                    //$name_err = $address_err = $salary_err = "";
                    $firstName_err = $lastName_err = $orgs_err = $pos_err =$utype_err= $email_err = $pass_err = "";
                     
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

                        $input_utype = trim($_POST["utype"]);
                        if(empty($input_utype)){
                            $utype_err = "Please enter a name.";
                        } else{
                            $utype = $input_utype;
                        }

                        $input_email = trim($_POST["email"]);
                        if(empty($input_email)){
                            $email_err = "Please enter a name.";
                        } else{
                            $email = $input_email;
                        }

                        $input_pass = trim($_POST["pass"]);
                        if(empty($input_pass)){
                            $pass_err = "Please enter a name.";
                        } else{
                            $pass = $input_pass;
                        }

                        
                        
                        // Check input errors before inserting in database
                        if(empty($firstName_err) && empty($lastName_err) && empty($orgs_err) && empty($pos_err) && empty($utype_err) &&empty($email_err) && empty($pass_err)){
                            // Prepare an insert statement
                          $sql1 = mysqli_query($conn, "SELECT * FROM semesterdate");
                          $date = mysqli_fetch_assoc($sql1);
                          $dateend = $date['semesterend'];

                            $sql = "INSERT INTO users (firstName, lastName, orgs, pos, email, user_type, password, status, endofsem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                             
                            if($stmt = mysqli_prepare($link, $sql)){
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "sssssssss", $param_fname, $param_lName, $param_orgs, $param_pos, $param_email, $param_utype, $param_pass, $param_status, $param_date);
                                
                                // Set parameters
                                $param_fname = $firstName;
                                $param_lName = $lastName;
                                $param_orgs = $orgs;
                                $param_pos = $pos;
                                $param_utype = $utype;
                                $param_email = $email;
                                $param_pass = $pass;
                                $param_status = 'Active';
                                $param_date = $dateend;
                                
                                // Attempt to execute the prepared statement
                                if(mysqli_stmt_execute($stmt)){
                                    // Records created successfully. Redirect to landing page
                                    echo '<script type="text/javascript">'; 
                                    echo 'alert("Account Registered. Thank You!");'; 
                                    echo 'window.location.href = "accounts.php";';
                                    echo '</script>';
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
          
                  
                    <div class="page-header clearfix">
                        <a class="btn btn-success pull-right" data-toggle="modal" data-target="#basicModal">Add Account</a>
                        <a class="btn btn-info pull-right" data-toggle="modal" data-target="#semester">Set Semester Date</a>
                    </div>

                    <!-- add modal  -->
                    <div class="modal fade" id="semester" tabindex="-1" role="dialog" aria-labelledby="semester" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Change Semester Date</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>

                            <div class="modal-body">
                              <form action="setsemesterdate.php" method="post">
                                <?php
                                  $sql2 = mysqli_query($conn, "SELECT * FROM semesterdate");
                                  $row = mysqli_fetch_assoc($sql2);
                                  $dateend = $row['semesterend'];
                                  $datestart = $row['semesterstart'];
                                ?>
                        <div class="form-group">
                            <label>Date Start</label>
                            <input type="date" name="datestart" class="form-control" value="<?php echo $datestart; ?>">
                        </div>
                        <div class="form-group">
                            <label>Date End</label>
                            <input type="date" name="dateend" class="form-control" value="<?php echo $dateend; ?>">
                        </div>
                      
                        
                        <div class="modal-footer">
                              <input type="submit" class="btn btn-primary" name="setdate">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                            </div>

                            
                          </div>
                        </div>
                      </div>

                    <!-- add modal  -->
                    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Add Student</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>

                            <div class="modal-body">
                              
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
                            <label>Email (SLU email)</label>
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
                        
                        <div class="modal-footer">
                              <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                            </div>

                            
                          </div>
                        </div>
                      </div>

                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM users";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID Number</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Organization</th>";
                                        echo "<th>Position</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>User Type</th>";
                                        echo "<th>Password</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['userID'] . "</td>";
                                        echo "<td>" . $row['firstName'] . "</td>";
                                        echo "<td>" . $row['lastName'] . "</td>";
                                        echo "<td>" . $row['orgs'] . "</td>";
                                        echo "<td>" . $row['pos'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['user_type'] . "</td>";
                                        echo "<td>*****</td>";
                                        echo "<td>" . $row['status'] . "</td>";   
                                        
                                    
                                        echo "<td>";
                                            echo "<a href='php_action/read_acc.php?userID=". $row['userID'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='php_action/edit_acc.php?userID=". $row['userID'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='php_action/delete_acc.php?userID=". $row['userID'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>

                    

                    <div class="modal fade" id="basicModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Remove Student</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>

                            <div class="modal-body">
                              <form action="deletestud.php" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="userID" value="<?php echo trim($_GET["userID"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="student_account.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                             
                            </div>
                          </div>
                        </div>
                      </div>

          

          
        </div>
      </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-right">
        © 2019 Facility Reservation System.
      </div>
    </footer>
    <!-- Core  -->
    <script src="../../../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="../../../global/vendor/jquery/jquery.js"></script>
    <script src="../../../global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="../../../global/vendor/bootstrap/bootstrap.js"></script>
    <script src="../../../global/vendor/animsition/animsition.js"></script>
    <script src="../../../global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="../../../global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="../../../global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="../../../global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    
    <!-- Plugins -->
    <script src="../../../global/vendor/switchery/switchery.js"></script>
    <script src="../../../global/vendor/intro-js/intro.js"></script>
    <script src="../../../global/vendor/screenfull/screenfull.js"></script>
    <script src="../../../global/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="../../../global/vendor/datatables.net/jquery.dataTables.js"></script>
        <script src="../../../global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="../../../global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
        <script src="../../../global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
        <script src="../../../global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
        <script src="../../../global/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
        <script src="../../../global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
        <script src="../../../global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
        <script src="../../../global/vendor/datatables.net-buttons/dataTables.buttons.js"></script>
        <script src="../../../global/vendor/datatables.net-buttons/buttons.html5.js"></script>
        <script src="../../../global/vendor/datatables.net-buttons/buttons.flash.js"></script>
        <script src="../../../global/vendor/datatables.net-buttons/buttons.print.js"></script>
        <script src="../../../global/vendor/datatables.net-buttons/buttons.colVis.js"></script>
        <script src="../../../global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js"></script>
        <script src="../../../global/vendor/asrange/jquery-asRange.min.js"></script>
        <script src="../../../global/vendor/bootbox/bootbox.js"></script>
    
    <!-- Scripts -->
    <script src="../../../global/js/Component.js"></script>
    <script src="../../../global/js/Plugin.js"></script>
    <script src="../../../global/js/Base.js"></script>
    <script src="../../../global/js/Config.js"></script>
    
    <script src="../../assets/js/Section/Menubar.js"></script>
    <script src="../../assets/js/Section/GridMenu.js"></script>
    <script src="../../assets/js/Section/Sidebar.js"></script>
    <script src="../../assets/js/Section/PageAside.js"></script>
    <script src="../../assets/js/Plugin/menu.js"></script>
    
    <script src="../../../global/js/config/colors.js"></script>
    <script src="../../assets/js/config/tour.js"></script>
    <script>Config.set('assets', '../../assets');</script>
    
    <!-- Page -->
    <script src="../../assets/js/Site.js"></script>
    <script src="../../../global/js/Plugin/asscrollable.js"></script>
    <script src="../../../global/js/Plugin/slidepanel.js"></script>
    <script src="../../../global/js/Plugin/switchery.js"></script>
        <script src="../../../global/js/Plugin/datatables.js"></script>
        
        <script src="../../assets/examples/js/tables/datatable.js"></script>
  </body>
</html>
