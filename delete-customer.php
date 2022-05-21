<?php

include 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM `customer` WHERE ccid = '$id'";
$result = mysqli_query($con , $sql);

//header('Location: product-list.php?product_deleted')

?>