<?php
  session_start();

  if(!isset($_SESSION['log'])){

  } else {
    header('location:index.php');
  };
  include 'dbconnect.php';
    if (isset($_REQUEST['firstname'])) {
      $firstname = stripslashes($_REQUEST['firstname']);
      $firstname = mysqli_real_escape_string($conn, $firstname);
      $lastname= stripslashes($_REQUEST['lastname']);
      $lastname = mysqli_real_escape_string($conn, $lastname);
      $gender = stripslashes($_REQUEST['gender']);
      $gender = mysqli_real_escape_string($conn, $gender);
      $lahir = stripslashes($_REQUEST['birthDate']);
      $lahir = mysqli_real_escape_string($conn, $lahir);
      $email = stripslashes($_REQUEST['email']);
      $email = mysqli_real_escape_string($conn, $email);
      $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $sql_e = "SELECT * FROM `login` WHERE email='$email'";
      $res_e = mysqli_query($conn, $sql_e);
      if (mysqli_num_rows($res_e) > 0) {
        echo '<script>alert("Cant Registration"); document.location="registered.php"; </script>';
      }else {
        $query = "INSERT into `login` (first_name,last_name,gender,lahir, email, password) VALUES  ('$firstname','$lastname','$gender','$lahir','$email','$pass')";
        $res = mysqli_query($conn, $query);
        if ($res) {
        echo '<script>alert("Register Success"); document.location="loginform.php"; </script>';
        }else {
        echo '<script>alert("Register Not Success"); document.location="registered.php"; </script>';
          }
      }
    }
?>
<html>
<head>
    <title>Register - Cha Chi Ngan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<!-- Show navbar -->
<script>
  $(document).ready(function(){
    $('i').click(function(){
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
</style>

<body>
    <ul id="lol">
      <li id = "li"class="active"><a href="/">Register</a></li>
      <li id = "li2"><a id="a" href="index.php">Home</a></li>
    </ul>
    <section>
          <i id=bar class="fas fa-bars"></i>
          <div class="sec1">
            <div class="container"> <!-- card mt-5 mb-5 pl-5 pr-5 -->
                <div class="row py-5 ml-2 mt-4 align-items-center">
                    <div class="col-md-5 pr-lg-5 mb-5 mt-5 mb-md-auto">
                        <img src="images/restaurant.svg" alt="Sign Up" class="img-fluid mb-3 d-none d-md-block">
                    </div>

                    <!-- Registration Form -->
                    <div class="col-md-7 col-lg-6 ml-auto">
                    <h1 class="mb-4 d-flex justify-content-center">Create an Account</h1>
                    <form action="" method="post">
                        <div class="row">
                            <!-- First Name -->
                            <div class="input-group col-lg-6 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-user text-muted"></i>
                                    </span>
                                </div>
                                <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md" required>
                            </div>

                            <!-- Last Name -->
                            <div class="input-group col-lg-6 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-user text-muted"></i>
                                    </span>
                                </div>
                                <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md" required>
                            </div>

                            <!-- Gender -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-venus-mars text-muted"></i>
                                    </span>
                                </div>
                                <select id="gender" name="gender" class="form-control custom-select bg-white border-left-0 border-md">
                                    <option value="Man">Man</option>
                                    <option value="Woman">Woman</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                             <!-- Birth Date -->
                             <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-calendar text-muted"></i>
                                    </span>
                                </div>
                                <input id="birthDate" type="date" name="birthDate" placeholder="Birth Date" class="form-control bg-white border-left-0 border-md" required>
                            </div>
                            <div class="input-group col-lg-12 mb-3"><small class="form-text text-muted">Choose your birth date (mm/dd/yyyy).</small></div>

                            <!-- Email Address -->
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-envelope text-muted"></i>
                                    </span>
                                </div>
                                <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" required>
                            </div>
                            <div class="input-group col-lg-12 mb-3"><small class="form-text text-muted">We'll never share your email with anyone else.</small></div>

                            <!-- Password -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-lock text-muted"></i>
                                    </span>
                                </div>
                                <input id="password" type="password" name="password" placeholder="Password"  class="form-control bg-white border-left-0 border-md" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8-16 character" maxlength="16" required>
                            </div>
                            <div class="input group col-lg-4 mb-4">
                              <input type="checkbox" onclick="myFunction()"> Show Password

                            </div>
                            <!-- Submit Button -->
                            <div class="form-group col-lg-12 mb-0">
                                <button type="submit" class="btn btn-success btn-block py-2">
                                    <span class="font-weight-bold">Create your account</span>
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
                                <p class="text-muted font-weight-bold">Already Registered? <a href="loginform.php" class="text ml-2">Log In</a></p>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    </section>

<!-- Extra JS -->
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
