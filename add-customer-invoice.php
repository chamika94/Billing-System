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
        echo '<input type="hidden"name="cid" id="cid" value="'.$row->ccid.'"></input>'
            .'<div class="table-responsive"><table class="table table-bordered"><tr><th>Mobile</th><th>Home</th><th>Office</th></tr><tr><td>'.$row->mobile.'</td><td>'.$row->home.'</td><td>'.$row->office.'</td></tr></table></div>'
            .'<div class="table-responsive"><table class="table table-bordered"><tr><th>Name</th><td>'.$row->name.'</td></tr></table></div>'
            .'<div class="table-responsive"><table class="table table-bordered"><tr><th>Email</th><td>'.$row->email.'</td></tr></table></div>'
            .'<div class="table-responsive"><table class="table table-bordered"><tr><th>Address</th><td>'.$row->address.'</td></tr></table></div>'
            ;
    }
    
}     
?>
