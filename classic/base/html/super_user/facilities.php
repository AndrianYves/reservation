<?php  
    session_start();
    include("functions.php");
    if($_SESSION['login'] !==true){
      header('location:../../../../index.php');
    }
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    
    <title>Facilities | Super User</title>
    
    <link rel="apple-touch-icon" href="../../assets/images/samcis.png">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../../global/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../../assets/css/site.min.css">
    
    
        <link rel="stylesheet" href="../../assets/datatables/datatables.min.css">
    
    
    <!-- Plugins -->
    <link rel="stylesheet" href="../../../global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../../../global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="../../../global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="../../../global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="../../../global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="../../../global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="../../../global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../../global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
    <link rel="stylesheet" href="../../../global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
    <link rel="stylesheet" href="../../../global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
    <link rel="stylesheet" href="../../../global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
    <link rel="stylesheet" href="../../../global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
    <link rel="stylesheet" href="../../../global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
    <link rel="stylesheet" href="../../../global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
    <link rel="stylesheet" href="../../assets/examples/css/tables/datatable.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="../../../../global/fonts/glyphicons/glyphicons.css">
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
               <!--  <a class="dropdown-item" href="../../../../index.php" role="menuitem"><i class="icon wb-power" aria-hidden="true" name="logout"></i> Logout</a>
              </div>
            </li> -->
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
            <li class="site-menu-item has-sub">
                <a href="accounts.php">
                        <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                        <span class="site-menu-title">Accounts</span>
                </a>
            </li>
            <li class="site-menu-item has-sub active">
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
            <!-- <li class="site-menu-category">Accounts</li>
              <li class="site-menu-item has-sub">
                <a href="student_account.php">
                        <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                        <span class="site-menu-title">Student</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="faculty_account.php">
                        <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                        <span class="site-menu-title">Faculty</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="office_account.php">
                        <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                        <span class="site-menu-title">Office</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="visitor_account.php">
                        <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                        <span class="site-menu-title">Visitor</span>
                </a>
              </li> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Page -->
    <!-- <div class="page">
      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12"> -->

    <div class="page">
      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          
        <div class="col-xl-12">
                <!-- Panel Editing Rows --> 
                <div class="panel">
                  <header class="panel-heading">
                    <h3 class="panel-title">Facilities</h3>
                  </header>
                  
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-15">
                          <div class="removeMessages"></div>
                          <button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
                            <span class="icon wb-plus-circle" aria-hidden="true"></span>  Add Facility
                          </button>
                        </div>
                      </div>
                    </div>
                  <br>  
                  <table class="table" id="manageMemberTable">
                    <thead>
                      <tr>
                        <th>Facility ID</th>
                        <th>Level</th>
                        <th>Room</th>
                        <th>Room Type</th>
                        <th>Room Description</th>
                        <th>Room Capacity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
            <!-- add modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> Add Facility</h4>
                  </div>
                  
                  <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">
                    <div Facilitiesv class="modal-body">
                      <div class="messages"></div>
                      <div class="form-group"> <!--/here teh addclass has-error will appear -->
                      <label for="level" class="col-sm-2 control-label">Level</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="level" name="level" placeholder="Level">
                        <!-- here the text will apper  -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="room" class="col-sm-2 control-label">Room</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="room" name="room" placeholder="Room">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="type" class="col-sm-2 control-label">Type</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="type" id="type">
                          <option selected disabled>Select a room type...</option>
                          <option value="Court">Court</option>
                          <option value="Laboratory">Laboratory</option>
                          <option value="Lecture">Lecture</option>
                          <option value="Office">Office</option>
                          <option value="Others">Others</option>
                          <option value="Stage Area">Stage Area</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="capacity" class="col-sm-2 control-label">Capacity</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Capacity">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="description" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Facilities</button>
                  </div>
                </form>
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- /add modal -->
                <!-- remove modal -->
                <div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Facility</h4>
                      </div>
                      <div class="modal-body">
                        <p>Do you really want to remove ?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="removeBtn">Save changes</button>
                      </div>
                      </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                      <!-- /remove modal -->
                      <!-- edit modal -->
                      <div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Facility</h4>
                            </div>
                            <form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">
                              <div Facilitiesv class="modal-body">
                                <div class="messages"></div>
                                <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="editLevel" class="col-sm-2 control-label">Level</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="editLevel" name="editLevel" placeholder="Level">
                                  <!-- here the text will apper  -->
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="editRoom" class="col-sm-2 control-label">Room</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="editRoom" name="editRoom" placeholder="Room">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="editType" class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="editType" id="editType">
                                    <option selected disabled>Select a room type</option>
                                    <option value="Court">Court</option>
                                    <option value="Laboratory">Laboratory</option>
                                    <option value="Lecture">Lecture</option>
                                    <option value="Office">Office</option>
                                    <option value="Others">Others</option>
                                    <option value="Stage Area">Stage Area</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="editCapacity" class="col-sm-2 control-label">Capacity</label>
                                <div class="col-sm-10">
                                  <input type="number" class="form-control" id="editCapacity" name="editCapacity" placeholder="Capacity">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="editDescription" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="editDescription" name="editDescription" placeholder="Description">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer editMemberModal">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                          </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                          <!-- /edit modal -->
                          
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
      <!-- jquery plugin -->
      <script type="text/javascript" src="../../assets/jquery/jquery.min.js"></script>
      <!-- bootstrap js -->
      <script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js"></script>
      <!-- datatables js -->
      <script type="text/javascript" src="../../assets/datatables/datatables.min.js"></script>
      <!-- include custom index.js -->
      <!-- <script type="text/javascript" src="../../assets/custom/js/index.js"></script> -->
      <script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
      <!-- bootstrap js -->
      <script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
      <!-- datatables js -->
      <script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
      <!-- include custom index.js -->
      <script type="text/javascript" src="custom/js/index.js"></script>

  </body>
</html>