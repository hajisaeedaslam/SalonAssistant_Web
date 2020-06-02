<?php  
session_start(); 
if(isset($_SESSION['id']))
{
    header("location: ../production/home.php");
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

    <title>Salon Assistant</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
          
          
          
          
          
          
          
          
        <div class="animate form login_form">
          <section class="login_content">
            <form name="siginform" action="salonsigin.php" method="post">
              <h1>Login Here</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="pass" class="form-control" placeholder="Password" min="6s" required="" />
              </div>
              <div>
                    <button  type="submit"  class="btn btn-default submit"   value="Submit">Submit  </button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> Salon Assistat</h1>
                  <p>©2020 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

          
          
          
          
          
          
          
          
          
          
          
          
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form name="signupform" action="SalonSignup.php" method="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" name="salon" class="form-control" placeholder="Salon Name" required="" />
              </div>
              <div>
                  <input type="tel" name="phone" class="form-control" placeholder="Telephone number" required="" />
              </div>
                <br />
              
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                </div> 
            <div>
                <input type="text" name="address" class="form-control" placeholder="Address" required="" />
                </div>
            <div>
                <label> Enter open time </label>
                <input type="time" name="open_time" class="form-control" value="09:00:00" required=""/>
            </div>
                <br />
            <div>
                <label> Enter Closing time </label>
                <input type="time" name="close_time" class="form-control" value="00:00:00" required=""/>
            </div>
                <br />
              <div>
                  <input type="password" name="pass" class="form-control" placeholder="Password" minlength = "6" required=""/>
              </div>
              <div>
                  <button  type="submit"  class="btn btn-default submit"   value="Submit"> Submit  </button>
              </div>
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>Salon Assistant</h1>
                  <p>©2020 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
          
          
          

      </div>
    </div>
  </body>
</html>

<?php
}
?>