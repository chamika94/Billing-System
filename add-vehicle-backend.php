

   <?php

include 'db.php';

$vin = $_POST['vin'];
$rego = $_POST['rego'];
$make = $_POST['make'];
$model = $_POST['modal'];
$engine = $_POST['eng'];
$gear = $_POST['gear'];
$paint = $_POST['paint'];
$date = date('Y-m-d');
  if ($vin!=""){

    $vin_value = mysqli_real_escape_string($con, $vin);
    $query = "SELECT * FROM vehicle WHERE vin = '{$vin_value}' LIMIT 1";

    $result_set = mysqli_query($con, $query);

                      if($result_set){
                            if(mysqli_num_rows($result_set)==1){
                              $errors[]='Vin address already exists';
                            }
                            if(empty($errors)){
                              $vin_of = mysqli_real_escape_string($con, $vin);
                              $rego_of = mysqli_real_escape_string($con, $rego);
                              $make_of = mysqli_real_escape_string($con, $make);
                              $modal_of = mysqli_real_escape_string($con, $model);
                              $engine_of = mysqli_real_escape_string($con, $engine);
                              $gear_of = mysqli_real_escape_string($con, $gear);
                              $paint_of = mysqli_real_escape_string($con, $paint);

                              $query = "INSERT INTO `vehicle`(`vin`, `rego`, `make`, `model`,`eng`,`gear`,`paint`,`created_date`) VALUES ('$vin_of', '$rego_of', '$make_of', '$modal_of', '$engine_of', '$gear_of', '$paint_of','$date')";
                              $result = mysqli_query($con , $query);

                              echo '<div id="customer"class="alert alert-success" role="alert">Vehicle Added Successfully.!</div>';
                            }else{
                              echo '<div id="customer"class="alert alert-danger" role="alert">This Vehicle already exists.!</div>';
                            }

                      }
   
   
   }else{
   // print "Opps.. Something wrongs !";
    echo '<div id="customer"class="alert alert-danger" role="alert">Please Enter Vin.!</div>';

   }
   

?>


