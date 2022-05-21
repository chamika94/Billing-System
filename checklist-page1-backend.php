<?php

include 'db.php';


$date = date('Y-m-d');
$year = date("Y",strtotime($date));
$month = date("m",strtotime($date));
$day = date("d",strtotime($date));


//page1
   $token = $_POST['token'];

   $cid = $_POST['cid'];
   $vid = $_POST['vid'];

   $ctime = $_POST['ctime'];
   $cdate = $_POST['cdate'];
   $cmeter = $_POST['cmeter'];
   
   $vtime = $_POST['vtime'];
   $vdate = $_POST['vdate'];
   $vmeter = $_POST['vmeter'];


   $task1 = $_POST['task1'];
   $task2 = $_POST['task2'];
   $task3 = $_POST['task3'];
   $task4 = $_POST['task4'];
   $task5 = $_POST['task5'];
   $task6 = $_POST['task6'];
   $task7 = $_POST['task7'];
   $task8 = $_POST['task8'];
   $task9 = $_POST['task9'];
   $task10 = $_POST['task10'];

   if($_FILES['img1']['name']){

    move_uploaded_file($_FILES['img1']['tmp_name'], "image/".$_FILES['img1']['name']);

    $img1 = "image/".$_FILES['img1']['name'];

    }else{
      $img1="Empty image";
    } 

    if($_FILES['img2']['name']){

      move_uploaded_file($_FILES['img2']['tmp_name'], "image/".$_FILES['img2']['name']);
  
      $img2 = "image/".$_FILES['img2']['name'];
    
      }else{
        $img2="Empty image";
      }

    if($_FILES['img3']['name']){

      move_uploaded_file($_FILES['img3']['tmp_name'], "image/".$_FILES['img3']['name']);
  
      $img3 = "image/".$_FILES['img3']['name'];
  
      } else{
        $img3="Empty image";
      }    
      
      

  if($cid!=""&&$vid!=""){
            $query = "INSERT INTO `checklist_page1`(
            `cid`, `vid`,`ctime`,`cdate`,`cmeter`,`vtime`,`vdate`,`vmeter`,`img1`,`img2`,`img3`,`created_date`,`token`)

            VALUES (
            '$cid', '$vid','$ctime','$cdate','$cmeter','$vtime','$vdate','$vmeter','$img1','$img2','$img3','$date','$token')";

            $result = mysqli_query($con , $query);

            $task = array($task1,$task2,$task3,$task4,$task5,$task6,$task7,$task8,$task9,$task10);

            for($i=0;$i<10;$i++){

            if($task[$i]!=""&&$task[$i]!="Empty image"){
                $query1="INSERT INTO `checklist_task`(`task`,`cid`,`vid`,`created_date`,`token`) VALUE('$task[$i]','$cid','$vid','$date','$token')";
                $result1 = mysqli_query($con , $query1);
            }

            }
            

  }

 

  // header('Location: add-customer.php?status=done');
   
   