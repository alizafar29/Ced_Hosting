<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Ced Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Account :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ced Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<!--script-->
<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>
<!--script-->
</head>
  <body>

      <?php
      include "header.php";
      ?>

<div class="main-1">
        <div class="container">
            <div class="register">
        <form action="" method="POST">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Email Id</span>
            <input type="email" name="email" id="email" class="form-control" placeholder="@ : " aria-label="Username" aria-describedby="addon-wrapping" required>
        </div>
        <div class="input-group flex-nowrap">
          <p id="alert" style="font-size:80%">We'll never share your email with anyone else.</p>
        </div>
          <div id="hide1" class="input-group flex-nowrap mb-3">
            <label for="otp"></label>
            <input type="number" name="otp" class="form-control w-75 hide" id="otp" aria-describedby="emailHelp" placeholder="Enter Your OTP Here : ">
            <button type="button" id="otpSend" class="btn btn-danger mt-0 ml-5 w-75">Send OTP</button>
          </div> 

            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Mobile Number</span>
                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="+91 : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <div class="input-group flex-nowrap">
              <p id="alert1" class="" style="font-size:80%">We send OTP on this Number.</p>
            </div>

            <div id="hide1" class="input-group flex-nowrap mb-3">
              <label for="otp"></label>
              <input type="number" name="mobileOtp" id="mobileOtp" class="form-control w-75 hide" id="mobileOtp" aria-describedby="emailHelp" placeholder="Enter Your OTP Here : ">
              <button type="button" id="mOtp" class="btn btn-danger mt-0 ml-5 w-75">Send OTP</button>
            </div>
            <button type="submit" class="btn btn-danger" disabled>SignUp</button>
        </form>
        </div>
        </div>
        </div>
      <?php
        include "footer.php";
      ?>

    <!-- Optional JavaScript -->
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <script src="mobileOtp.js"></script>
  <script src="otp.js"></script>
  </body>
</html>