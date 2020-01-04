
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>Amphitheater | Guest User</title>
    
    <link rel="apple-touch-icon" href="../../../assets2/images/samcis.png">
    <link rel="shortcut icon" href="../../../assets2/images/samcis.png">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../../../global/global2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../global/global2/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../../../assets2/css/site.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../global/css/style.css">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="../../../../global/global2/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../../../../global/global2/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="../../../../global/global2/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="../../../../global/global2/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="../../../../global/global2/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="../../../../global/global2/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="../../../../global/global2/vendor/waves/waves.css">
        <link rel="stylesheet" href="../../../../global/global2/vendor/chartist/chartist.css">
        <link rel="stylesheet" href="../../../../global/global2/vendor/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="../../../../global/global2/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
        <link rel="stylesheet" href="../../../assets2/examples/css/dashboard/v1.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="../../../../global/global2/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="../../../../global/global2/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <link rel="stylesheet" href="../../../../global/global2/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../../../../global/global2/fonts/brand-icons/brand-icons.min.css">
    <link rel="stylesheet" href="../../../../global/global2/fonts/7-stroke/7-stroke.css">
    <link rel="stylesheet" href="../../../../global/global2/fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="../../../../global/global2/fonts/mfglabs/mfglabs.css">
    <link rel="stylesheet" href="../../../../global/global2/fonts/open-iconic/open-iconic.css">
    <link rel="stylesheet" href="../../../../global/global2/fonts/ionicons/ionicons.css">
    
    <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="../../../../global/global2/vendor/breakpoints/breakpoints.js"></script>
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
          <i class="icon md-more" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo" src="../../../assets2/images/samcis.png" title="Remark">
          <span class="navbar-brand-text hidden-xs-down"> Guest User</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
          data-toggle="collapse">
          <span class="sr-only">Toggle Search</span>
          <i class="icon md-search" aria-hidden="true"></i>
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
              <a class="nav-link icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
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
                  <img src="../../../../global/global2/portraits/5.jpg" alt="...">
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
            echo 'window.location.href = "../../../../../index.php";';
            echo '</script>';
          }
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon md-notifications" aria-hidden="true"></i>
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
                            <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">A new order has been placed</h6>
                            <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">5 hours ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon md-account bg-green-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Completed the task</h6>
                            <time class="media-meta" datetime="2017-06-11T18:29:20+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon md-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Settings updated</h6>
                            <time class="media-meta" datetime="2017-06-11T14:05:00+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon md-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Event started</h6>
                            <time class="media-meta" datetime="2017-06-10T13:50:18+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon md-comment bg-orange-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Message received</h6>
                            <time class="media-meta" datetime="2017-06-10T12:34:48+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu-footer">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon md-settings" aria-hidden="true"></i>
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
                <i class="input-search-icon md-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav>    
    <div class="site-menubar">
      <div class="site-menubar-body">
        <div>
          <div>
            <ul class="site-menu" data-plugin="menu">
              <li class="site-menu-category">General</li>
              <li class="site-menu-item has-sub">
                <a href="../guest_user.php">
                        <i class="site-menu-icon icon wb-home" aria-hidden="true"></i>
                        <span class="site-menu-title">Home</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="../calendar.php">
                        <i class="site-menu-icon icon wb-home" aria-hidden="true"></i>
                        <span class="site-menu-title">Calendar</span>
                </a>
              </li>
              <li class="site-menu-category">Facilities</li>
              <li class="site-menu-item has-sub">
                <a href="plaza.php">
                        <i class="site-menu-icon icon md-store" aria-hidden="true"></i>
                        <span class="site-menu-title">Devesse Plaza</span>
                </a>
              </li>
              <li class="site-menu-item has-sub active">
                <a href="amphi.php">
                        <i class="site-menu-icon icon md-balance" aria-hidden="true"></i>
                        <span class="site-menu-title">Amphitheater</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="avr.php">
                        <i class="site-menu-icon icon ml-display-screen" aria-hidden="true"></i>
                        <span class="site-menu-title">AVR</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="pool.php">
                        <i class="site-menu-icon icon io-droplet" aria-hidden="true"></i>
                        <span class="site-menu-title">Swimming Pool</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="oval.php">
                        <i class="site-menu-icon icon md-flag" aria-hidden="true"></i>
                        <span class="site-menu-title">Oval</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="v_court.php">
                        <i class="site-menu-icon icon pe-ball" aria-hidden="true"></i>
                        <span class="site-menu-title">Volleyball Court</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="b_court.php">
                        <i class="site-menu-icon icon ion-ios-basketball" aria-hidden="true"></i>
                        <span class="site-menu-title">Basketball Court</span>
                </a>
              </li>
              <li class="site-menu-category">Reservation</li>
              <li class="site-menu-item has-sub">
                <a href="request.php">
                        <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                        <span class="site-menu-title">Request</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    
      </div>
    </div>
