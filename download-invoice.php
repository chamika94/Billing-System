<?php
include 'db.php';
$cid =$_GET["cid"];
$vid =$_GET["vid"];
$date =$_GET["date"];
$type =$_GET["type"];
$status =$_GET["status"];
$token =$_GET["token"];
$deposite =$_GET["deposite"];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HTML TO PDF</title>
	<script src="js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>

  
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="css/style.css" rel="stylesheet" >
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

body { box-sizing: border-box; height: auto; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 7.5in; }
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

table.meta1,table.meta1 { float: left; width: 48%; }
table.meta1:after  { clear: both; content: ""; display: table; }

table.meta2,table.meta2 { float: left; width: 100%; }
table.meta1:after  { clear: both; content: ""; display: table; }
/* table meta */

table.meta th { width: 30%; }
table.meta td { width: 70%; }

table.meta11 th { width: 17%; }
table.meta11 td { width: 83%; }

table.meta2 th { width: 30%; }
table.meta2 td { width: 70%; }
/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th:first-child {
    width:250px;
}
table.inventory th:nth-child(2) {
    width:150px;
}
table.inventory th:nth-child(3) {
    width:60px;
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

.note{
  width: 100%;
  height: 70px;
  border-spacing: 2px;
  border-color: #DDD;
  border-radius: 15px;
  margin-top:-40px;
}
  </style>




</head>
<body>
<div id="invoice">
    <header >
    <?php
    
    $select0  = " SELECT * FROM invoice WHERE cid = '$cid' and vid = '$vid' and created_date = '$date' and token = '$token'";
    $result0 = mysqli_query($con,$select0);
    while($row0 = mysqli_fetch_array($result0,MYSQLI_ASSOC)){

 ?>  
      <h1><?php echo $type; ?>-<?php echo $row0["id"]; ?></h1>

  <?php
    }
  ?>
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
    <article>
    <!--<a  href="javascript:void(0)" class="btn-download">Download PDF  </a>-->

  <?php
 
  $select2  = " SELECT * FROM vehicle WHERE vvid = '$vid'";
  $result2 = mysqli_query($con,$select2);
  
  while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){


  ?>    
  <div class="row">
  
  <div class="col-sm-6">
      <table style="margin-top:-40px;"class="meta11">
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
  </div>
  <div class="col-sm-6">
<?php
  }

    $select1  = " SELECT * FROM customer WHERE ccid = '$cid'";
    $result1 = mysqli_query($con,$select1);
    while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
?>
    
      
      <table style="margin-top:-40px;" class="meta11">
        <tr>
          <th><span >Name</span></th>
          <td><span ><?php echo $row1["name"]; ?></span></td>
        </tr>  
        <tr>
          <th><span >Email</span></th>
          <td><span ><p><?php echo $row1["email"]; ?></p></span></td>
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
    $select5  = " SELECT * FROM invoice WHERE cid = '$cid' and vid = '$vid' and created_date = '$date' and token = '$token'";
    $result5 = mysqli_query($con,$select5);
    while($row5 = mysqli_fetch_array($result5,MYSQLI_ASSOC)){

 ?>   
 
 <div class="row">
     
        <div class="col-sm-6">
          <table class="">
            <tr>
              <th><span >Time-IN</span></th>
              <td><span data-prefix></span><span><?php echo $row5["intime"]; ?></span></td>
            </tr>
            <tr>
              <th><span >Date-IN</span></th>
              <td><span data-prefix></span><span><?php echo $row5["indate"]; ?></span></td>
            </tr>     
            <tr>
              <th><span >OdoMeter</span></th>
              <td><span data-prefix></span><span><?php echo $row5["inmeter"]; ?></span></td>
            </tr>              
          </table>
         
          </div>
          <div class="col-sm-6">

          
          <table class="">
            <tr>
              <th><span >Time-OUT</span></th>
              <td><span data-prefix></span><span><?php echo $row5["outtime"]; ?></span></td>
            </tr>
            <tr>
              <th><span >Date-OUT</span></th>
              <td><span data-prefix></span><span><?php echo $row5["outdate"]; ?></span></td>
            </tr>     
            <tr>
              <th><span >OdoMeter</span></th>
              <td><span data-prefix></span><span><?php echo $row5["outmeter"]; ?></span></td>
            </tr>              
          </table>
    </div>

</div><br>

 <?php
    }
  ?>
      <table style="margin-top:-40px;" class="inventory">
        <thead>
          <tr>
          <th><span >Description</span></th>
            <th><span >Part No</span></th>
            <th><span >Quantity</span></th>
            <th><span >Price</span></th>

          </tr>
        </thead>
        <tbody>
 <?php
    $select3  = " SELECT * FROM useritem WHERE vid = '$vid' and cid = '$cid' and created_date = '$date' and token = '$token'";
    $result3 = mysqli_query($con,$select3);
    $count = 0;
    while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)){   
      
      $count = $count + intval($row3["price"]);
 ?>           
          <tr>
          <td><span ><?php echo $row3["info"]; ?></span></td>
            <td><span ><?php echo $row3["partNo"]; ?></span></td>
            <td><span ><?php echo $row3["quantity"]; ?></span></td>
            <td><span data-prefix>$</span><span ><?php echo $row3["price"]; ?></span></td>
 
          </tr>
<?php
    }
