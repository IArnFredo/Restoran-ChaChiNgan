<?php
    session_start();
  if(!isset($_SESSION['log'])){
  } else {
  	header('location:index.php');
  };
  include 'dbconnect.php';
  date_default_timezone_set("Asia/Bangkok");
  $timenow = date("j-F-Y-h:i:s A");
  	if(isset($_POST['login'])){
  	$email = mysqli_real_escape_string($conn,$_POST['email']);
  	$pass = mysqli_real_escape_string($conn,$_POST['pass']);
  	$queryuser = mysqli_query($conn,"SELECT * FROM login WHERE email='$email'");
  	$cariuser = mysqli_fetch_assoc($queryuser);
  		if( password_verify($pass, $cariuser['password'])){
  		$_SESSION['id'] = $cariuser['userid'];
  		$_SESSION['name'] = $cariuser['first_name'];
  		$_SESSION['role'] = $cariuser['role'];
  		$_SESSION['log'] = "Logged";
        header('location:index.php');
  		} else {
        echo '<script>alert("Username or Password Wrong"); document.location="loginform.php"; </script>';
  		}
  	}
?>
<html>
<head>
    <title>Login - Cha Chi Ngan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{URL::asset('')}}" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 JS and Jquery -->
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- Show Navbar -->
<script>
  $(document).ready(function(){
    $('#bar').click(function(){
      $('ul').toggleClass('ul_show');
      $('section').toggleClass('slide_image');
    });
    $('li').click(function(){
      $(this).addClass('active').siblings().removeClass('active');
    });
  });
</script>

<style>
  body {
    background-color: #ffe6ca;
  }
  h1 {
    color: #c15050;
  }
  .btn-success {
    background-color: #ff7171;
  }
  .btn-success:hover {
    background-color: #c15050;
  }
  .text {
    color: #ff7171;
  }
  .text:hover {
    color: #c15050;
  }
  @media only screen and (max-width: 600px) {
    .captcha-image {
      width: 245px;
      height:40px;
    }
  }
</style>

<body>
  
    <ul id="lol">
      <li id ="li" class="active"><a href="/">Login</a></li>
      <li id ="li2"><a id="a" href="index.php">Home</a></li>
    </ul>
    <section>
          <i id="bar" class="fas fa-bars"></i>
          <div class="sec1">
            <div class="container"> <!-- card mt-5 mb-5 pl-5 pr-5 -->
                <div class="row py-5 mt-4 align-items-center">
                    <div class="col-md-5 pr-lg-5 mb-5 mt-5 mb-md-auto">
                        <img src="images/restaurant.svg" alt="Sign Up" class="img-fluid mb-3 d-none d-md-block">
                        <!-- <div class="d-none d-md-block" style="text-align:center";>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div> -->
                    </div>
                    <!-- Login Form -->
                    <div class="col-md-7 col-lg-6 ml-auto">
                    <h1 class="mb-4 d-flex justify-content-center">Login</h1>
                    <form action="" method="post">
                        <div class="row">
                            <!-- Email Address -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-users text-muted"></i>
                                    </span>
                                </div>
                                <input id="email" type="email" name="email" placeholder="Email" class="form-control bg-white border-left-0 border-md" required>
                            </div>

                            <!-- Password -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-lock text-muted"></i>
                                    </span>
                                </div>
                                <input id="password" type="password" name="pass" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                            </div>
                            <div class="input group col-lg-4 mb-4">
                              <input type="checkbox" onclick="myFunction()"> Show Password
                            </div>

                            <!-- Create Captcha -->
                            <div class="input-group col-lg-12 mb-2">
                                <span>
                                    <img src="captcha.php" alt="CAPTCHA" class="captcha-image" width="250" height="40">
                                    <!-- <image class="refreshbutton" style="cursor:pointer;" src="image/refresh.png" width="30" height="30"></image> -->
                                    <a class="btn btn-success refreshbutton"><i class="fa fa-sync fa-spin" style="color:white"></i></a>
                                </span>
                            </div>
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-sync text-muted"></i>
                                    </span>
                                </div>
                                <input type="text" id="captcha" name="captcha" placeholder="Enter Captcha" class="form-control bg-white border-left-0 border-md" required>
                            </div>
                            <div class="input-group col-lg-12 mb-4"><small class="form-text text-muted">Please enter the captcha to continue.</small></div>
                            <script>
                                var refreshButton = document.querySelector(".refreshbutton");
                                refreshButton.onclick = function() {
                                    document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
                                }
                            </script>

                            <!-- Submit Button -->
                            <div class="form-group col-lg-12 mx-auto mb-0">
                                <button type="submit" name="login" class="btn btn-success btn-block py-2">
                                    <span class="font-weight-bold">Login</span>
                                </button>
                            </div>

                            <!-- Divider Text -->
                            <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                                <div class="border-bottom w-100 ml-6"></div>
                                <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                                <div class="border-bottom w-100 mr-6"></div>
                            </div>

                            <!-- Already Registered -->
                            <div class="text-center w-100">
                                <p class="text-muted font-weight-bold">Don't have an account? <a href="registered.php" class="text ml-2">Register Now!</a></p>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    </section>
<!-- Extra js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
