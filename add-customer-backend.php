<?php

include 'db.php';

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$home = $_POST['home'];
$office = $_POST['office'];
$date = date('Y-m-d');
  if ($email!=""){

    $email_value = mysqli_real_escape_string($con, $email);
    $query = "SELECT * FROM customer WHERE email = '{$email_value}' LIMIT 1";

    $result_set = mysqli_query($con, $query);

                      if($result_set){
                            if(mysqli_num_rows($result_set)==1){
                              $errors[]='Email address already exists';
                            }
                            if(empty($errors)){
                              $name_of = mysqli_real_escape_string($con, $name);
                              $address = mysqli_real_escape_string($con, $address);
                              $email_of = mysqli_real_escape_string($con, $email);
                              $mobile = mysqli_real_escape_string($con, $mobile);
                              $home = mysqli_real_escape_string($con, $home);
                              $office = mysqli_real_escape_string($con, $office);

                              $query = "INSERT INTO `customer`(`name`, `address`, `email`, `mobile`,`home`,`office`,`created_date`) VALUES ('$name', '$address', '$email', '$mobile', '$home', '$office', '$date')";
                              $result = mysqli_query($con , $query);

                              echo '<div id="customer"class="alert alert-success" role="alert">Customer Added Successfully.!</div>';
                            }else{
                              echo '<div id="customer"class="alert alert-danger" role="alert">This Customer already exists.!</div>';
                            }

                      }
   
   
   }else{
   // print "Opps.. Something wrongs !";
    echo '<div id="customer"class="alert alert-danger" role="alert">Please enter Email.!</div>';

   }
   

?>