?>
        </tbody>
      </table>
<!-- page breaker====================== -->
<div class="html2pdf__page-break"></div>


      <table class="sign">
          <tr>
            <td>Date : <?php echo $date ?></td>
          </tr>
      </table>      
 
<?php
if($status==1){
  ?>

<span><img alt="it" src="images/paid.png" width="150" style="margin-left:-130px;margin-top:50px;"></span>

<?php
}else{
?>
<span><img alt="it" src="images/Outstanding.png" width="150" style="margin-left:-130px;margin-top:50px;"></span>


<?php
}
?>

      <table class="balance">
        <tr>
          <th><span >Total</span></th>
          <td><span data-prefix>$</span><span><?php echo $count; ?></span></td>
        </tr>
        <tr>
          <th><span >Gst(10%)</span></th>
          <td><span data-prefix>$</span><span><?php echo $count*0.1; ?></span></td>
        </tr> 
        <tr>
          <th><span >Deposit</span></th>
          <td><span data-prefix>$</span><span><?php echo $deposite; ?></span></td>
        </tr>     
        <tr>
          <th><span >Balance to Pay</span></th>
          <td><span data-prefix>$</span><span><?php echo ($count + $count*0.1)-$deposite; ?></span></td>
        </tr>              
      </table>
    </article>
    <?php
 
 $select4  = " SELECT * FROM invoice WHERE vid = '$vid' and cid = '$cid' and created_date = '$date' and token = '$token'";
 $result4 = mysqli_query($con,$select4);
 
 while($row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC)){


 ?> 
    
        <table class="note">
            <tr>
            <td >
            <p style="font-size:11px;margin-top:-30px;">Note : </p> 
            <p><?php echo $row4["note"]; ?></p>
            </td>
            </tr>
        </table> 
        <Br>
    
    <table class="note" style="margin-top:1px;">
        <tr>
        <td >
        <p style="font-size:11px;margin-top:-20px;">Please Sign Here</p> 
        <p>(Please Make your payments to following Account)</p>
        <p><b>ACC NAME : VOX AUTO</b></p>
        <p><b>BSB : 034108</b></p>
        <p><b>ACC NO : 641227</b></p>
        </td>
        </tr>
    </table> 
<Br>
    <table class="note" style="margin-top:1px;">
        <tr>
        <td >
        <p style="font-size:11px;margin-top:-20px;">Terms & Condition : </p> 
        <p>Prices quoted are subjected to variations without notice unless otherwise agreed between the parties Electronic items and special ordered spare parts are not returnable in any situation. Return accepted only for unused mechanical spare parts with original packing within 7 days from invoiced. This is my in writing approval to operate and carryout agreed repairs ,services ,diagnostic and inspection drive in anywhere. I would also confirm that I am fully understood above terms & conditions and no any valuable goods in the car when handed over to Vox Auto.</p>
        </td>
        </tr>
    </table> 

<?php

 }
?>
   
</div>








<script src="js/jspdf.debug.js"></script>
<script src="js/html2canvas.min.js"></script>
<script src="js/html2pdf.min.js"></script>


<script>

    const options = {
      margin: 0.5,
      filename: 'invoice.pdf',
      image: { 
        type: 'jpeg', 
        quality: 500
      },
      html2canvas: { 
        scale: 1 
      },
      jsPDF: { 
        unit: 'in', 
        format: 'letter', 
        orientation: 'portrait' 
      }
    }
    
    $(document).ready(function(){
      //e.preventDefault();
      const element = document.getElementById('invoice');
      html2pdf().from(element).set(options).save();

      //delay redirect function until invoice is downloaded
      window.setTimeout(function() {
       window.location.href = 'download-success-invoice.php';
       }, 5000);
     
    });



    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>



</body>
</html>

