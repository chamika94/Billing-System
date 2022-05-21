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

  // $date = date('Y-m-d', strtotime('2018-05-20 00:00:00.000'));


   $query="INSERT INTO `summary_report`(`ctime`,`cdate`,`cmeter`,`vtime`,`vdate`,`vmeter`,`cid`,`vid`,`day`,`month`,`year`,`created_date`,`token`) VALUE('$ctime','$cdate','$cmeter','$vtime','$vdate','$vmeter','$cid','$vid','$day','$month','$year','$date','$token')";
   $result = mysqli_query($con , $query);

 //====================================================================================================  
   if($_FILES['img1']['name']){

    move_uploaded_file($_FILES['img1']['tmp_name'], "image/".$_FILES['img1']['name']);

    $img1 = "image/".$_FILES['img1']['name'];

    }else{
      $img1="Empty image";
    } 
//======================================================================================================
    if($_FILES['img2']['name']){

      move_uploaded_file($_FILES['img2']['tmp_name'], "image/".$_FILES['img2']['name']);
  
      $img2 = "image/".$_FILES['img2']['name'];
    
      }else{
        $img2="Empty image";
      }
//========================================================================================================
    if($_FILES['img3']['name']){

      move_uploaded_file($_FILES['img3']['tmp_name'], "image/".$_FILES['img3']['name']);
  
      $img3 = "image/".$_FILES['img3']['name'];
  
      } else{
        $img3="Empty image";
      }     
  //=======================================================================================================
  if($_FILES['img4']['name']){

    move_uploaded_file($_FILES['img4']['tmp_name'], "image/".$_FILES['img4']['name']);

    $img4 = "image/".$_FILES['img4']['name'];

    }else{
      $img4="Empty image";
    } 
//======================================================================================================

if($_FILES['img5']['name']){

    move_uploaded_file($_FILES['img5']['tmp_name'], "image/".$_FILES['img5']['name']);

    $img5 = "image/".$_FILES['img5']['name'];

    }else{
      $img5="Empty image";
    } 
//======================================================================================================
if($_FILES['img6']['name']){

    move_uploaded_file($_FILES['img6']['tmp_name'], "image/".$_FILES['img6']['name']);

    $img6 = "image/".$_FILES['img6']['name'];

    }else{
      $img6="Empty image";
    } 
//======================================================================================================
if($_FILES['img7']['name']){

    move_uploaded_file($_FILES['img7']['tmp_name'], "image/".$_FILES['img7']['name']);

    $img7 = "image/".$_FILES['img7']['name'];

    }else{
      $img7="Empty image";
    } 
//======================================================================================================
if($_FILES['img8']['name']){

    move_uploaded_file($_FILES['img8']['tmp_name'], "image/".$_FILES['img8']['name']);

    $img8 = "image/".$_FILES['img8']['name'];

    }else{
      $img8="Empty image";
    } 
//======================================================================================================
if($_FILES['img9']['name']){

    move_uploaded_file($_FILES['img9']['tmp_name'], "image/".$_FILES['img9']['name']);

    $img9 = "image/".$_FILES['img9']['name'];

    }else{
      $img9="Empty image";
    } 
//======================================================================================================
if($_FILES['img10']['name']){

    move_uploaded_file($_FILES['img10']['tmp_name'], "image/".$_FILES['img10']['name']);

    $img10 = "image/".$_FILES['img10']['name'];

    }else{
      $img10="Empty image";
    } 
//======================================================================================================
if($_FILES['img11']['name']){

    move_uploaded_file($_FILES['img11']['tmp_name'], "image/".$_FILES['img11']['name']);

    $img11 = "image/".$_FILES['img11']['name'];

    }else{
      $img11="Empty image";
    } 
//======================================================================================================
if($_FILES['img12']['name']){

    move_uploaded_file($_FILES['img12']['tmp_name'], "image/".$_FILES['img12']['name']);

    $img12 = "image/".$_FILES['img12']['name'];

    }else{
      $img12="Empty image";
    } 
//======================================================================================================
if($_FILES['img13']['name']){

    move_uploaded_file($_FILES['img13']['tmp_name'], "image/".$_FILES['img13']['name']);

    $img13 = "image/".$_FILES['img13']['name'];

    }else{
      $img13="Empty image";
    } 
//======================================================================================================
if($_FILES['img14']['name']){

    move_uploaded_file($_FILES['img14']['tmp_name'], "image/".$_FILES['img14']['name']);

    $img14 = "image/".$_FILES['img14']['name'];

    }else{
      $img14="Empty image";
    } 
//======================================================================================================
if($_FILES['img15']['name']){

    move_uploaded_file($_FILES['img15']['tmp_name'], "image/".$_FILES['img15']['name']);

    $img15 = "image/".$_FILES['img15']['name'];

    }else{
      $img15="Empty image";
    } 
//======================================================================================================

$title1 = $_POST['title1'];
$title2 = $_POST['title2'];
$title3 = $_POST['title3'];
$title4 = $_POST['title4'];
$title5 = $_POST['title5'];
$title6 = $_POST['title6'];
$title7 = $_POST['title7'];
$title8 = $_POST['title8'];
$title9 = $_POST['title9'];
$title10 = $_POST['title10'];
$title11 = $_POST['title11'];
$title12 = $_POST['title12'];
$title13 = $_POST['title13'];
$title14 = $_POST['title14'];
$title15 = $_POST['title15'];


