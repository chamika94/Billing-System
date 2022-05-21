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
	<title> SUMMARY REPORT TO PDF</title>
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

.form-group{
  padding:5px;
  border: 0.1em solid;
  margin:5px;
  border-radius: 4px;
  box-shadow: 0 0 0.3in -0.2in rgba(0, 0, 0, 0.5);
  background-color:;
  height:50%;
}
.form-group>label{
  position:absolute;
  top:-1px;
  left:20px;
  background-color:white;
}
  </style>
</head>
<body>



<div id="invoice">

<header >
      <h1>SUMMARY REPORT SERVICE</h1>
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
      <span><img alt="it" src="images/logo.jpeg" width="270"></span>
    </header>
 

    <!--<a  href="javascript:void(0)" class="btn-download">Download PDF  </a>-->
 
  <?php
 
  $select2  = " SELECT * FROM vehicle WHERE vvid = '$vid'";
  $result2 = mysqli_query($con,$select2);
  
  while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){


  ?>    
  <div class="row">
  <div class="col-lg-12"style="margin-top:-90px"> 

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
    $select3  = " SELECT * FROM summary_report WHERE cid = '$cid' and vid = '$vid' and created_date = '$date' and token = '$token'";
    $result3 = mysqli_query($con,$select3);
    while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)){

 ?>   
 
 <div class="row">

        <div class="col-sm-6">
          <table class="">
            <tr>
              <th><span >Time-IN</span></th>
              <td><span data-prefix></span><span><?php echo $row3["ctime"]; ?></span></td>
            </tr>
            <tr>
              <th><span >Date-IN</span></th>
              <td><span data-prefix></span><span><?php echo $row3["cdate"]; ?></span></td>
            </tr>     
            <tr>
              <th><span >OdoMeter</span></th>
              <td><span data-prefix></span><span><?php echo $row3["cmeter"]; ?></span></td>
            </tr>              
          </table>
         
          </div>
          <div class="col-sm-6">

          
          <table class="">
            <tr>
              <th><span >Time-OUT</span></th>
              <td><span data-prefix></span><span><?php echo $row3["vtime"]; ?></span></td>
            </tr>
            <tr>
              <th><span >Date-OUT</span></th>
              <td><span data-prefix></span><span><?php echo $row3["vdate"]; ?></span></td>
            </tr>     
            <tr>
              <th><span >OdoMeter</span></th>
              <td><span data-prefix></span><span><?php echo $row3["vmeter"]; ?></span></td>
            </tr>              
          </table>
    </div>
 
    </div>


<!-- ============================================   page1  =====================================================================================-->


  
<div class="row">
    <div class="col-sm-12">
    <div class="page-header"> <h1><span >TASK-LIST</span></h1></div>
    <table class="">
  <?php
       }
       $select4  = " SELECT * FROM summary_task_page1 WHERE cid = '$cid' and vid = '$vid' and created_date = '$date' and token = '$token'";
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
   
<!-- ============================================   page2  =====================================================================================-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header"> <h1><span >TASK-LIST</span></h1></div>


   <?php
      
       $select5  = " SELECT * FROM summary_task WHERE cid = '$cid' and vid = '$vid' and created_date = '$date' and token = '$token'";
       $result5 = mysqli_query($con,$select5);
       $count=0;
       while($row5 = mysqli_fetch_array($result5,MYSQLI_ASSOC)){
         //$count=$count+1;
  ?>             
                        <div class="col-sm-12" style="border: ;">

                           <div class="row">
                                  <div class="col-sm-2"></div>
                                
                                  <div  style="background-color:; padding:10px;" class="col-sm-8">  
                                      <img  style="width:100%; height:auto; object-fit: contain;" src="<?php echo $row5["images"]; ?>" >
                                  </div>
                                
                                   <div class="col-sm-2"></div>  
                            </div> 

                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">  
                                    <table style="background-color:; padding:10px;">
                                        <tr>
                                            <td>
                                            <h4><b>Title : </b><?php echo $row5["title"]; ?></h4>
                                            <h6><b>Recommendation : </b><?php echo $row5["comment"]; ?></h6>
                                    <p><b>Desciption : </b><?php echo $row5["info"]; ?></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                       </div>
                       <?php
       }
                       ?>
       </div>
</div>
 

<div class="row">
    <div class="modal-footer">
          <a type="button" onClick="" data-dismiss=""class="btn  btn-sm btn-success" href="pre-summaryreport.php" id=""> Back to List</a>
          <a type="button" onClick="" data-dismiss=""class="btn btn-sm btn-warning" href="summaryreport.php" id=""> New</a>
          <a class="btn btn-danger btn-sm login modal-form" data-target="" data-toggle="" onClick="" id="view" href="download-summaryreport.php?cid=<?php echo $cid; ?>&vid=<?php echo $vid; ?>&date=<?php echo $date; ?>&token=<?php echo $token; ?>"> Download</a>
      </div>
</div>
        







<script src="js/jspdf.debug.js"></script>
<script src="js/html2canvas.min.js"></script>
<script src="js/html2pdf.min.js"></script>


</body>
</html>

