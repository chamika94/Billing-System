<?php
include 'db.php';
$cid =$_GET["cid"];
$vid =$_GET["vid"];
$date =$_GET["date"];
$token =$_GET["token"];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> CHECKLIST TO PDF</title>
	<script src="js/jquery.min.js"></script>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <!--<link href="css/style.css" rel="stylesheet" >-->
  <style>
    /* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

body { box-sizing: border-box; height: auto; margin: 0 auto; overflow: show; padding: 0.5in; width: 7.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #e40101; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 95%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
article address.norm h4 {
    font-size: 125%;
    font-weight: bold;
}
article address.norm { float: left; font-size: 95%; font-style: normal; font-weight: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
table.meta1{ margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta,table.meta, table.balance { float: right; width: 48%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

table.meta1,table.meta1, table.balance1 { float: left; width: 48%; }
table.meta1:after, table.balance1:after { clear: both; content: ""; display: table; }

table.meta1,table.meta1 { float: left; width: 48%; }
table.meta1:after  { clear: both; content: ""; display: table; }

table.meta2,table.meta2 { float: left; width: 100%; }
table.meta1:after  { clear: both; content: ""; display: table; }
/* table meta */

table.meta th { width: 30%; }
table.meta td { width: 70%; }

table.meta1 th { width: 17%; }
table.meta1 td { width: 83%; }

table.meta2 th { width: 30%; }
table.meta2 td { width: 70%; }
/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th:first-child {
    width:240px;
}
table.inventory th:nth-child(2) {
    width:240px;
}
table.inventory th:nth-child(3) {
    width:130px;
}
table.inventory th:nth-child(4) {
    width:100px;
}
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

table.balance1 th, table.balance1 td { width: 50%; }
table.balance1 td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

table.sign {
    float: left;
    width: 220px;
}
table.sign img {
    width: 100%;
}
table.sign tr td {
    border-color: transparent;
}
@media print {
    * { -webkit-print-color-adjust: exact; }
    html { background: none; padding: 0; }
    body { box-shadow: none; margin: 0; }
    span:empty { display: none; }
    .add, .cut { display: none; }
}

@page { margin: 0; }
  </style>
</head>
<body>



<div id="invoice">

<header >
<h1>CHECKLIST SERVICE</h1>
<span><img alt="it" src="images/logo.jpeg" width="270"></span>
      <address >
      <h4>VOX AUTO</h4>
        <p> Vist : www.voxauto.com.au </p>
        <p> Email : Ken@voxauto.com.au </p>
        <p> ABN : 16965664460</p>
        <p> Trade : AUR30316</p>
        <p> Dealer License : 4189586</p>
        <p> ASI number - 11559</p>
        <p> Examiner - 4189586</p>
        <p> 64,jijaws street Sumner park 4074, OLD -
            <B>0401044996</B> </p>
      </address>
     
    </header>
   
    

    <!--<a  href="javascript:void(0)" class="btn-download">Download PDF  </a>-->
 
  <?php
 
  $select2  = " SELECT * FROM vehicle WHERE vvid = '$vid'";
  $result2 = mysqli_query($con,$select2);
  
  while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){


  ?>    
  <div class="row">
  <div class="col-lg-12" style="margin-top:-55px"> 
  
  <div class="page-header">  <h1><span >Customer & Vehicle</span></h1> </div>
      <table class="meta">
        <tr>
          <th><span >Vin</span></th>
          <td><span ><?php echo $row2["vin"]; ?></span></td>
        </tr>
        <tr>
          <th><span >Rego</span></th>
          <td><span ><?php echo $row2["rego"]; ?></span></td>
        </tr>
        <tr>
          <th><span >Make</span></th>
          <td><span id="prefix" >$</span><span><?php echo $row2["make"]; ?></span></td>
        </tr>
        <tr>
          <th><span >Modal</span></th>
          <td><span ><?php echo $row2["model"]; ?></span></td>
        </tr>
        <tr>
          <th><span >Engine</span></th>
          <td><span ><?php echo $row2["eng"]; ?> </span></td>
        </tr>
        <tr>
          <th><span >Gear</span></th>
          <td><span id="prefix" >$</span><span><?php echo $row2["gear"]; ?></span></td>
        </tr>  
        <tr>
          <th><span >Paint</span></th>
          <td><span id="prefix" >$</span><span><?php echo $row2["paint"]; ?></span></td>
        </tr>      
      </table>

<?php
  }

    $select1  = " SELECT * FROM customer WHERE ccid = '$cid'";
    $result1 = mysqli_query($con,$select1);
    while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
