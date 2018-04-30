<?php
include("connection.php");

session_start();
$email = $_SESSION["email"];
if(!isset($_SESSION["email"]))
{

     header("location:addproduct.php?action=login");


}
if (isset($_POST['submit'])) {


    $productname = $db->real_escape_string($_POST['productname']);
    $productdetails = $db->real_escape_string($_POST['productdetails']);
    $productid = $db->real_escape_string($_POST['productid']);
    $productcategory = $_POST['productid'];
    $target_dir = "/var/www/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {

        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }



    // $sql = "INSERT INTO product(product_name,product_details,product_category,product_img_location) values ('$productname','$productdetails','$productcategory','n/a')";
    // if ($db->query($sql) === true) {
    //   $_SESSION['message']= "Registration Successful.";
    //   // header("location: login.php");
    // }else {
    //   $_SESSION['message']= "user could not be added to database";
    // }






}







?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add Product | Sarker Tech</title>
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <div class="container py-5">


        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text" >
                            <h1><strong>Sarker Tech</strong> </h1>
                            <div class="description">
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
                        </div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Add Product</h3>
                            		<p>Fill in the form below to insert Product:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">

			                    <form role="form" action="addproduct.php" method="post" class="registration-form" enctype="multipart/form-data">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="productname">Product name</label>
			                        	<input type="text" name="productname" placeholder="Product name..." class="form-first-name form-control" id="form-product-name"  required >
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="productdetails">Product details</label>
			                        	<input type="text" name="productdetails" placeholder="Product details..." class="form-last-name form-control" id="form-product-details" required >
			                        </div>

                              <div class="form-group">
                                <label class="sr-only" for="productid">Product ID</label>
                                <input type="text" name="productid" placeholder="Product ID..." class="form-user-id form-control" id="form-product-id"  required>
                              </div>

                              <div class="form-group">
                                <!-- <label class="mr-sm-2" for="inlineFormCustomSelect">Gender</label> -->
                                  <select class="custom-select mr-sm-2" name="productcategory" id="inlineFormCustomSelect">

                                    <option value="led">LYNX LED Lighting</option>
                                    <option value="circuitbreaker">Circuit Breaker</option>
                                    <option value="cables">Communication cables & LAN cables</option>
                                  </select>

                              </div>
                              <div class="form-group">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                              </div>



			                      <input type="submit" name="submit" value="upload" class="btn btn-block btn-primary">

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




</body>

</html>
