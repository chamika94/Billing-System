<?php

include 'db.php';

$input_value = $_POST['input_value'];
$data_value = $_POST['data_value'];
$date = date('Y-m-d');

if(!empty($input_value)){
 
       if($data_value=="description"){
        $query = "INSERT INTO `description`(`description`, `added_date`) VALUES ('$input_value', '$date')";
        $result = mysqli_query($con , $query);
        echo '<div id="customer"class="alert alert-success" role="alert">Description Added Successfully.!</div>';

       }
       if($data_value=="partNo"){
        $query = "INSERT INTO `partno`(`partNo`,`added_date`) VALUES ('$input_value','$date')";
        $result = mysqli_query($con , $query);
        echo '<div id="customer"class="alert alert-success" role="alert">Part No Added Successfully.!</div>';

       }
       if($data_value=="task"){
              $query = "INSERT INTO `admin_task`(`task`,`created_date`) VALUES ('$input_value','$date')";
              $result = mysqli_query($con , $query);
              echo '<div id="customer"class="alert alert-success" role="alert">Task Added Successfully.!</div>';
      
             }
       
}else{
   // print "Opps.. Something wrongs !";
       echo '<div id="customer"class="alert alert-danger" role="alert">Please Enter Value..!</div>';

}
   

?>


