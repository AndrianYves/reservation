<?php  
    $conn = mysqli_connect("localhost","root","","database_itproject2")
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    
    <title>Login | Facility Reservation System</title>
    
    <link rel="apple-touch-icon" href="classic/base/assets/images/samcis.png">
    <link rel="shortcut icon" href="classic/base/assets/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="classic/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="classic/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="classic/base/assets/css/site.min.css">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="classic/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="classic/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="classic/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="classic/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="classic/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="classic/global/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="classic/base/assets/examples/css/pages/login.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="classic/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="classic/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="classic/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition page-login layout-full page-dark">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
      <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="brand">
          <img class="brand-img" src="classic/base/assets//images/samcis.png" alt="...">
          <h2 class="brand-text">Facility Reservation System</h2>
        </div>
        <p>Sign into your pages account</p>


        <form method="post" action="php/loginto.php">
          <div class="form-group">
            <label  class="sr-only" for="inputEmail">Email</label>
            <input name = "email" type="email" class="form-control" id="inputEmail" placeholder="Email">
          </div>
          <div class="form-group">
            <label class="sr-only" for="inputPassword">Password</label>

            <input name = "password" type="password" class="form-control" id="inputPassword"
              placeholder="Password">
          </div>
          <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
              <input type="checkbox" id="inputCheckbox" name="remember">
              <label for="inputCheckbox">Remember me</label>
            </div>
            <a class="float-right" href="classic/base/html/pages/forgot-password.html">Forgot password?</a>
          </div>
          <!-- <button type="submit" name = "btnLogin" class="btn btn-primary btn-block">Sign in</button> -->
          <input type="submit" name="btnLogin" value="Sign In" class="btn btn-primary btn-block">
        </form>

        <footer class="page-copyright page-copyright-inverse">
          <p>© 2019. All RIGHT RESERVED.</p>
        </footer>
      </div>
    </div>
    <!-- End Page -->


    <!-- Core  -->
    <script src="classic/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="classic/global/vendor/jquery/jquery.js"></script>
    <script src="classic/global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="classic/global/vendor/bootstrap/bootstrap.js"></script>
    <script src="classic/global/vendor/animsition/animsition.js"></script>
    <script src="classic/global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="classic/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="classic/global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="classic/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    
    <!-- Plugins -->
    <script src="classic/global/vendor/switchery/switchery.js"></script>
    <script src="classicglobal/vendor/intro-js/intro.js"></script>
    <script src=".classic/global/vendor/screenfull/screenfull.js"></script>
    <script src="classic/global/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="classic/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Scripts -->
    <script src="classic/global/js/Component.js"></script>
    <script src="classic/global/js/Plugin.js"></script>
    <script src="classic/global/js/Base.js"></script>
    <script src="classic/global/js/Config.js"></script>
    
    <script src="classic/base/assets/js/Section/Menubar.js"></script>
    <script src="classic/base/assets/js/Section/GridMenu.js"></script>
    <script src="classic/base/assets/js/Section/Sidebar.js"></script>
    <script src="classic/base/assets/js/Section/PageAside.js"></script>
    <script src="classic/base/assets/js/Plugin/menu.js"></script>
    
    <script src="classic/global/js/config/colors.js"></script>
    <script src="classic/base/assets/js/config/tour.js"></script>
    <script>Config.set('assets', 'classic/base/assets');</script>
    
    <!-- Page -->
    <script src="classic/base/assets/js/Site.js"></script>
    <script src="classic/global/js/Plugin/asscrollable.js"></script>
    <script src="classic/global/js/Plugin/slidepanel.js"></script>
    <script src="classic/global/js/Plugin/switchery.js"></script>
        <script src="classic/global/js/Plugin/jquery-placeholder.js"></script>
    
    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
  </body>
</html>
