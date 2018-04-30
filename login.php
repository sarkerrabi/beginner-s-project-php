<?php
session_start();
$_SESSION['message']="";
include("connection.php");
global $db;
if (isset($_POST['submit'])) {

  if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['message']= "email or password or both are empty !!";

  }else {
    $email = $db->real_escape_string($_POST['email']);
    $password = md5($_POST['password']);
    $sql = "SELECT * from users WHERE email = '$email' AND password = '$password'; ";
    $result = mysqli_query($db,$sql);
    if (mysqli_num_rows($result)> 0) {
      $_SESSION['email'] = $email;
                header("location:home.php");

    }else {
      $_SESSION['message']="wrong username or password.";
    }
  }
}





?>


<!DOCTYPE html>
<html lang="en">

    <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
          <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<body>

    <div class="container py-5">


        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text" >
                            <h1><strong>Assignment 2</strong> </h1>
                            <div class="description">
                            	<p>
                                Name : MD. Rabiul Ali Sarker <br>
                                ID: 142 1214 042 <br>
                                Course : CSE482 <br>
                            	</p>
                            </div>
                            
                        </div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login now</h3>
                            		<p>Fill in the form below to get instant access:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">



                              <form method="post" action="login.php">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Email address</label>
                                      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                  </div>
                                  <input type="submit" name="submit" value="login" class="btn btn-block btn-primary">

                                  <div class="alert alert-error">
                                    <?= $_SESSION[message] ?>
                                  <p align="center">New user ? <a href="signup.php">Signup Now!</a></p>
                              </form>




		                    </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </body>

</html>