$info1 = $_POST['info1'];
$info2 = $_POST['info2'];
$info3 = $_POST['info3'];
$info4 = $_POST['info4'];
$info5 = $_POST['info5'];
$info6 = $_POST['info6'];
$info7 = $_POST['info7'];
$info8 = $_POST['info8'];
$info9 = $_POST['info9'];
$info10 = $_POST['info10'];
$info11 = $_POST['info11'];
$info12 = $_POST['info12'];
$info13 = $_POST['info13'];
$info14 = $_POST['info14'];
$info15 = $_POST['info15'];


$comment1 = $_POST['comment1'];
$comment2 = $_POST['comment2'];
$comment3 = $_POST['comment3'];
$comment4 = $_POST['comment4'];
$comment5 = $_POST['comment5'];
$comment6 = $_POST['comment6'];
$comment7 = $_POST['comment7'];
$comment8 = $_POST['comment8'];
$comment9 = $_POST['comment9'];
$comment10 = $_POST['comment10'];
$comment11 = $_POST['comment11'];
$comment12 = $_POST['comment12'];
$comment13 = $_POST['comment13'];
$comment14 = $_POST['comment14'];
$comment15 = $_POST['comment15'];



$image = array($img1,$img2,$img3,$img4,$img5,$img5,$img7,$img7,$img9,$img10,$img11,$img12,$img13,$img14,$img15);
$title = array($title1,$title2,$title3,$title4,$title5,$title6,$title7,$title8,$title9,$title10,$title11,$title12,$title13,$title14,$title15);
$info =array($info1,$info2,$info3,$info4,$info5,$info6,$info7,$info8,$info9,$info10,$info11,$info12,$info13,$info14,$info15);
$comment =array($comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$comment7,$comment8,$comment9,$comment10,$comment11,$comment12,$comment13,$comment14,$comment15);

for($i=0;$i<15;$i++){
    if($title[$i]!=""){
    $query1="INSERT INTO `summary_task`(`title`,`info`,`comment`,`images`,`cid`,`vid`,`created_date`,`token`) VALUE('$title[$i]','$info[$i]','$comment[$i]','$image[$i]','$cid','$vid','$date','$token')";
    $result1 = mysqli_query($con , $query1);
    }
}
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
$task11 = $_POST['task11'];
$task12 = $_POST['task12'];
$task13 = $_POST['task13'];
$task14 = $_POST['task14'];
$task15 = $_POST['task15'];

$task = array($task1,$task2,$task3,$task4,$task5,$task6,$task7,$task8,$task9,$task10,$task11,$task12,$task13,$task14,$task15);

for($i=0;$i<10;$i++){

if($task[$i]!=""){
 $query2="INSERT INTO `summary_task_page1`(`task`,`cid`,`vid`,`created_date`,`token`) VALUE('$task[$i]','$cid','$vid','$date','$token')";
 $result2 = mysqli_query($con , $query2);
}
}
echo '<div class="row">'    
.' <div class="col-sm-12">'
     .' <div class="col-sm-12">'
                 .' <div id="customer"class="alert alert-success" role="alert"style="height:100px;">'
                     .' <h3 style=" color:green;">Summary Report Added Successfully!</h3>'
                     .'<input type="hidden"name="" id="cid" value="'.$cid.'"></input>'
                     .'<input type="hidden"name="" id="vid" value="'.$vid.'"></input>'
                     .'<input type="hidden"name="" id="date" value="'.$date.'"></input>'
                  .' </div>' 
         .' </div>'
 .' </div> '    
.'</div>'
.'<div class="row">'
  .'<div class="col-sm-12">'
         .'<div class="modal-footer">'
         .' <a style="margin-left:-100px;"class="btn btn-info btn-sm vehicle login modal-form" onClick="" href="summaryreport.php">Back To New</a>'
         .' <a class="btn btn-success btn-sm login modal-form" data-target="" data-toggle="" onClick="" id="view" href="summaryreport-view.php?cid='.$cid.'&vid='.$vid.'&date='.$date.'&token='.$token.'"> view</a>'
         .' <a class="btn btn-danger btn-sm login modal-form" data-target="" data-toggle="" onClick="" id="view" href="download-summaryreport.php?cid='.$cid.'&vid='.$vid.'&date='.$date.'&token='.$token.'"> Download</a>'
        .' </div>'
   .'</div>'
.'</div>'
;

   //$query = "INSERT INTO `checklist`(
   //`cid`, `vid`,`ctime`,`cdate`,`cmeter`,`vtime`,`vdate`,`vmeter`,`img1`,`img2`,`img3`)


   //VALUES (
   //'$cid', '$vid','$ctime','$cdate','$cmeter','$vtime','$vdate','$vmeter','$img1','$img2','$img3')";

   //$result = mysqli_query($con , $query);

/*
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

   $task = array($task1,$task2,$task3,$task4,$task5,$task6,$task7,$task8,$task9,$task10);

 for($i=0;$i<10;$i++){

  if($task[$i]!=""){
    $query1="INSERT INTO `task`(`task`,`cid`,`vid`,`created_date`) VALUE('$task[$i]','$cid','$vid','$date')";
    $result1 = mysqli_query($con , $query1);
  }

 }*/
   
  // header('Location: add-customer.php?status=done');
   
   