?>
    
      
      <table class="meta1">
        <tr>
          <th><span >Name</span></th>
          <td><span ><?php echo $row1["name"]; ?></span></td>
        </tr>  
        <tr>
          <th><span >Email</span></th>
          <td><span ><?php echo $row1["email"]; ?></span></td>
        </tr> 
        <tr>
          <th><span >Address</span></th>
          <td><span ><?php echo $row1["address"]; ?></span></td>
        </tr>                         
        <tr>
          <th><span >Mobile</span></th>
          <td><span ><?php echo $row1["mobile"]; ?></span></td>
        </tr>
        <tr>
          <th><span >Home</span></th>
          <td><span ><?php echo $row1["home"]; ?></span></td>
        </tr>
        <tr>
          <th><span >Office</span></th>
          <td><span ><?php echo $row1["office"]; ?></span></td>
        </tr>        

      </table>

       </div>
  
    </div>

<?php
 }
    $select0  = " SELECT * FROM checklist_page1 WHERE cid = '$cid' and vid = '$vid' and created_date = '$date' and token = '$token'";
    $result0 = mysqli_query($con,$select0);
    while($row0 = mysqli_fetch_array($result0,MYSQLI_ASSOC)){

 ?>   
 
 <div class="row">
     
        <div class="col-sm-6">
          <table class="">
            <tr>
              <th><span >Time-IN</span></th>
              <td><span data-prefix></span><span><?php echo $row0["ctime"]; ?></span></td>
            </tr>
            <tr>
              <th><span >Date-IN</span></th>
              <td><span data-prefix></span><span><?php echo $row0["cdate"]; ?></span></td>
            </tr>     
            <tr>
              <th><span >OdoMeter</span></th>
              <td><span data-prefix></span><span><?php echo $row0["cmeter"]; ?></span></td>
            </tr>              
          </table>
         
          </div>
          <div class="col-sm-6">

          
          <table class="">
            <tr>
              <th><span >Time-OUT</span></th>
              <td><span data-prefix></span><span><?php echo $row0["vtime"]; ?></span></td>
            </tr>
            <tr>
              <th><span >Date-OUT</span></th>
              <td><span data-prefix></span><span><?php echo $row0["vdate"]; ?></span></td>
            </tr>     
            <tr>
              <th><span >OdoMeter</span></th>
              <td><span data-prefix></span><span><?php echo $row0["vmeter"]; ?></span></td>
            </tr>              
          </table>
    </div>

</div><br>


    <div class="row"> 
    
    <div class="col-lg-12"> 
    <table  style="background-color:#999">
      <tr>
        <td>
        <div class="col-sm-4">
        <img src="<?php echo $row0["img1"]; ?>" style="width: 180px; height: 100px; object-fit: contain;" class="img-fluid" alt="Responsive image"> 
        </div>                          
        
        <div class="col-sm-4">       
          <img src="<?php echo $row0["img2"]; ?>" style="width: 180px; height: 100px; object-fit: contain;" class="img-fluid" alt="Responsive image">             
        </div>                      
        <div class="col-sm-4">  
        <img src="<?php echo $row0["img3"]; ?>" style="width: 180px; height: 100px; object-fit: contain;" class="img-fluid" alt="Responsive image">                                        
        </div>
      </div>
    </td>
  </tr>
 </table>
 </div>
 <br>


<div class="html2pdf__page-break"></div>
  
<div class="row">
<div class="col-lg-12">
    <div class="col-sm-12">
    <div class="page-header"> <h1><span >TASK-LIST</span></h1></div>
    <table class="">
  <?php
 }
       $select4  = " SELECT * FROM checklist_task WHERE cid = '$cid' and vid = '$vid' and created_date = '$date' and token = '$token'";
       $result4 = mysqli_query($con,$select4);
       $count=0;
       while($row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC)){
         $count=$count+1;
  ?>

        <tr>
          <th style="width:20%"><span >Task<?php echo $count; ?></span></th>
          <td><span ><?php echo $row4["task"]; ?></span></td>
        </tr>  
        <tr>
        <?php

}
?>
      </table>     
    </div>
  </div>
  </div>
