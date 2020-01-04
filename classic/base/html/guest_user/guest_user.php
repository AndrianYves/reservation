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
    
    <title>Guest User</title>
    
    <link rel="apple-touch-icon" href="../../assets1/images/samcis.png">
    <link rel="shortcut icon" href="../../assets1/images/samcis.png">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../../global/global1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../global/global1/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../../assets1/css/site.min.css">
    <link rel="stylesheet" href="../guest_user/css/custom.css">
    
    
    <!-- Plugins -->
    <link rel="stylesheet" href="../../../global/global1/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../../../global/global1/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="../../../global/global1/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="../../../global/global1/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="../../../global/global1/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="../../../global/global1/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="../../../global/global1/vendor/chartist/chartist.css">
        <link rel="stylesheet" href="../../../global/global1/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
        <link rel="stylesheet" href="../../../global/global1/vendor/aspieprogress/asPieProgress.css">
        <link rel="stylesheet" href="../../../global/global1/vendor/jquery-selective/jquery-selective.css">
        <link rel="stylesheet" href="../../../global/global1/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
        <link rel="stylesheet" href="../../../global/global1/vendor/asscrollable/asScrollable.css">
        <link rel="stylesheet" href="../../assets1/examples/css/dashboard/team.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="../../../global/global1/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../../../global/global1/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <link rel="stylesheet" href="../../../global/global1/fonts/7-stroke/7-stroke.css">
    <link rel="stylesheet" href="../../../global/global1/fonts/weather-icons/weather-icons.css">
    
    <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="../../../global/global1/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition site-navbar-small dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse"
      role="navigation">
    
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
        <a class="navbar-brand navbar-brand-center" href="guest_user.php">
          <img class="navbar-brand-logo navbar-brand-logo-normal" src="../../assets1/images/samcis.png"
            title="Remark">
          <span class="navbar-brand-text hidden-xs-down"> Guest User</span>
        </a>
      </div>
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="../../../global/global1/portraits/5.jpg" alt="...">
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
    
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="../guest_user/auth/logout.php" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
              </div>
            </li>
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
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
    </nav>    

    <!-- Page -->
    <div class="page">
      <div class="page-content container-fluid">
        <div data-plugin="matchHeight" data-by-row="true">
            <!-- Panel Table Add Row -->
          <div class="panel">
            <div class="panel-body">
              <div class="row">

                  <div class="panel-body container-fluid">
                    <div class="row row-lg">
                      <div class="col-12">
                        <!-- Example Default Button -->
                          <div class="example-wrap">
                            <h3 class="example-title" align="center">Maryheights Campus Facilities</h3>
                            <div class="row">
                              <div class="col-sm-12 col-md-4 col-xl-2">
                                <div class="example">
                                  <ul class="list-unstyled">
                                    <li class="mb-20">
                                      <a type="button" class="btn btn-block btn-default" href="facilities/plaza.php">DEVESSE PLAZA</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4 col-xl-2">
                                <div class="example">
                                  <ul class="list-unstyled">
                                    <li class="mb-20">
                                      <a type="button" class="btn btn-block btn-primary" href="facilities/amphi.php">AMPHITHEATER</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4 col-xl-2">
                                <div class="example">
                                  <ul class="list-unstyled">
                                    <li class="mb-20">
                                      <a type="button" class="btn btn-block btn-success" href="facilities/avr.php">AVR</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4 col-xl-2">
                                <div class="example">
                                  <ul class="list-unstyled">
                                    <li class="mb-20">
                                      <a type="button" class="btn btn-block btn-info" href="facilities/pool.php">SWIMMING POOL</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4 col-xl-2">
                                <div class="example">
                                  <ul class="list-unstyled">
                                    <li class="mb-20">
                                      <a type="button" class="btn btn-block btn-warning" href="facilities/oval.php">OVAL</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4 col-xl-2">
                                <div class="example">
                                  <ul class="list-unstyled">
                                    <li class="mb-20">
                                      <a type="button" class="btn btn-block btn-danger" data-toggle="dropdown" >COURTS</a>
                                      <div class="dropdown-menu" aria-labelledby="exampleIconDropdown1" role="menu">
                                        <a class="dropdown-item" role="menuitem" href="facilities/v_court.php">VOLLEYBALL COURT</a>
                                        <a class="dropdown-item" role="menuitem" href="facilities/b_court.php">BASKETBALL COURT</a>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Example Default Button -->
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
                <!-- End Panel Table Add Row -->
        </div>
      </div>
    </div>
    <!-- End Page -->

    <!-- Add Item Dialog -->
    <div id="addtodoItemForm" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="addtodoItemForm"
      aria-hidden="true">
      <div class="modal-dialog modal-simple">
        <form class="modal-content form-horizontal" role="form" action="#" method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="moadl-title">Create New To Do Item</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-sm-2 form-control-label" for="title">Title:</label>
              <div class="col-sm-10">
                <input id="title" class="form-control" type="text" name="title" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 form-control-label" for="dueDate">Due Date</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <input id="dueDate" class="form-control" type="text" data-plugin="datepicker" data-container="#addtodoItemForm"
                  />
                  <span class="input-group-addon">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 form-control-label" for="people">People:</label>
              <div class="col-sm-10">
                <select id="people" multiple="multiple" class="plugin-selective">
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-actions">
              <button class="btn btn-primary" data-dismiss="modal" type="button">
                Add This Item
              </button>
              <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">
            Cancel
          </a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- End Add Item Dialog -->

    <!-- Edit Dialog -->
    <div class="modal fade" id="edittodoItemForm" aria-hidden="true" aria-labelledby="edittodoItemForm"
      role="dialog" tabindex="-1" data-show="false">
      <div class="modal-dialog modal-simple">
        <form class="modal-content form-horizontal" action="#" method="post" role="form">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
            <h4 class="modal-title">Edit To Do Item</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-sm-2 form-control-label" for="editTitle">Title:
              </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="editTitle" name="editTitle">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 form-control-label" for="editStarts">Due Date:
              </label>
              <div class="col-sm-10">
                <div class="input-group">
                  <input type="text" class="form-control" id="editDueDate" name="editDueDate" data-container="#edittodoItemForm"
                    data-plugin="datepicker">
                  <span class="input-group-addon">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 form-control-label" for="editPeople">People:
              </label>
              <div class="col-sm-10">
                <select id="editPeople" multiple="multiple" class="plugin-selective"></select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-actions">
              <button class="btn btn-primary" data-dismiss="modal" type="button">Save</button>
              <button class="btn btn-danger" data-dismiss="modal" type="button">Delete</button>
              <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- End Edit Dialog -->


    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-right">
        © 2019 Facility Reservation System.
      </div>
    </footer>
    <!-- Core  -->
    <script src="../../../global/global1/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="../../../global/global1/vendor/jquery/jquery.js"></script>
    <script src="../../../global/global1/vendor/popper-js/umd/popper.min.js"></script>
    <script src="../../../global/global1/vendor/bootstrap/bootstrap.js"></script>
    <script src="../../../global/global1/vendor/animsition/animsition.js"></script>
    <script src="../../../global/global1/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="../../../global/global1/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="../../../global/global1/vendor/asscrollable/jquery-asScrollable.js"></script>
    
    <!-- Plugins -->
    <script src="../../../global/global1/vendor/switchery/switchery.js"></script>
    <script src="../../../global/global1/vendor/intro-js/intro.js"></script>
    <script src="../../../global/global1/vendor/screenfull/screenfull.js"></script>
    <script src="../../../global/global1/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="../../../global/global1/vendor/chartist/chartist.js"></script>
        <script src="../../../global/global1/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>
        <script src="../../../global/global1/vendor/aspieprogress/jquery-asPieProgress.js"></script>
        <script src="../../../global/global1/vendor/matchheight/jquery.matchHeight-min.js"></script>
        <script src="../../../global/global1/vendor/jquery-selective/jquery-selective.min.js"></script>
        <script src="../../../global/global1/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    
    <!-- Scripts -->
    <script src="../../../global/global1/js/Component.js"></script>
    <script src="../../../global/global1/js/Plugin.js"></script>
    <script src="../../../global/global1/js/Base.js"></script>
    <script src="../../../global/global1/js/Config.js"></script>
    
    <script src="../../assets1/js/Section/Menubar.js"></script>
    <script src="../../assets1/js/Section/Sidebar.js"></script>
    <script src="../../assets1/js/Section/PageAside.js"></script>
    <script src="../../assets1/js/Plugin/menu.js"></script>
    
    <!-- Config -->
    <script src="../../../global/global1/js/config/colors.js"></script>
    <script src="../../assets1/js/config/tour.js"></script>
    <script>Config.set('assets', '../assets');</script>
    
    <!-- Page -->
    <script src="../../assets1/js/Site.js"></script>
    <script src="../../../global/global1/js/Plugin/asscrollable.js"></script>
    <script src="../../../global/global1/js/Plugin/slidepanel.js"></script>
    <script src="../../../global/global1/js/Plugin/switchery.js"></script>
        <script src="../../../global/global1/js/Plugin/matchheight.js"></script>
        <script src="../../../global/global1/js/Plugin/aspieprogress.js"></script>
        <script src="../../../global/global1/js/Plugin/bootstrap-datepicker.js"></script>
        <script src="../../../global/global1/js/Plugin/asscrollable.js"></script>
    
        <script src="../../assets1/examples/js/dashboard/team.js"></script>
    
  </body>
</html>
