<?php

include 'db.php';

$cid = $_GET['cid'];
$vid = $_GET['vid'];
$date = $_GET['date'];
$token = $_GET['token'];


$sql1 = "DELETE FROM `invoice` WHERE cid='$cid' and vid='$vid' and token='$token' and created_date = '$date'";
$result1 = mysqli_query($con , $sql1);

$sql2 = "DELETE FROM `useritem` WHERE cid='$cid' and vid='$vid' and token='$token' and created_date = '$date'";
$result2 = mysqli_query($con , $sql2);

//$sql1 = "DELETE FROM `description` WHERE id = '$id'";
//$result1 = mysqli_query($con , $sql1);

//$sql1 = "DELETE FROM `description` WHERE id = '$id'";
//$result1 = mysqli_query($con , $sql1);

header('Location: pre-invoice.php?product_deleted')

?>