<?php

include 'db.php';

$cid = $_POST['cid'];
$vid = $_POST['vid'];
//$date = $_GET['date'];
$token = $_POST['token'];


$sql1 = "DELETE FROM `checklist_page1` WHERE cid='$cid' and vid='$vid' and token='$token'";
$result1 = mysqli_query($con , $sql1);

$sql2 = "DELETE FROM `checklist_task` WHERE cid='$cid' and vid='$vid' and token='$token' ";
$result2 = mysqli_query($con , $sql2);

//$sql1 = "DELETE FROM `description` WHERE id = '$id'";
//$result1 = mysqli_query($con , $sql1);

//$sql1 = "DELETE FROM `description` WHERE id = '$id'";
//$result1 = mysqli_query($con , $sql1);

//header('Location: pre-checklist.php?product_deleted')

?>