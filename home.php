<?php
include("connection.php");

session_start();
$email = $_SESSION["email"];
if(!isset($_SESSION["email"]))
{

     header("location:home.php?action=login");


}
$sql = "SELECT * FROM users where email = '$email';";
$result = mysqli_query($db,$sql);
$row = $result->fetch_assoc();




?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Assignment 2</title>
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <div class="container py5">
<div class="col-xs-12" style="height:100px;">
  <h1 align="center">Assignment 2</h1>
</div>
        <div class="row">
            <div class="col-md-5  toppad  pull-right col-md-offset-3 ">


                <A href="logout.php">Logout</A>
                <br>
                <!-- <p class=" text-info">May 05,2014,03:00 pm </p> -->
                <?php
                date_default_timezone_set('Asia/Dhaka');

                $timestamp = time();
                $date_time = date("d-m-Y (D) H:i:s", $timestamp);


                echo '<p class=" text-info">'.$date_time.',</p>';

                 ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/avatar.png" class="img-circle img-responsive" width="100" height="100"> </div>

                            <div class=" col-md-9 col-lg-9 ">

                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>First Name</td>
                                            <td><?php echo $row['first_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td><?php echo $row['last_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>SSN</td>
                                            <td><?php echo $row['ssn']; ?></td>
                                        </tr>

                                        <tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php echo $row['gender']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Email</td>
                                                <td><a href="mailto:info@support.com"><?php echo $email; ?></a></td>
                                            </tr>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>





</body>

</html>
