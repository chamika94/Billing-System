<?php
include 'db.php';
$name = $_POST['name'];

//Check for connection error
if($con->connect_error){
  die("Error in DB connection: ".$con->connect_errno." : ".$con->connect_error);    
}
if (isset($name)) {
    $select  = " SELECT * FROM customer WHERE email = '$name'";
    $result = $con->query($select);
    
    while($row = $result->fetch_object()){
        echo '<div class="form-group">'
            .'<input type="input" class="form-control" value="'.$row->name.'" placeholder="Name" name="u_name" id="u_name" />'
            .'<span id="check-e"></span>'
            .'</div>'
            .'<div class="form-group">'
            .'<input type="email" class="form-control" value="'.$row->email.'" placeholder="Email address" name="u_email" id="u_email" />'
            .'<span id="check-e"></span>'
            .'</div>';


    }
    
}     
?>

                           