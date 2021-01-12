<?php
    if(isset($_POST["signup"])){
        $email = $_POST["email"];
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        // $email_approved = $_POST["email_approved"];
        // $mobile_approved = $_POST["mobile_approved"];
        $password = $_POST["password"];
        $question= $_POST["question"];
        $answer = $_POST["answer"];
        
        require "user.php";
        $user = new user();
        $user -> insertUser($email,$name,$mobile,$password,$question,$answer);
    }
?>

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
	<!---header--->
	<?php
		include "header.php";
	?>
<!---login--->
<div class="content">
<!-- registration -->
    <div class="main-1">
        <div class="container">
            <div class="register">
                <form action="" method="post" onsubmit="return(validateForm());"> 
                    <div class="register-top-grid">
                    <h3>personal information</h3>
                        <h5 class="error-msg">* mandatory fields</h5>
                        <!-- <div>
                            <span>Email Address<label>*</label></span>
                            <input type="text" name="email" id="email" required="">
                        </div> -->

                        <div class="input-group flex-nowrap">
                        <span>Email Address<label>*</label></span>
                            <input type="text" name="email" id="email" placeholder="@ : " required="">
                            <p id="alert" style="font-size:80%">We'll never share your email with anyone else.</p>
                            <button type="button" id="otpSend" >Send OTP</button>
                        </div>
                        <div id="otpDiv" class="hide">
                                <label for="otp"></label>
                                <input type="number" name="otp" id="otp" class="form-control w-75" aria-describedby="emailHelp" placeholder="Enter Your OTP Here : ">
                        </div>

                        <div class="input-group flex-nowrap">
                        <span>Mobile  (minimum 10 digits required)<label>*</label></span>
                        <input type="text" name="mobile" id="mobile" placeholder="+91 : " required="">
                        <p id="alert1" class="" style="font-size:80%">We send OTP on this Number.</p>
                        <button type="button" id="mOtp" class="btn btn-danger mt-0 ml-5 w-75">Send OTP</button>
                        </div>
                        <div id="hide1" class="input-group flex-nowrap mb-3 hide">
                        <label for="otp"></label>
                        <input type="number" name="mobileOtp" id="mobileOtp" class="form-control w-75" id="mobileOtp" aria-describedby="emailHelp" placeholder="Enter Your OTP Here : ">
                        </div>

                        
                        <div>
                            <span>Name<label>*</label></span>
                            <input type="text" name="name" id="name" required=""> 
                        </div>

                        <div>
                            <span>Security Question<label>*</label></span>
                            <select id="security-question" name="question"> 
                                <option value="Please select security question">Please select security question</option>
                                <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                <option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
                                <option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
                                <option value="What was your dream job as a child?">What was your dream job as a child?</option>
                                <option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname?</option>
                            </select>
                        </div>
                        <div id="answer-signup">
                            <span>ANSWER<label>*</label></span>
                            <input type="text" name="answer" id="answer"> 
                        </div>
                        
                        <div class="clearfix"> </div>
                        <a class="news-letter" href="#">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
                        </a>
                        </div>
                        <div class="register-bottom-grid">
                            <h3>login information</h3>
                                <div>
                                <span>Password<label>*</label></span>
                                <input type="password" name="password" id="password" required="">
                                <span id="error-password"> (Password should be atleast one upper case one lower case (min-8 characters))</span>
                                </div>
                                <div>
                                <span>Confirm Password<label>*</label></span>
                                <input type="password" name="repassword" id="repassword" required="">
                                </div>
                        </div>
                <div class="clearfix"> </div>
                <div class="register-but">
                        <!-- <input type="submit" value="Login"> -->
                        <input type="submit" value="Submit" name="signup">
                        <!-- <button type="submit" value="Submit" disabled>SignUp</button> -->
                        <div></div>
                        <div class="error-msg"></div>
                        <div class="clearfix"> </div>
                    
                </div></form>
            </div>
            </div>
    </div>
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <script src="mobileOtp.js"></script>
  <script src="otp.js"></script>
    <script>
        $('#security-question').click(function(){
            var value=$(this).val();
            if (value!="Please select security question")
            {
                $('#answer-signup').show();
            }
            else{
                $('#answer-signup').hide();
            }
        });
        $('#password').focus(function(){
            $('#error-password').show().fadeOut(7000);
        });
        function validateForm(){
            var name=($('#name').val()).trim();
            var email=($('#email').val()).trim();
            var mobile=($('#mobile').val()).trim();
            var security_question=($('#security-question').val()).trim();
            var answer=($('#answer').val()).trim();
            var password=($('#password').val()).trim();
            var repassword=($('#repassword').val()).trim();
            var regName=/^([a-zA-Z]+\s?)*$/;
            var regPassword=/^(?!.* )(?=.*\d)(?=.*[a-zA-Z]).{8,16}$/;
            var regMobile=/^(0)?[1-9]{1}[0-9]{9}$/;
            var regEmail=/^[a-zA-Z0-9.-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
            if (name=="" || email=="" || mobile=="" || security_question=="" || answer=="" || password=="" || repassword=="") {
                alert("all fields are mandatory including security question and answer kindly choose one question and answer that!");
                return false;
            }
            else if (!(name.match(regName))){
                alert("Please enter valid name");
                return false;
            }
            else if (!(password.match(regPassword))) {
                alert("password criteria does not matched");
                return false;
            }
            else if (!(email.match(regEmail))) {
                alert("email criteria doesn't match");
                return false;
            }
            else if (!(mobile.match(regMobile))) {
                alert("Please enter valid mobile number");
                return false;
            }
            else if (password!=repassword) {
                alert("please enter same password and repassword");
                return false;
            }
            else if (!isNaN(answer)) {
                alert("please enter valid answers i.e, only digits are not allowed");
                return false;
            }
            return true;
        }
    </script>
</div>
<!---footer--->
<?php
	include "footer.php";
?>
<!---footer--->	

</body>
</body>
</html>