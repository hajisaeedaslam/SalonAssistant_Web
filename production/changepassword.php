<?php
include "connect.php";
session_start();
 
if(isset($_SESSION['id'])==false)
{
    header("location: ../production/index.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <link rel="icon" href="images/favicon.ico" type="image/ico" />

        <title>Salon Assistant</title>
        
<!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
<!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
        <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- JQVMap -->
        <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
<!-- bootstrap-daterangepicker -->
        <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="home.php" class="site_title"> <span>Salon Assistant</span></a>
                        </div>
                        <div class="clearfix"></div>

<!-- menu profile quick info -->
                      
                        <div class="profile clearfix">
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2><?php echo $_SESSION['name'];?></h2>
                                <?php echo $_SESSION['email'];?>
                            </div>              
                        </div>
                      
<!-- /menu profile quick info -->

                
                        <br />

<!-- sidebar menu -->
                      
                      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                          <div class="menu_section">
                              <ul class="nav side-menu">
                                  <li><a href="home.php"><i class="fa fa-home"></i> Home </a>
                                  </li>
                                  <li><a href="appointments.php"><i class="fa fa-table"></i> Appointments </a>
                                  </li>
                                  <li><a href="statistics.php"><i class="fa fa-bar-chart-o"></i> Statistics </a>
                                  </li>
                                  <li><a href="payment.php"><i class="fa fa-money"></i> Payments </a>
                                  </li>
                                  <li><a><i class="fa fa-gear"></i> Settings <span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                          <li><a href="updateprofile.php">Update Profile</a></li>
                                          <li><a href="changepassword.php">Change Password</a></li>
                                      </ul>
                                  </li>
                                  <li> <a href="index.php" class="glyphicon glyphicon-off"> Logout </a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      
<!-- /sidebar menu -->
                      
                  </div>
              </div>

<!-- top navigation -->
              
              <div class="top_nav">
                  <div class="nav_menu">
                      <div class="nav toggle">
                          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                      </div>
                      <nav class="nav navbar-nav">
                          <ul class=" navbar-right">
                              <li role="presentation" class="nav-item dropdown open">
                                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                      <i class="fa fa-envelope-o"></i>
                                      <span class="badge bg-green">6</span>
                                  </a>
                                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                      <li class="nav-item">
                                          <a class="dropdown-item">
                                              <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                              <span>
                                                  <span>John Smith</span>
                                                  <span class="time">3 mins ago</span>
                                              </span>
                                              <span class="message">
                                                  Film festivals used to be do-or-die moments for movie makers. They were where...
                                              </span>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <div class="text-center">
                                              <a class="dropdown-item">
                                                  <strong>See All Alerts</strong>
                                                  <i class="fa fa-angle-right"></i>
                                              </a>
                                          </div>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </nav>
                  </div>
              </div>

<!-- /top navigation -->

<!-- page content -->
                
              <div class="right_col" role="main" style="align-content: center;" >
                  <div style="width: 500px; padding-left: 100px;">
            <form name="signupform" action="changepasshandler.php" method="post">
              <h1>Change Password</h1>
              <div>
                  <input type="password" name="oldpass" class="form-control" placeholder="Old Password" required=""/>
              </div>
                <br>
                <div>
                  <input type="password" name="newpass" class="form-control" placeholder="New Password" required=""/>
              </div>
                <br>
                <div>
                  <input type="password" name="renewpass" class="form-control" placeholder="Confirm Password" required=""/>
              </div>
                <br>
              <div>
                  <button  type="submit"  class="btn btn-default submit"   value="Submit">Submit  </button>
              </div>
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Don't Want to change Password ?
                  <a href="home.php" class="to_register"> Go Back </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>Salon Assistant</h1>
                  <p>©2020 All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
                  </div>

<!-- footer content -->
                  
                  <footer style="position: fixed; bottom: 0; right: 0; left: 0; width: full;">
                      <div class="pull-right">           
                          Salon Assistant          
                      </div>          
                      <div class="clearfix"></div>        
                  </footer>
                  
<!-- /footer content -->  

                  
              </div>
                        
                        
                       
        </div> 
                        
                     
          

<!-- jQuery -->    
          <script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->    
          <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->    
          <script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->    
          <script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->    
          <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->    
          <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->    
          <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->    
          <script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->    
          <script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->    
          <script src="../vendors/Flot/jquery.flot.js"></script>    
          <script src="../vendors/Flot/jquery.flot.pie.js"></script>    
          <script src="../vendors/Flot/jquery.flot.time.js"></script>    
          <script src="../vendors/Flot/jquery.flot.stack.js"></script>    
          <script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->    
          <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>    
          <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>    
          <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->    
          <script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->    
          <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>    
          <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>    
          <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->    
          <script src="../vendors/moment/min/moment.min.js"></script>    
          <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Custom Theme Scripts -->    
          <script src="../build/js/custom.min.js"></script>      
      </div>  
    </body>
</html>

<?php
}
?>