<br>
 
 
 <div class="html2pdf__page-break"></div>
    
<?php
    $select3  = " SELECT * FROM checklist WHERE cid = '$cid' and vid = '$vid' and created_date = '$date' and token = '$token'";
    $result3 = mysqli_query($con,$select3);
    while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)){

 ?>  
<div class="row">
    <div class="col-lg-12">
    <div class="col-sm-12" >
    <div class="page-header" > <h1><span >SERVICE REPORT-I</span></h1></div>
    <table class="">
        <tr>
          <th style="width:80%"><span >ENGINE OIL AND FILTER CHANGED</span></th>

                <?php 
                  if($row3["page2_1"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_1"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_1"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_1"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_1"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_1"]; ?></b></span></td>        
                 <?php
                  }
                ?>                                
 
        </tr>  
        <tr>
          <th style="width:80%"><span >AIR CLEANER CHANGED</span></th>
          <?php 
                  if($row3["page2_2"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_2"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_2"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_2"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_2"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_2"]; ?></b></span></td>        
                 <?php
                  }
                ?>  
        </tr> 
        <tr>
          <th style="width:80%"><span >POLLON FILTER CHANGED</span></th>
          <?php 
                  if($row3["page2_3"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_3"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_3"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_3"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_3"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_3"]; ?></b></span></td>        
                 <?php
                  }
                ?>  
        </tr>                         
        <tr>
          <th style="width:80%"><span >BREAK/CLUTCH FLUID CHANGED</span></th>
          <?php 
                  if($row3["page2_4"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_4"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_4"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_4"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_4"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_4"]; ?></b></span></td>        
                 <?php
                  }
                ?> 
        </tr>
        <tr>
          <th style="width:80%"><span >FUEL FILTER CHANGED</span></th>
          <?php 
                  if($row3["page2_5"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_5"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_5"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_5"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_5"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_5"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>
        <tr>
          <th style="width:80%"><span >SPARK PLUSS CHANGED</span></th>
          <?php 
                  if($row3["page2_6"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_6"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_6"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_6"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_6"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_6"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>        
        <tr>
          <th style="width:80%"><span >DSG OIL AND FILTER CHANGED</span></th>
          <?php 
                  if($row3["page2_7"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_7"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_7"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_7"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_7"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_7"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>
        <tr>
          <th style="width:80%"><span >HALDEX OIL CHANGED</span></th>
          <?php 
                  if($row3["page2_8"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_8"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_8"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_8"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_8"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_8"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>
        <tr>
          <th style="width:80%"><span >DIFF OIL CHANGED</span></th>
          <?php 
                  if($row3["page2_9"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_9"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_9"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_9"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_9"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_9"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>
        <tr>
          <th style="width:80%"><span >TIMING BELT WATER PUMP CHANGED</span></th>
          <?php 
                  if($row3["page2_10"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_10"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_10"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_10"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_10"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_10"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>
        <tr>
          <th style="width:80%"><span >HEAD LAMP FOUCSED AND ADJUSTED</span></th>
          <?php 
                  if($row3["page2_11"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_11"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_11"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_11"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_11"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_11"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>
        <tr>
          <th style="width:80%"><span >DOORS SUN ROOF AND CON VETERALE ROOF ADJUSTED AND LUBRICATED</span></th>
          <?php 
                  if($row3["page2_12"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_12"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_12"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_12"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_12"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_12"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>
        <tr>
          <th style="width:80%"><span >SERVICE INTERVAL RESET AND SERVICE REMINDER ATTACHED</span></th>
          <?php 
                  if($row3["page2_13"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_13"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_13"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_13"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_13"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_13"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>
        <tr>
          <th style="width:80%"><span >LOG BOOK STAMPED</span></th>
          <?php 
                  if($row3["page2_14"]=="OKAY"){
                 ?>
                      <td style="color:green"><span><b><?php echo $row3["page2_14"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_14"]=="NOT OKAY"){
                 ?>
                      <td style="color:red"><span><b><?php echo $row3["page2_14"]; ?></b></span></td>        
                 <?php
                  }
                  if($row3["page2_14"]=="NOT APPLICABLE"){
                 ?>
                      <td style="color:black"><span><b><?php echo $row3["page2_14"]; ?></b></span></td>        
                 <?php
                  }
                ?>
        </tr>
      </table>     
    </div>
  </div>
</div>

<div class="html2pdf__page-break"></div>  
<div class="row">
<div class="col-lg-12">
    <div class="col-lg-12">
    <div class="page-header"> <h1><span >BREAKS AND TYERS CONDITION</span></h1></div>
        <div class="col-sm-4">
              <div class="row">
              <table class="">
                    <tr>
                         <th><span >Break-Left Front</span></th>
                          <td>
                              <span data-prefix></span><span>
                              <?php 
                                if($row3["blf"]=="Green"){
                              ?>
                                    <div style="color:green; background-color:green; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["blf"]=="Yellow"){
                              ?>
                                    <div style="color:yellow; background-color:yellow; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["blf"]=="Red"){
                              ?>
                                    <div style="color:red; background-color:red; width:20px;height:15px;border: 0.1px solid;"></div>     
                              <?php
                                }
                              ?>                      
                            </span>
                        </td>  
                    </tr>
                    <tr>
                      <th><span >Thickness</span></th>
                      <td><span data-prefix></span><span><?php echo $row3["blfinfo"]; ?> mm</span></td>
                    </tr>     
                  </table>
                  <table class="">
                    <tr>
                      <th><span >Break-Left Rear</span></th>
                        <td>
                              <span data-prefix></span><span>
                              <?php 
                                if($row3["blb"]=="Green"){
                              ?>
                                    <div style="color:green; background-color:green; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["blb"]=="Yellow"){
                              ?>
                                    <div style="color:yellow; background-color:yellow; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["blb"]=="Red"){
                              ?>
                                    <div style="color:red; background-color:red; width:20px;height:15px;border: 0.1px solid;"></div>     
                              <?php
                                }
                              ?>                      
                            </span>
                        </td>
                    </tr>
                    <tr>
                      <th><span >Thickness</span></th>
                      <td><span data-prefix></span><span><?php echo $row3["blbinfo"]; ?> mm</span></td>
                    </tr>                  
                  </table> 
                  <br>       
                  <table class="">
                    <tr>
                      <th><span >Tyers-Left Front</span></th>
                      <td>
                              <span data-prefix></span><span>
                              <?php 
                                if($row3["tlf"]=="Green"){
                              ?>
                                    <div style="color:green; background-color:green; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["tlf"]=="Yellow"){
                              ?>
                                    <div style="color:yellow; background-color:yellow; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["tlf"]=="Red"){
                              ?>
                                    <div style="color:red; background-color:red; width:20px;height:15px;border: 0.1px solid;"></div>     
                              <?php
                                }
                              ?>                      
                            </span>
                        </td>
                    </tr>
                    <tr>
                      <th><span >Thickness</span></th>
                      <td><span data-prefix></span><span><?php echo $row3["tlfinfo"]; ?> mm</span></td>
                    </tr>                  
                  </table>     
                  <table class="">
                    <tr>
                      <th><span >Tyers-Left Rear</span></th>
                      <td>
                              <span data-prefix></span><span>
                              <?php 
                                if($row3["tlb"]=="Green"){
                              ?>
                                    <div style="color:green; background-color:green; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["tlb"]=="Yellow"){
                              ?>
                                    <div style="color:yellow; background-color:yellow; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["tlb"]=="Red"){
                              ?>
                                    <div style="color:red; background-color:red; width:20px;height:15px;border: 0.1px solid;"></div>     
                              <?php
                                }
                              ?>                      
                            </span>
                        </td>
                    </tr>
                    <tr>
                      <th><span >Thickness</span></th>
                      <td><span data-prefix></span><span><?php echo $row3["tlbinfo"]; ?> mm</span></td>
                    </tr>                  
                  </table>                                
            </div>
        </div>
        <div class="col-sm-4">
         
      

      <img src="images/aa.png " style="width:100%;margin-top:30px" class="img-fluid" alt="Responsive image">
      


       
        </div>  
        <div class="col-sm-4">
        <div class="row">
                   <table class="">
                    <tr>
                      <th><span >Break-right Front</span></th>
                      <td>
                              <span data-prefix></span><span>
                              <?php 
                                if($row3["brf"]=="Green"){
                              ?>
                                    <div style="color:green; background-color:green; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["brf"]=="Yellow"){
                              ?>
                                    <div style="color:yellow; background-color:yellow; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["brf"]=="Red"){
                              ?>
                                    <div style="color:red; background-color:red; width:20px;height:15px;border: 0.1px solid;"></div>     
                              <?php
                                }
                              ?>                      
                            </span>
                        </td>
                    </tr>
                    <tr>
                      <th><span >Thickness</span></th>
                      <td><span data-prefix></span><span><?php echo $row3["brfinfo"]; ?> mm</span></td>
                    </tr>     
                  </table>
                  <table class="">
                    <tr>
                      <th><span >Break-right Rear</span></th>
                      <td>
                              <span data-prefix></span><span>
                              <?php 
                                if($row3["brb"]=="Green"){
                              ?>
                                    <div style="color:green; background-color:green; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["brb"]=="Yellow"){
                              ?>
                                    <div style="color:yellow; background-color:yellow; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["brb"]=="Red"){
                              ?>
                                    <div style="color:red; background-color:red; width:20px;height:15px;border: 0.1px solid;"></div>     
                              <?php
                                }
                              ?>                      
                            </span>
                        </td>
                    </tr>
                    <tr>
                      <th><span >Thickness</span></th>
                      <td><span data-prefix></span><span><?php echo $row3["brbinfo"]; ?> mm</span></td>
                    </tr>                  
                  </table>  
                  <br>    
                  <table class="">
                    <tr>
                      <th><span >Tyers-right Front</span></th>
                      <td>
                              <span data-prefix></span><span>
                              <?php 
                                if($row3["trf"]=="Green"){
                              ?>
                                    <div style="color:green; background-color:green; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["trf"]=="Yellow"){
                              ?>
                                    <div style="color:yellow; background-color:yellow; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["trf"]=="Red"){
                              ?>
                                    <div style="color:red; background-color:red; width:20px;height:15px;border: 0.1px solid;"></div>     
                              <?php
                                }
                              ?>                      
                            </span>
                        </td>
                    </tr>
                    <tr>
                      <th><span >Thickness</span></th>
                      <td><span data-prefix></span><span><?php echo $row3["trfinfo"]; ?> mm</span></td>
                    </tr>                  
                  </table>   
                  <table class="">
                    <tr>
                      <th><span >Tyers-right Rear</span></th>
                      <td>
                              <span data-prefix></span><span>
                              <?php 
                                if($row3["trb"]=="Green"){
                              ?>
                                    <div style="color:green; background-color:green; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["trb"]=="Yellow"){
                              ?>
                                    <div style="color:yellow; background-color:yellow; width:20px;height:15px;border: 0.1px solid;"></div>      
                              <?php
                                }
                                if($row3["trb"]=="Red"){
                              ?>
                                    <div style="color:red; background-color:red; width:20px;height:15px;border: 0.1px solid;"></div>     
                              <?php
                                }
                              ?>                      
                            </span>
                        </td>
                    </tr>
                    <tr>
                      <th><span >Thickness</span></th>
                      <td><span data-prefix></span><span><?php echo $row3["trbinfo"]; ?> mm</span></td>
                    </tr>                  
                  </table>                                             
            </div>
        </div>              
    </div>
</div>
 </table>

 <div class="row">
 <div class="col-lg-12" >
 <div class="col-lg-12">
          <div class="col-sm-6">
            <h6>BREAKS CONDITION</h6>
              <table style="border-color: white;"class="">
                <tr>
                <td><div class="col-lg-2"><div style="color:green; background-color:green; width:25px;height:15px;border: 0.1px solid;"></div></div><div class="col-lg-10"> 12mm - 6mm</div>
              </td>
                </tr>
                <tr>
                <td><div class="col-lg-2"><div style="color:yellow; background-color:yellow; width:25px;height:15px;border: 0.1px solid;"></div></div><div class="col-lg-10"> 6mm - 3mm</div></td>
                </tr>
                <tr>
                <td><div class="col-lg-2"><div style="color:red; background-color:red; width:25px;height:15px;border: 0.1px solid;"></div></div><div class="col-lg-10"> Less than 1.5mm-Need Immediate Repair</div></td>
                </tr>                                
            </table>
          </div>
          <div class="col-sm-6">
          <h6>TYERS CONDITION</h6>
             <table style="border-color: transparent;"class="">
             <tr>
                <td><div class="col-lg-2"><div style="color:green; background-color:green; width:25px;height:15px;border: 0.1px solid;"></div></div><div class="col-lg-10"> 12mm - 6mm</div></td>
                </tr>
                <tr>
                <td><div class="col-lg-2"><div style="color:yellow; background-color:yellow; width:25px;height:15px;border: 0.1px solid;"></div></div><div class="col-lg-10"> 6mm - 3mm</div></td>
                </tr>
                <tr>
                <td><div class="col-lg-2"><div style="color:red; background-color:red; width:25px;height:15px;border: 0.1px solid;"></div></div><div class="col-lg-10"> Less than 1.5mm-Need Immediate Replacement</div></td>
                </tr>                             
             </table>           
          </div> 
      </div>                           
  </div>
</div>
</div>


<div class="html2pdf__page-break"></div>

<!-- ============================================   page4   =====================================================================================-->


<div class="row">
<div class="col-lg-12">
    <div class="col-sm-12">
    <div class="page-header"> <h1><span >SERVICE REPORT-II</span></h1></div>
              <table class="inventory">
                      <thead>
                        <tr>
                          <th><span >Section</span></th>
                          <th><span >Comment</span></th>
                          <th><span >Condition</span></th>
                          

                        </tr>
                      </thead>
                      <tbody>          
                        <tr>
                          <td><span >ENGINE OIL LEAKS</span></td>
                          <td><span ><?php echo $row3["page4_1info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_1"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_1"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_1"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_1"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_1"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_1"]; ?></b></span></td>     
                              <?php
                                }
                              ?>                      
     
                        </tr>
                        <tr>
                          <td><span >GEAR OIL LEAKS</span></td>
                          <td><span ><?php echo $row3["page4_2info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_2"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_2"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_2"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_2"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_2"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_2"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >COOLANT LEAKS</span></td>
                          <td><span ><?php echo $row3["page4_3info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_3"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_3"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_3"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_3"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_3"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_3"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >ANY FLUID LEAKS </span></td>
                          <td><span ><?php echo $row3["page4_4info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_4"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_4"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_4"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_4"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_4"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_4"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >BATERY</span></td>
                          <td><span ><?php echo $row3["page4_5info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_5"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_5"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_5"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_5"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_5"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_5"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >WIPERS AND SPRAY JETAINES</span></td>
                          <td><span ><?php echo $row3["page4_6info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_6"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_6"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_6"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_6"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_6"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_6"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >BODY DAMAGE/STRUCTURED VISUAL CHECK</span></td>
                          <td><span ><?php echo $row3["page4_7info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_7"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_7"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_7"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_7"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_7"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_7"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >BODY RUSH VISUAL CHECK </span></td>
                          <td><span ><?php echo $row3["page4_8info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_8"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_8"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_8"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_8"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_8"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_8"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >SUSPENSION LINKS,BOOTSJOINTS BUSHES VISUAL CHECK</span></td>
                          <td><span ><?php echo $row3["page4_9info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_9"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_9"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_9"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_9"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_9"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_9"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >STEERING SYSTEM</span></td>
                          <td><span ><?php echo $row3["page4_10info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_10"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_10"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_10"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_10"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_10"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_10"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >WINDOW AND WINDSCRIEEN </span></td>
                          <td><span ><?php echo $row3["page4_11info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_11"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_11"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_11"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_11"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_11"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_11"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>
                        <tr>
                          <td><span >FINAL TEST DRIVE</span></td>
                          <td><span ><?php echo $row3["page4_12info"]; ?></span></td>
              
                              <?php 
                                if($row3["page4_12"]=="OKAY"){
                              ?>
                                    <td style="color:green"><span><b><?php echo $row3["page4_12"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_12"]=="NOT OKAY"){
                              ?>
                                    <td style="color:red"><span><b><?php echo $row3["page4_12"]; ?></b></span></td>      
                              <?php
                                }
                                if($row3["page4_12"]=="NOT APPLICABLE"){
                              ?>
                                    <td style="color:black"><span><b><?php echo $row3["page4_12"]; ?></b></span></td>     
                              <?php
                                }
                              ?>  
                        </tr>

              
                              <?php 
                                if($row3["page4_13"]=="OKAY"){
                              ?>
                              
                              <tr>
                                     <td><span ><?php echo $row3["page4_13header"]; ?></span></td>
                                     <td><span ><?php echo $row3["page4_13info"]; ?></span></td>
                                     <td style="color:green"><span><b><?php echo $row3["page4_13"]; ?></b></span></td>   
                              </tr>
                                 
                              <?php
                                }
                                if($row3["page4_13"]=="NOT OKAY"){
                              ?>
                              <tr>
                                     <td><span ><?php echo $row3["page4_13header"]; ?></span></td>
                                     <td><span ><?php echo $row3["page4_13info"]; ?></span></td>
                                     <td style="color:red"><span><b><?php echo $row3["page4_13"]; ?></b></span></td>   
                              </tr>    
                              <?php
                                }
                                if($row3["page4_13"]=="NOT APPLICABLE"){

                                }
                              ?>  
  
                              <?php 
                                if($row3["page4_14"]=="OKAY"){
                              ?>
                              <tr>
                                     <td><span ><?php echo $row3["page4_14header"]; ?></span></td>
                                     <td><span ><?php echo $row3["page4_14info"]; ?></span></td>
                                     <td style="color:green"><span><b><?php echo $row3["page4_14"]; ?></b></span></td>   
                              </tr>     
                              <?php
                                }
                                if($row3["page4_14"]=="NOT OKAY"){
                              ?>
                              <tr>
                                     <td><span ><?php echo $row3["page4_14header"]; ?></span></td>
                                     <td><span ><?php echo $row3["page4_14info"]; ?></span></td>
                                     <td style="color:red"><span><b><?php echo $row3["page4_14"]; ?></b></span></td>   
                              </tr>    
                              <?php
                                }
                                if($row3["page4_14"]=="NOT APPLICABLE"){

                                }
                              ?>  

              
                              <?php 
                                if($row3["page4_15"]=="OKAY"){
                              ?>
                              <tr>
                                     <td><span ><?php echo $row3["page4_15header"]; ?></span></td>
                                     <td><span ><?php echo $row3["page4_15info"]; ?></span></td>
                                     <td style="color:green"><span><b><?php echo $row3["page4_15"]; ?></b></span></td>   
                              </tr>     
                              <?php
                                }
                                if($row3["page4_15"]=="NOT OKAY"){
                              ?>
                              <tr>
                                     <td><span ><?php echo $row3["page4_15header"]; ?></span></td>
                                     <td><span ><?php echo $row3["page4_15info"]; ?></span></td>
                                     <td style="color:red"><span><b><?php echo $row3["page4_15"]; ?></b></span></td>   
                              </tr>     
                              <?php
                                }
                                if($row3["page4_15"]=="NOT APPLICABLE"){

                                }
                              ?>  

                     </tbody>
                </table>
          </div>
  </div>
</div>

<?php 

}

?>
<div class="row">
<div class="col-lg-12">
    <div class="col-sm-12">

    <aside>
      <h1><span ></span></h1>
      <div >
        <p></p>
      </div>
    </aside>
</div>
</div>
</div>
   
</div>
<div class="row">
			
				  <div class="col-lg-12">  
                   <div id="filter_data" style="cursor:pointer;">
      
                   </div>
				   <div class="modal-footer">
           <a type="button" onClick="" data-dismiss=""class="btn  btn-sm btn-success" href="pre-checklist.php" id=""> Back to List</a>
                     <a type="button" onClick="" data-dismiss=""class="btn btn-sm btn-warning" href="checklist.php" id=""> New</a>

                     <a class="btn btn-danger btn-sm login modal-form" data-target="" data-toggle="" onClick="" id="view" href="download-checklist.php?cid=<?php echo $cid; ?>&vid=<?php echo $vid; ?>&date=<?php echo $date; ?>&token=<?php echo $token; ?>"> Download</a>
                 </div>
		     
               
            </div>
        </div>


<script src="js/jspdf.debug.js"></script>
<script src="js/html2canvas.min.js"></script>
<script src="js/html2pdf.min.js"></script>


</body>
</html>

