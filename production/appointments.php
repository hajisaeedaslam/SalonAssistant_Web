<?php  
session_start();
include "connect.php";
if(isset($_SESSION['id'])==false)
{
    header("location: ../production/index.php");
}
else{
    $query = "SELECT Date, Time, User_ID, Appointment_Id FROM appointments WHERE Status =\"incomplete\";";
    $result = mysqli_query($conn, $query); //One Execution can be fetched on One time you are fetching on one execution two time so time access execute it two time 
    $result2 = mysqli_query($conn, $query);
	$fetchApp = mysqli_fetch_assoc($result);
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
        
        <script>
        //AJAX SEARCH
			function showHint(str){
				if(str.length == 0){
					document.getElementById("txtHint").innerHTML = "";
					return;
				}
				else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200){
							document.getElementById("txtHint").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET", "app_getHint.php?search=" + str, true);
					xmlhttp.send();
				}
			}
        </script>

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
                                  <li> <a href="logout.php" class="glyphicon glyphicon-off"> Logout </a>
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
              

              
              <div class="right_col" role="main">  
                  
                  <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
              <form>
                    <h3>Search Appointments</h3>
                    <input type="text" size="50" name="search" onkeyup="showHint(this.value)" autocomplete="off"> 
              </form>
              <p><span id="txtHint"></span></p>
              
              <!-----Appointments pannel ---->
              <div style=" top: 10; right: 0; left: 100; width: full;">
                  <table class="table" style="border: solid 1px black;">
                      <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>User ID</th>
                        <th>Complete</th>
                        <th>Cancel</th>
                      </tr>
<?php
if(mysqli_num_rows($result)>0) {
    while($fetchApp = mysqli_fetch_assoc($result2)){
        echo "<tr><td>".$fetchApp["Date"]."</td><td>".$fetchApp["Time"]."</td><td> ".$fetchApp["User_ID"]."</td>";
        echo "<td> <a href='completeappointment.php?aId=".$fetchApp['Appointment_Id']."'> Complete </a> </td>";
        echo "<td> <a href='cancelappointment.php?aId=".$fetchApp['Appointment_Id']."'> Cancel </a> </td></tr>";
    }
    //echo "</table>";
} else {
    echo "0 results";
}
$conn->close(); 
     
 ?>
                      </table>
         </div>     
              
        </div>
          <!-- /top tiles -->

<!-- footer content -->
                  
                  <footer style="position: fixed; bottom: 0; right: 0; left: 0; width: full;">
                      <div class="pull-right">           
                          Salon Assistant          
                      </div>          
                      <div class="clearfix"></div>        
                  </footer>
                  
<!-- /footer content -->  

          </div> 
<!-- /page content -->

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
            <!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      </div>  
    </body>
</html>

<?php
}
?>
