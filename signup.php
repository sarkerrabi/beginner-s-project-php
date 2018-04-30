<?php
session_start();
$_SESSION['message']="";
include("connection.php");
global $db;

if (isset($_POST['submit'])) {

  if ($_POST['password'] === $_POST['confirmPassword']) {
    echo "confirm";
    $firstname = $db->real_escape_string($_POST['firstname']);
    $lastname = $db->real_escape_string($_POST['lastname']);
    $ssn = $db->real_escape_string($_POST['userid']);
    $gender = $_POST['gender'];
    $email = $db->real_escape_string($_POST['email']);
    $password = md5($_POST['password']);

    $sql = "insert into users(first_name,last_name,ssn,gender,email,password) values ('$firstname','$lastname','$ssn','$gender','$email','$password')";
    if ($db->query($sql) === true) {
      $_SESSION['message']= "Registration Successful.";
      header("location: login.php");
    }else {
      $_SESSION['message']= "user could not be added to database";
    }

  }else {
    $_SESSION['message']='Password and Confirm Password are not same.';
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
                        			<h3>Sign up now</h3>
                            		<p>Fill in the form below to get instant access:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">

			                    <form role="form" action="signup.php" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="firstname">First name</label>
			                        	<input type="text" name="firstname" placeholder="First name..." class="form-first-name form-control" id="form-first-name"  required >
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="lastname">Last name</label>
			                        	<input type="text" name="lastname" placeholder="Last name..." class="form-last-name form-control" id="form-last-name" required >
			                        </div>

                              <div class="form-group">
                                <label class="sr-only" for="userid">User ID</label>
                                <input type="text" name="userid" placeholder="User ID..." class="form-user-id form-control" id="form-user-id"  required>
                              </div>

                              <div class="form-group">
                                <!-- <label class="mr-sm-2" for="inlineFormCustomSelect">Gender</label> -->
                                  <select class="custom-select mr-sm-2" name="gender" id="inlineFormCustomSelect">

                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                  </select>

                              </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="email">Email</label>
			                        	<input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email" required >
			                        </div>

                              <div class="form-group">
                                <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Password..." required >
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                </small>


                              </div>

                              <div class="form-group">
                                <input type="password" name="confirmPassword" id="inputPassword6" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Confirm Password..." required >
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                </small>


                              </div>





			                      <input type="submit" name="submit" value="Signup" class="btn btn-block btn-primary">

                            <div class="alert alert-error">
                              <?= $_SESSION[message] ?>

                            </div>
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