<?php
                    // Include config file
                    require_once "config.php";
                     
                    // Define variables and initialize with empty values
                    $firstName = $lastName = $mobNum = $org = $pos = $adviser = $eveName = $numPart = $startDate = $endDate = $startTime =$endTime = $equip = "";
                    //$name_err = $address_err = $salary_err = "";
                    $firstName_err = $lastName_err = $mobNum_err = $org_err = $pos_err = $adviser_err = $eveName_err = $numPart_err = $startDate_err = $endDate_err = $startTime_err = $endTime_err = $equip_err = "";
                     
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

                        $input_equip= trim($_POST["equip"]);
                        if(empty($input_equip)){
                            $equip_err = "Please enter a name.";
                        } else{
                            $equip = $input_equip;
                        }


                        
                        // if (mysqli_num_rows) {
                          # code...
                        // }
                        // Check input errors before inserting in database
                        if(empty($firstName_err) && empty($lastName_err) && empty($mobNum_err) && empty($org_err) && empty($pos_err) && empty($adviser_err) && empty($eveName_err) && empty($numPart_err) && empty($startDate_err) && empty($endDate_err) && empty($startTime_err) && empty($endTime_err) && empty($equip_err)){
                            // Prepare an insert statement
                            $sql = "INSERT INTO request_su (firstName, lastName, mobNum, org, pos, adviser, eveName, numPart, startDate, endDate, startTime, endTime, equipments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                             
                            if($stmt = mysqli_prepare($link, $sql)){
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_fname, $param_lName, $param_mobNum, $param_org, $param_pos, $param_adviser, $param_eveName, $param_numPart, $param_startDate, $param_endDate, $param_startTime, $param_endTime, $param_equip);
                                
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
                                $param_equip = $equip;
                                
                                // Attempt to execute the prepared statement
                                if(mysqli_stmt_execute($stmt)){
                                    // Records created successfully. Redirect to landing page
                                    echo '<script type="text/javascript">'; 
                                    echo 'alert("Reservation is now Pending. Thank You!");'; 
                                    echo 'window.location.href = "plaza.php";';
                                    echo '</script>';
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


    <!-- Page -->
    <div class="page">
      <div class="page-content container-fluid">
        <div data-plugin="matchHeight" data-by-row="true">
         <div class="page-header clearfix">
                        <a class="btn btn-success pull-right" data-toggle="modal" data-target="#basicModal">Add Reservation</a>
                    </div>

                    <!-- add modal  -->
                    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Add Reservation</h4>
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
                                                <div class="form-group <?php echo (!empty($mobNum_err)) ? 'has-error' : ''; ?>">
                                                  <label>Mobile Number</label>
                                                  <input type="text" name="mobNum" class="form-control" value="<?php echo $mobNum; ?>">
                                                  <span class="help-block"><?php echo $mobNum_err;?></span>
                                                </div>

                                                <div class="form-group <?php echo (!empty($org_err)) ? 'has-error' : ''; ?>">
                                                  <label>Organization</label>
                                                  <input type="text" name="org" class="form-control" value="<?php echo $org; ?>">
                                                  <span class="help-block"><?php echo $org_err;?></span>
                                                </div>

                                                <div class="form-group <?php echo (!empty($pos_err)) ? 'has-error' : ''; ?>">
                                                  <label>Position</label>
                                                  <input type="text" name="pos" class="form-control" value="<?php echo $pos; ?>">
                                                  <span class="help-block"><?php echo $pos_err;?></span>
                                                </div>

                                                <div class="form-group <?php echo (!empty($adviser_err)) ? 'has-error' : ''; ?>">
                                                  <label>Adviser</label>
                                                  <input type="text" name="adviser" class="form-control" value="<?php echo $adviser; ?>">
                                                  <span class="help-block"><?php echo $adviser_err;?></span>
                                                </div>

                                                <div class="form-group <?php echo (!empty($eveName_err)) ? 'has-error' : ''; ?>">
                                                  <label>Event Name</label>
                                                  <input type="text" name="eveName" class="form-control" value="<?php echo $eveName; ?>">
                                                  <span class="help-block"><?php echo $eveName_err;?></span>
                                                </div>

                                                <div class="form-group <?php echo (!empty($numPart_err)) ? 'has-error' : ''; ?>">
                                                  <label>Number of Participants</label>
                                                  <input type="text" name="numPart" class="form-control" value="<?php echo $numPart; ?>">
                                                  <span class="help-block"><?php echo $numPart_err;?></span>
                                                </div>

                                                <div class="form-group <?php echo (!empty($startDate_err)) ? 'has-error' : ''; ?>">
                                                  <label>Start Date</label>
                                                  <input type="date" name="startDate" class="form-control" value="<?php echo $startDate; ?>">
                                                  <span class="help-block"><?php echo $startDate_err;?></span>
                                                </div>
                                                <div class="form-group <?php echo (!empty($endDate_err)) ? 'has-error' : ''; ?>">
                                                  <label>End Date</label>
                                                  <input type="date" name="endDate" class="form-control" value="<?php echo $endDate; ?>">
                                                  <span class="help-block"><?php echo $endDate_err;?></span>
                                                </div>
                                                <div class="form-group <?php echo (!empty($startTime_err)) ? 'has-error' : ''; ?>">
                                                  <label>Start Time</label>
                                                  <input type="time" name="startTime" class="form-control" value="<?php echo $startTime; ?>">
                                                  <span class="help-block"><?php echo $startTime_err;?></span>
                                                </div>

                                                <div class="form-group <?php echo (!empty($endTime_err)) ? 'has-error' : ''; ?>">
                                                  <label>End Time</label>
                                                  <input type="time" name="endTime" class="form-control" value="<?php echo $endTime; ?>">
                                                  <span class="help-block"><?php echo $endTime_err;?></span>
                                                  <div class="modal-footer">
                                                </div>
                                                <div class="form-group <?php echo (!empty($equip_err)) ? 'has-error' : ''; ?>">
                                                  <label>List of Equipments</label>
                                                  <input type="text" name="equip" class="form-control" value="<?php echo $equip; ?>"placeholder="e.g. 100 chairs, 100 tables, ...">
                                                  <span class="help-block"><?php echo $equip_err;?></span>
                                                  <div class="modal-footer">
                                                </div>
                                                <div class="modal-footer">
                                               <input type="submit" class="btn btn-primary" value="Submit">
                                                <a href="plaza.php" class="btn btn-default">Cancel</a>
                                                </div>
                                                </form>
                            </div> <!--Modal Body-->

                            
                          </div>
                        </div>
                      </div>

                
                        </div>
                      </div>
                    </div>

                      <tbody>
                        <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM request_su";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                          echo "<h4>Events</h4>";
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";

                                       echo "<th>Event Name</th>";
                                       echo "<th>Date Start</th>";
                                       echo "<th>Date End</th>";
                                       echo "<th>Time Start</th>";
                                       echo "<th>Time End</th>";
                                       echo "<th>Organization</th>";
                                       echo "<th>Position</th>";
                                        echo"<th>No. of Participants</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";

                                        echo "<td>" . $row['eveName'] . "</td>";
                                        echo "<td>" . $row['startDate'] . "</td>";
                                        echo "<td>" . $row['endDate'] . "</td>";
                                        echo "<td>" . $row['startTime'] . "</td>";
                                        echo "<td>" . $row['endTime'] . "</td>";
                                        echo "<td>" . $row['org'] . "</td>";
                                        echo "<td>" . $row['pos'] . "</td>";
                                        echo "<td>" . $row['numPart'] . "</td>";

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
                      </tbody>

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
    <script src="../../../../global/global2/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="../../../../global/global2/vendor/jquery/jquery.js"></script>
    <script src="../../../../global/global2/vendor/popper-js/umd/popper.min.js"></script>
    <script src="../../../../global/global2/vendor/bootstrap/bootstrap.js"></script>
    <script src="../../../../global/global2/vendor/animsition/animsition.js"></script>
    <script src="../../../../global/global2/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="../../../../global/global2/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="../../../../global/global2/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="../../../../global/global2/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    <script src="../../../../global/global2/vendor/waves/waves.js"></script>
    
    <!-- Plugins -->
    <script src="../../../../global/global2/vendor/switchery/switchery.js"></script>
    <script src="../../../../global/global2/vendor/intro-js/intro.js"></script>
    <script src="../../../../global/global2/vendor/screenfull/screenfull.js"></script>
    <script src="../../../../global/global2/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="../../../../global/global2/vendor/chartist/chartist.min.js"></script>
        <script src="../../../../global/global2/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>
        <script src="../../../../global/global2/vendor/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="../../../../global/global2/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../../../../global/global2/vendor/matchheight/jquery.matchHeight-min.js"></script>
        <script src="../../../../global/global2/vendor/peity/jquery.peity.min.js"></script>
    
    <!-- Scripts -->
    <script src="../../../../global/global2/js/Component.js"></script>
    <script src="../../../../global/global2/js/Plugin.js"></script>
    <script src="../../../../global/global2/js/Base.js"></script>
    <script src="../../../../global/global2/js/Config.js"></script>
    
    <script src="../../../assets2/js/Section/Menubar.js"></script>
    <script src="../../../assets2/js/Section/GridMenu.js"></script>
    <script src="../../../assets2/js/Section/Sidebar.js"></script>
    <script src="../../../assets2/js/Section/PageAside.js"></script>
    <script src="../../../assets2js/Plugin/menu.js"></script>
    
    <script src="../../../../global/global2/js/config/colors.js"></script>
    <script src="../../../assets2/js/config/tour.js"></script>
    <script>Config.set('assets', '../assets');</script>
    
    <!-- Page -->
    <script src="../../../assets2/js/Site.js"></script>
    <script src="../../../../global/global2/js/Plugin/asscrollable.js"></script>
    <script src="../../../../global/global2/js/Plugin/slidepanel.js"></script>
    <script src="../../../../global/global2/js/Plugin/switchery.js"></script>
        <script src="../../../../global/global2/js/Plugin/matchheight.js"></script>
        <script src="../../../../global/global2/js/Plugin/jvectormap.js"></script>
        <script src="../../../../global/global2/js/Plugin/peity.js"></script>
    
        <script src="../../../assets2/examples/js/dashboard/v1.js"></script>
    
  </body>
</html>
