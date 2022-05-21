<?php
include 'db.php';
$name = $_POST['name'];

//Check for connection error
if($con->connect_error){
  die("Error in DB connection: ".$con->connect_errno." : ".$con->connect_error);    
}
if (isset($name)) {
    $select  = " SELECT * FROM vehicle WHERE vin = '$name'";
    $result = $con->query($select);
    
    while($row = $result->fetch_object()){
        echo '<input type="hidden"name="vid" id="vid" value="'.$row->vvid.'"></input>'
            .'<div class="table-responsive"><table class="table table-bordered"><tr><th>Vin</th><th>Rego</th><th>Make</th><th>Modal</th></tr><tr><td>'.$row->vin.'</td><td>'.$row->rego.'</td><td>'.$row->make.'</td><td>'.$row->model.'</td></tr></table></div>'
            .'<div class="table-responsive"><table class="table table-bordered"><tr><th>Engine</th><th>Gear</th><th>Paint</th></tr><tr><td>'.$row->eng.'</td><td>'.$row->gear.'</td><td>'.$row->paint.'</td></tr></table></div>'
            ;
    }
    
}     
?>
