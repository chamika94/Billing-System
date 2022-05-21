<?php

include 'db.php';


$date = date('Y-m-d');
$year = date("Y",strtotime($date));
$month = date("m",strtotime($date));
$day = date("d",strtotime($date));

$token = $_POST['token_copy'];
$cid = $_POST['cid_copy'];
$vid = $_POST['vid_copy'];

//page2

  $page2_1 = $_POST['page2_1'];
  $page2_2 = $_POST['page2_2'];
  $page2_3 = $_POST['page2_3'];
  $page2_4 = $_POST['page2_4'];
  $page2_5 = $_POST['page2_5'];
  $page2_6 = $_POST['page2_6'];
  $page2_7 = $_POST['page2_7'];
  $page2_8 = $_POST['page2_8'];
  $page2_9 = $_POST['page2_9'];
  $page2_10 = $_POST['page2_10'];
  $page2_11 = $_POST['page2_11'];
  $page2_12 = $_POST['page2_12'];
  $page2_13 = $_POST['page2_13'];
  $page2_14 = $_POST['page2_14'];

//page3
$blf = $_POST['blf'];
$blb = $_POST['blb'];
$brf = $_POST['brf'];
$brb = $_POST['brb'];

$blfinfo = $_POST['blfinfo'];
$blbinfo = $_POST['blbinfo'];
$brfinfo = $_POST['brfinfo'];
$brbinfo = $_POST['brbinfo'];

$tlf = $_POST['tlf'];
$tlb = $_POST['tlb'];
$trf = $_POST['trf'];
$trb = $_POST['trb'];

$tlfinfo = $_POST['tlfinfo'];
$tlbinfo = $_POST['tlbinfo'];
$trfinfo = $_POST['trfinfo'];
$trbinfo = $_POST['trbinfo'];

//page4
$page4_1 = $_POST['page4_1'];
$page4_2 = $_POST['page4_2'];
$page4_3 = $_POST['page4_3'];
$page4_4 = $_POST['page4_4'];
$page4_5 = $_POST['page4_5'];
$page4_6 = $_POST['page4_6'];
$page4_7 = $_POST['page4_7'];
$page4_8 = $_POST['page4_8'];
$page4_9 = $_POST['page4_9'];
$page4_10 = $_POST['page4_10'];
$page4_11 = $_POST['page4_11'];
$page4_12 = $_POST['page4_12'];
$page4_13 = $_POST['page4_13'];
$page4_14 = $_POST['page4_14'];
$page4_15 = $_POST['page4_15'];

$page4_1info = $_POST['page4_1info'];
$page4_2info = $_POST['page4_2info'];
$page4_3info = $_POST['page4_3info'];
$page4_4info = $_POST['page4_4info'];
$page4_5info = $_POST['page4_5info'];
$page4_6info = $_POST['page4_6info'];
$page4_7info = $_POST['page4_7info'];
$page4_8info = $_POST['page4_8info'];
$page4_9info = $_POST['page4_9info'];
$page4_10info = $_POST['page4_10info'];
$page4_11info = $_POST['page4_11info'];
$page4_12info = $_POST['page4_12info'];
$page4_13info = $_POST['page4_13info'];
$page4_14info = $_POST['page4_14info'];
$page4_15info = $_POST['page4_15info'];

$page4_13header = $_POST['page4_13header'];
$page4_14header = $_POST['page4_14header'];
$page4_15header = $_POST['page4_15header'];




   $query = "INSERT INTO `checklist`(
   `cid`, `vid`,
   `page2_1`,`page2_2`,`page2_3`,`page2_4`,`page2_5`,`page2_6`,`page2_7`,`page2_8`,`page2_9`,`page2_10`,
   `page2_11`,`page2_12`,`page2_13`,`page2_14`,`blf`,`blb`,`brf`,`brb`,`blfinfo`,`blbinfo`,`brfinfo`,
   `brbinfo`,`tlf`,`tlb`,`trf`,`trb`,`tlfinfo`,`tlbinfo`,`trfinfo`,`trbinfo`,`page4_1`,`page4_2`,`page4_3`,
   `page4_4`,`page4_5`,`page4_6`,`page4_7`,`page4_8`,`page4_9`,`page4_10`,`page4_11`,`page4_12`,`page4_13`,
   `page4_14`,`page4_15`,`page4_1info`,`page4_2info`,`page4_3info`,`page4_4info`,`page4_5info`,`page4_6info`,
   `page4_7info`,`page4_8info`,`page4_9info`,`page4_10info`,`page4_11info`,`page4_12info`,`page4_13info`,
   `page4_14info`,`page4_15info`,`page4_13header`,`page4_14header`,`page4_15header`,`year`,`month`,`day`,`created_date`,`token`)


   VALUES (
   '$cid', '$vid',
   '$page2_1','$page2_2','$page2_3','$page2_4','$page2_5','$page2_6','$page2_7','$page2_8','$page2_9',
   '$page2_10','$page2_11','$page2_12','$page2_13','$page2_14','$blf','$blb','$brf','$brb','$blfinfo',
   '$blbinfo','$brfinfo','$brbinfo','$tlf','$tlb','$trf','$trb','$tlfinfo','$tlbinfo','$trfinfo','$trbinfo',
   '$page4_1','$page4_2','$page4_3','$page4_4','$page4_5','$page4_6','$page4_7','$page4_8','$page4_9',
   '$page4_10','$page4_11','$page4_12','$page4_13','$page4_14','$page4_15', '$page4_1info','$page4_2info',
   '$page4_3info','$page4_4info','$page4_5info','$page4_6info','$page4_7info','$page4_8info','$page4_9info',
   '$page4_10info','$page4_11info','$page4_12info','$page4_13info','$page4_14info','$page4_15info',
   '$page4_13header','$page4_14header','$page4_15header','$year','$month','$day','$date','$token')";

   $result = mysqli_query($con , $query);



 echo '<div class="row">'    
 .' <div class="col-sm-12">'
      .' <div class="col-sm-12">'
                  .' <div id="customer"class="alert alert-success" role="alert"style="height:100px;">'
                      .' <h3 style=" color:green;">CheckList Added Successfully!</h3>'
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
          .' <a style="margin-left:-100px;"class="btn btn-info btn-sm vehicle login modal-form" onClick="" href="checklist.php">Back To New</a>'
          .' <a class="btn btn-success btn-sm login modal-form" data-target="" data-toggle="" onClick="" id="view" href="checklist-view.php?cid='.$cid.'&vid='.$vid.'&date='.$date.'&token='.$token.'"> view</a>'
          .' <a class="btn btn-danger btn-sm login modal-form" data-target="" data-toggle="" onClick="" id="view" href="download-checklist.php?cid='.$cid.'&vid='.$vid.'&date='.$date.'&token='.$token.'"> Download</a>'
         .' </div>'
    .'</div>'
.'</div>'
;


  // header('Location: add-customer.php?status=done');
   
   