
<?php

session_start();

if(!isset($_SESSION['userID'])) {
    header('Location: login.php');
}

?>
<?php
include 'db.php';
$select1 = "SELECT * FROM partno";
$result1 = $con->query($select1);
$option1 = '<option value=""></option>';
while($row1 = $result1->fetch_object()){
    $option1 .= '<option value="'.$row1->partNo.'">'.$row1->partNo.'</option>';
}
$select2 = "SELECT * FROM description";
$result2 = $con->query($select2);
$option2 = '<option value=""></option>';
while($row2 = $result2->fetch_object()){
    $option2 .= '<option value="'.$row2->description.'">'.$row2->description.'</option>';
}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
      
    
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
   <!-- style for table shadows-->
   <style>
	.table{
		box-shadow:0.08in -0.08in 0 0  rgba(0, 0, 0, 0.5);
		border-radius: 1px;
		background-color:#f5f5f0;
	}
    </style>
    <style>
        .select-editable {position:relative; background-color:white; border:solid grey 1px;  width:120px; height:25px;}
        .select-editable select {position:absolute; top:0px; left:0px; font-size:14px; border:none; width:115px; margin:0;}
        .select-editable input {position:absolute; top:0px; left:0px; width:100px; padding:1px; font-size:14px; border:none;}
        .select-editable select:focus, .select-editable input:focus {outline:none;}
    </style>
<!-- style for checklist components-->
<style>
    .cus{
  padding:10px;
  border: 0.1em solid;
  margin:10px;
  border-radius: 4px;
  box-shadow: 0 0 0.2in -0.1in rgba(0, 0, 0, 0.5);
  background-color:;
}
.form-group1{
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

.topic{
    margin-left:5%;
}

.description{
    background-color:#f5f5f0;
    border: 0.1px solid;
    border-radius: 2px;
 
}


.logo { 
height: 70px; 
width: 110px;
overflow: hidden; }
</style>
<!-- style for time picker-->
<style>
{
    margin:0;
    box-sizing:border-box;
}

body{

}

.input_div{text-align: center;margin-top: 15em;}

.input_div input{
    padding: 10px;
    border-radius: 5px;
    border: none;
}

.modal-content1{
    margin: 9em auto;
    width: fit-content;
    background-color: white;
}

.timepicker_wrapper{
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #00000082;
    width: 100%;
    height: 100vh;
}

.timepicker_hour,
.timepicker_minute,
.timepicker_ampm{
    scroll-behavior: smooth;
    -ms-overflow-style: none;
    scrollbar-width: none;
    border: 1px solid #80808080;
    color: #0000009e;
    font-weight: bold;
}

.timepicker_hour::-webkit-scrollbar,
.timepicker_minute::-webkit-scrollbar,
.timepicker_ampm::-webkit-scrollbar{ 
    display: none;  
}

.timepicker_hour option,
.timepicker_minute option,
.timepicker_ampm option{
    font-weight: bold;
    padding: 5px 25px;
}

.timepicker_control{text-align: end;margin-top: 5px;margin-bottom: 10px;}

.timepicker_control button{
    padding: 7px 15px;
    border: none;
    font-weight: bold;
    background-color: green;
    color: white;
    margin-left: 8px;
}
.timepicker_wrapper_main{
    width: fit-content;
    border: 1px solid gray;
    padding: 0px 12px;
}

.timepicker_control button:first-child{background-color: #ff0000db;color: white;margin-right: 15px;}

.timepicker_header{text-align: center;color: #0000008a;margin: 5px 0px;}

    </style>
    <!-- script for time picker -->
    <script>
        var c_t = "";
function timepicker(el,S){
    var div = document.querySelector('.timepicker_wrapper')
    function pad(n) {
        var len = 2 - (''+n).length;
        return (len > 0 ? new Array(++len).join('0') : '') + n
      }
      
    if (S == 'a'){
        html = "";
        for(i=1;i<=12;i++){
            html += '<option value="'+pad(i)+'">'+pad(i)+'</option>'
        }
        document.querySelector('.timepicker_hour').innerHTML = html

        html = "";
        for(i=0;i<=59;i++){
            html += '<option value="'+pad(i)+'">'+pad(i)+'</option>'
        }
        document.querySelector('.timepicker_minute').innerHTML = html

        c_t = "";
        c_t = el;
        document.querySelector('.timepicker_wrapper').style.display = "block";
        
    }
    if(S == 'c'){
        document.querySelector('.timepicker_hour').value = "";
        document.querySelector('.timepicker_minute').value = "";
        document.querySelector('.timepicker_ampm').value = "";
        c_t.value = "";
    }
    if(S == 'x'){
        div.style.display = "none";
    }
    if(S == 's'){
        var hr = document.querySelector('.timepicker_hour').value;
        var min = document.querySelector('.timepicker_minute').value;
        var am = document.querySelector('.timepicker_ampm').value;
        if(hr != "" && min != "" && am != ""){
            c_t.value = hr+":"+min+" "+am;
            div.style.display = "none";
        }
        
        
    }
}

function changeTimepickerheader(el ,S){
    var k = document.querySelectorAll('.timepicker_header b')
    if(S == '1'){
        k[0].innerHTML = el.value
    }
    if(S == '2'){
        k[1].innerHTML = el.value
    }
    if(S == '3'){
        k[2].innerHTML = el.value
    }
}

    </script>
<!-- script to get data for view page to display -->
<!--
<script>
 function viwe_invoice_data(){
    var cid = $("#cid").val();
    var vid = $("#vid").val();
    var date = $("#date").val();
   // alert(date);
   $.ajax({
    url: "view-invoice.php",
    type: "post",
    data: {cid : cid, vid : vid, date : date},
    success : function(data){
   // alert(data); /* alerts the response from php.*/
    $('#view-invoice').html(data);

    }
    });

 }

</script>
-->

</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Vox Auto</span>Admin</a>
			<!--	<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>-->
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="images/logo.jpeg" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Dashboard</div>
				<div class="profile-usertitle-info">Invoice</div>
			<!--	<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>-->
			</div>
			<div class="clear"></div>
		</div>
<!--		<div class="divider"></div>
		
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
-->
		<ul class="nav menu">
<!--		<li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
      		<li><a href="widgets.html"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
			<li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
			<li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
			<li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>-->
            <li><a href="index.php"><em class="fa fa-clone">&nbsp;</em> Back To Home</a></li>
            <li><a href="admin.php"><em class="fa fa-toggle-off">&nbsp;</em> Admin</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Registration <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="customer.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Customer
					</a></li>
					<li><a class="" href="vehicle.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Vehicle
					</a></li>
				</ul>
			</li>	
	
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Proccess <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="invoice-home.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Invoice
					</a></li>
					<li><a class="" href="checklist-home.php">
						<span class="fa fa-arrow-right">&nbsp;</span> CheckList
					</a></li>
					<li><a class="" href="summaryreport-home.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Summary Report
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-navicon">&nbsp;</em> Reports <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
                <li><a class="" href="pre-invoice.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Previous Invoive
					</a></li>
					<li><a class="" href="pre-checklist.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Previous CheckList
					</a></li>
					<li><a class="" href="pre-summaryreport.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Previous Report
					</a></li>
				</ul>
			</li>

			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>	
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<!--	<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>-->
		<!--/.row-->
		
<!--
		<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Invoice</h1>
				</div>
		</div>
-->		
		<div id="displaysuccess" class="panel panel-container">  
            
           
        <div class="row">
                        <div class="col-md-12">

                                    <div class="col-md-6">  
                                        <div class="form-group cus">
                                            <label>Customer</label>
                                            <a class="btn btn-info btn-sm customer login modal-form" data-target="#login-form" style=" margin-left: 42%;margin-top:15px"data-toggle="modal" onClick="filter_data_modal1()" id="add1"href="#">Add</a>
                                                    <a class="btn btn-danger btn-sm login modal-form" data-target="#login-form" style="display:none;margin-left: 42%;margin-top:15px" data-toggle=""onClick="chamika1()" href="#"id="delete1">Delete</a>
                                                <input type="hidden" id="customer-value" value=""></input><br></br>
                                                <div class="col-md-12"><div id="displaydata"></div></div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                                  <div class="col-md-6">  
                                        <div class="form-group cus">
                                            <label>Vehicle</label>
                                            <a class="btn btn-info btn-sm vehicle login modal-form" data-target="#login-form" style=" margin-left: 42%;margin-top:15px"data-toggle="modal" onClick="filter_data_modal2()" href="#"id="add2">Add</a>
                                                <a class="btn btn-danger btn-sm login modal-form" data-target="#login-form" style="display:none;margin-left: 42%;margin-top:15px" data-toggle=""onClick="chamika2()" href="#"id="delete2">Delete</a>
                                            <input type="hidden" id="vehicle-value" value=""></input><br></br>
                                            <div class="col-md-12"><div id="displaydata1"></div></div> 
                                        </div>
                                    </div>


                          </div>
                     </div> <br>
                     <div class="row">
                        <div class="col-md-12">


    
</div> 
</div>                
                     <div class="row">
                        <div class="col-md-12">

                                    <div class="col-md-6">  
                                        <div class="form-group cus">
                                            <label>Vehicle In-Time</label>
                                            <div class="input_div1">
                                               
                                            </div>
                                           Time IN :  <!--<input style="padding:0px; width:80%" class="" type="time" name="" id="intime" value=""></input> -->
                                           <input style="padding:0px; width:80%" type="text" onclick="timepicker(this,'a')" value="" id="intime" placeholder="Click here to select time"><br></br>
                                           Date IN : <input style="padding:0px; width:80%" class="" type="date" name="" id="indate" value=""></input><br></br>
                                           OdoMeter : <input style="padding:0px; width:76%" class="info" type="text" name="" id="inmeter" value=""></input>
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                                  <div class="col-md-6">  
                                        <div class="form-group cus">
                                            <label>Vehicle Out-Time</label>
                                           Time IN :  <!--<input style="padding:0px; width:80%" class="" type="time" name="" id="outtime" value=""></input><br></br>-->
                                           <input style="padding:0px; width:80%" type="text" onclick="timepicker(this,'a')" value="" id="outtime" placeholder="Click here to select time"><br></br>
                                           Date IN : <input style="padding:0px; width:80%" class="" type="date" name="" id="outdate" value=""></input><br></br>
                                           OdoMeter : <input style="padding:0px; width:76%" class="info" type="text" name="" id="outmeter" value=""></input>
                                        </div>
                                    </div>
                                     

                          </div>
                     </div>                      
                    <br>
<!--full form to insert invoice data-->

                <div class="row">
                    <div class="col-lg-12">
                      <div class="col-lg-12">
                            <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="table" name="table1" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                        <th style="width:33%"> <b style="color:#00A957">Total-$</b> <input style="width:150px; text-align:center; color:#00A957; border-color:white;" class="" type="text" value="0" id="total" /></th>
                                        <th style="width:33%"><b style="color:#FFb733">GST(10%)-$</b> <input style="width:150px; text-align:center; color:#FFb733  ; border-color:white;" class="" type="text" value="0" id="GST" /></th>
                                        <th style="width:33%"><b style="color:#CB0413">Balance-$</b> <input style="width:150px; text-align:center; color:#CB0413; border-color:white;" class="" type="text" value="0" id="Bal" />   </th>
                                        <tr>
                                    </tbody>
                                </table>

                              </div>
                              </div>
                           </div>    
                      
                    </div>
                  </div> 
                 
                <div class="row">  
                   <div class="col-lg-12">                      
                                <div class="col-lg-12">
                                <div class="col-md-12">
    
                                    <div class="table-responsive">
                                            <table class="table table-bordered">

                                                <tr>

                                                    <td>
                                                        <div class="select-editable">
                                                            <select name=""  onchange="this.nextElementSibling.value=this.value">
                                                            <?php echo $option2?>    
                                                            </select>
                                                            <input style="size:100%" type="text" placeholder="Description" id="info" name="format" value=""/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="select-editable">
                                                            <select name="" onchange="this.nextElementSibling.value=this.value">
                                                            <?php echo $option1?> 
                                                            </select>
                                                            <input style="size:100%" type="text" placeholder="Part No" id="partNo" name="format" value=""/>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                    <input style="border-color:white;" type="text" name="" id="quantity" placeholder="Quantity"></input>
                                                    </td>
                                                    <td>
                                                    <input style="border-color:white;" type="text" name="" id="price" placeholder="Price"></input>
                                                    </td>
                                                    <td style="width:100px;">
                                                    
                                                    <a type="button" onClick="chamika()" class="btn btn-info btn-sm " name="send" id="butsend" data-target="" data-toggle="">Add Item</a>
                                                    </td>
                                                </tr>
                                            </table>  
                                        </div>
                                         
                                      </div>        
                                </div>                                
  

                        </div>
                    </div>
       
    
                <div class="row">
                    <div class="col-lg-12">
                      <div class="col-lg-12">
                            <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="table1" name="table1" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                        <th style="width:5%">No</th>
                                        <th style="width:25%">Description</th>
                                        <th style="width:25%">Part No</th>
                                        <th style="width:15%">Quantity</th>
                                        <th style="width:20%; text-align:center">Price </th>
                                        <th style="width:10%"> Action</th>
                                        <tr>
                                    </tbody>
                                </table>

                              </div>
                              </div>
                           </div>    
                      
                    </div>
                  </div> 
 
                  <div class="row">  
                   <div class="col-lg-12">                      
                                <div class="col-lg-12">
                                <div class="col-md-12">


                                <div class="table-responsive">
                                            <table class="table table-bordered">

                                                <tr>
                                                    <td>
                                                        <select id="select" style=""class="form-select" aria-label="Default select example">
                                                        <option value="Tax Invoice">Tax Invoice</option>
                                                        <option value="Quotation">Quotation</option>
                                                        <option value="Used car Sales Receipt">Used car Sales Receipt</option>
                                                        
                                                        </select>
                                                    </td>
                                                    <td>
                                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                                    <input class="form-check-input"placeholder="Deposit" style="border-color:white;" type="text" value="" id="deposite" />
                                                    </td>
                                                    <td>
                                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                                    <input class="form-check-input" placeholder="Write Note here.."style="border-color:white;"type="text" value="" id="note" />
                                                    </td> 
                                                    <td>
                                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" />
                                                    <label class="form-check-label" for="flexCheckDefault">Mark as Paid</label>
                                                    </td> 
                                                    <td style="width:100px;">
                                                    <a  class="btn btn-lg btn-success btn-sm login show-success-message modal-form" name="save" id="butsave" data-target="#login-form" data-toggle="">Save Invoice</a>
                                                    </td>

                                                </tr>
                                            </table>  
                                         </div>         
                                    <br>
                                         
                                      </div>        
                                </div>                                
                                </div>
                        <div class="col-md-12">
                        <div class="modal-footer">
                        <a type="button" href="invoice-home.php" id="Reset" class="btn  btn-danger"> Exit </a>
                        </div>  
                    </div>   

                        </div>
                    </div>



            </div>       
	    </div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		

<!--script for to be added rows and insert invoice full data-->  
<script>
$(document).ready(function() {
    var id = 1; 
    /*Assigning id and class for tr and td tags for separation.*/
            $("#butsend").click(function() {
            var newid = id++; 
            
            $("#table1").append('<tr valign="top" id="'+newid+'">\n\
            <td width="100px" class="items'+newid+'" >' + newid + '</td>\n\
            <td width="100px" class="info'+newid+'">' + $("#info").val() + '</td>\n\
            <td width="100px" class="partNo'+newid+'">' + $("#partNo").val() + '</td>\n\
            <td width="100px" class="quantity'+newid+'">' + $("#quantity").val() + '</td>\n\
            <td width="100px" class="price'+newid+'">' + $("#price").val() + '</td>\n\
            <td width="100px"><a class="btn btn-danger btn-xs login modal-form remCF"  id="'+newid+'">Remove</a></td>\n\
            </tr>');
          
            var new_price = $("#price").val() ;
            if(new_price!=""){
                var total_price = $("#total").val();
                $("#total").val(parseInt(new_price)+parseInt(total_price));
                $("#GST").val(((parseInt(total_price)+parseInt(new_price))*0.1));
                $("#Bal").val((parseInt(total_price)+parseInt(new_price))+((parseInt(total_price)+parseInt(new_price))*0.1));
            }else{

            }



        });
 
            $("#table1").on('click', '.remCF', function() {
            //var remove_value = $(this).parent().parent().("#price").val();
           // alert(remove_value);
                    var remove_price = new Array(); 
                    var id = $(this).attr("id");
                    remove_price.push($("#"+id+" .price"+id).html());
           if(remove_price!=""){
                    var total_price = $("#total").val();
                    $("#total").val(parseInt(total_price)-parseInt(remove_price));
                    $("#GST").val(((parseInt(total_price)-parseInt(remove_price))*0.1));
                    $("#Bal").val((parseInt(total_price)-parseInt(remove_price))+((parseInt(total_price)-parseInt(remove_price))*0.1));
                   // alert(remove_price);
           }else{

           }
            $(this).parent().parent().remove();

    });
    /*crating new click event for save button*/
            $("#butsave").click(function() {

                        var lastRowId = $('#table1 tr:last').attr("id"); /*finds id of the last row inside table*/
                        var items = new Array(); 
                        var info = new Array(); 
                        var partNo = new Array();
                        var quantity = new Array();
                        var price = new Array();
                        for ( var i = 1; i <= lastRowId; i++) {
                        items.push($("#"+i+" .items"+i).html()); /*pushing all the names listed in the table*/
                        info.push($("#"+i+" .info"+i).html()); /*pushing all the names listed in the table*/
                        partNo.push($("#"+i+" .partNo"+i).html()); /*pushing all the emails listed in the table*/
                        quantity.push($("#"+i+" .quantity"+i).html()); /*pushing all the emails listed in the table*/
                        price.push($("#"+i+" .price"+i).html()); /*pushing all the emails listed in the table*/
                        }


                        var intime = $('#intime').val();
                        var indate = $('#indate').val();
                        var inmeter = $('#inmeter').val();
                        var outtime = $('#outtime').val();
                        var outdate = $('#outdate').val();
                        var outmeter = $('#outmeter').val();
                      //  alert(outmeter);


                        var deposite = $('#deposite').val();
                        if(deposite==""){
                           var deposite=0;
                        }else{
                            var deposite = $('#deposite').val();
                        }
                        var note = $('#note').val();
                      // alert(deposite );
                        var cid = $('#cid').val();
                        //alert(cid);
                        var vid = $('#vid').val();
                        //var moonLanding = new Date();
                        
                        var token=Math.floor(Math.random() * 1000000) + 1
                        //alert(token);
                        var type= $('#select').val();
                        //alert(type);
                        var status = $('#flexCheckDefault:checked').val();
                    //condition to check invoice paid or not  
              
                        
                    if(cid!=null && vid!=null){
            
                                
                                    if( status!=null){
                                // milliseconds since Jan 1, 1970, 00:00:00.000 GMT
                                            //alert(status);
                                            // alert(date);
                                                var items = JSON.stringify(items); 
                                                var info = JSON.stringify(info); 
                                                var partNo = JSON.stringify(partNo);
                                                var quantity = JSON.stringify(quantity);
                                                var price = JSON.stringify(price);
                                                $.ajax({
                                                url: "invoice-backend.php",
                                                type: "post",
                                                data: {intime:intime,indate:indate,inmeter:inmeter,outtime:outtime,outdate:outdate,outmeter:outmeter,deposite:deposite,note : note,cid : cid, vid : vid, token : token, items:items ,info : info, partNo : partNo, quantity : quantity, price : price, status : status, type : type},
                                                success : function(data){
                                            // alert(data); /* alerts the response from php.*/
                                                    $('#displaysuccess').html(data)       
                                                }
                                                });
                                    }else{
                                // milliseconds since Jan 1, 1970, 00:00:00.000 GMT
                                                var stausNew = 0;
                                
                                            // alert(date);
                                                var items = JSON.stringify(items); 
                                                var info = JSON.stringify(info); 
                                                var partNo = JSON.stringify(partNo);
                                                var quantity = JSON.stringify(quantity);
                                                var price = JSON.stringify(price);
                                                $.ajax({
                                                url: "invoice-backend.php",
                                                type: "post",
                                                data: {intime:intime,indate:indate,inmeter:inmeter,outtime:outtime,outdate:outdate,outmeter:outmeter,deposite:deposite,note : note,cid : cid, vid : vid, token : token,items:items , info : info, partNo : partNo, quantity : quantity, price : price, status : stausNew, type : type},
                                                success : function(data){
                                            // alert(data); /* alerts the response from php.*/
                                                $('#displaysuccess').html(data);

                                                }
                                                });                   
                                    }
                    }else if(cid==null&& vid!=null){

                      // alert("Please Select Customer.!");
                       $('#displaydata').show();
                       $('#displaydata').html('<div class="alert alert-danger" role="alert"id=""><h3 style=" color:red;">Please Select Customer..!</h3></div>');
                    }else if(vid==null&&cid!=null){
                       //alert("Please Select Vehicle.!");
                       $('#displaydata1').show();
                       $('#displaydata1').html('<div class="alert alert-danger" role="alert"id=""><h3 style=" color:red;">Please Select Vehicle..!</h3></div>');
                    }else if(vid==null&&cid==null){
                       // alert("Please Select Customer & Vehicle.!");
                       $('#displaydata').show();
                       $('#displaydata1').show();
                       $('#displaydata').html('<div class="alert alert-danger" role="alert"id=""><h3 style=" color:red;">Please Select Customer..!</h3></div>');
                       $('#displaydata1').html('<div class="alert alert-danger" role="alert"id=""><h3 style=" color:red;">Please Select Vehicle..!</h3></div>');
                    }

            });

  
});

function chamika(){
    setTimeout(function (){
  // Something you want delayed.
    $("#info").val(null);
    $("#partNo").val(null);
    $("#quantity").val(null);
    $("#price").val(null);   
}, 1000);
// alert("chamika");

}

</script>

<!--script for filter customer and vehicle when fetch data from modal -->
<script>
 //set value as customer to the hidden input when click the add customer button    
$(".customer").click(function() {
    $('#customer-value').val('customer');
   // var cus=$('#customer-value').val();
   // alert(cus);
})
//set value as vehicle to the hidden input when click the add vehicle button   
$(".vehicle").click(function() {
    $('#vehicle-value').val('vehicle');
    //var veh=$('#vehicle-value').val();
   // alert(veh);
})


//function to delete selected data for vehicle and customer in invoice page
function chamika1(){
    
        //$("#cid").val(null);
        $('#displaydata').html(null);
        $('#delete1').hide();
        $('#add1').show();      
        //var cid=$("#cid").val();
        //alert(cid);
        //$("#id_suggesstions").show(); 
    }
    function chamika2(){
       // $("#cid").val(null);
        $('#displaydata1').html(null);
        $('#delete2').hide();
        $('#add2').show();   
       // $("#id_suggesstions").show(); 
    }
</script>


<!-- script to fetch data(customer/vehicle) from modal using ajax-->
<script type="text/javascript">
    function filter_data(){
        var filter_input = $('#searchword').val();
        var cus = $('#customer-value').val();
        var veh = $('#vehicle-value').val();
         
        
        // alert(filter_input);

        if(cus=="customer"){
            $('#displaydata').show();
            $('#add1').hide();
            $('#delete1').show();
                $.ajax({
                    'type': 'POST',
                    'url' : 'add-customer-invoice.php',
                    'data' : 'name='+filter_input,
                    success : function(result)
                    {
                    //alert(result);
                    //$("#new_row").html(result);
                    $('#displaydata').html(result);
                    //vartr = $("#new_row").parent();
                    //tr.replaceWith(result);
                    $("#searchword").val(null);
                    $("#customer-value").val(null);
                    }
                });
        }
        if(veh=="vehicle"){
            $('#add2').hide();
            $('#delete2').show();
            $('#displaydata1').show(); 
                    $.ajax({
                    'type': 'POST',
                    'url' : 'add-vehicle-invoice.php',
                    'data' : 'name='+filter_input,
                    success : function(result)
                    {
                    //alert(result);
                    //$("#new_row").html(result);
                    $('#displaydata1').html(result);
                    //vartr = $("#new_row").parent();
                    //tr.replaceWith(result);
                    $("#searchword").val(null);
                    $("#vehicle-value").val(null);
                    }
                });
        }        
    }

</script>


<!-- script to fetch data(customer) to modal window using ajax-->
<script type="text/javascript">
    function filter_data_modal1(){
        var action ="chamika";
        $("#id_suggesstions").show();
        // alert(filter_input);
        $.ajax({
        'type': 'POST',
        'url' : 'add-customer-modal.php',
        'data' : 'name='+action,
        success : function(result)
        {
        //alert(result);
        //$("#new_row").html(result);
        $('#id_suggesstions').html(result);
        //vartr = $("#new_row").parent();
        //tr.replaceWith(result);
       
        }
        });
    }
</script>

<!-- script to fetch data(vehicle) to modal window using ajax-->
<script type="text/javascript">
    function filter_data_modal2(){
        var action ="chamika";
        $("#id_suggesstions").show();
        // alert(filter_input);
        $.ajax({
        'type': 'POST',
        'url' : 'add-vehicle-modal.php',
        'data' : 'name='+action,
        success : function(result)
        {
        //alert(result);
        //$("#new_row").html(result);
        $('#id_suggesstions').html(result);
        //vartr = $("#new_row").parent();
        //tr.replaceWith(result);
       
        }
        });
    }
</script>

<!-- javascript  to autocomplete  for customer/vehicle -->
<script>
$(document).ready(function(){
    
    // when any character press on the input field keyup function call
    
        $("#searchword").keyup(function(){
         var cus=$('#customer-value').val();
         var veh=$('#vehicle-value').val();
        if(cus=="customer"){
                $.ajax({
                type: "POST", // here used post method
                url: "customer-autocomplete.php",//php file where retrive the post value and fetch all the matched item from database
                data:'searchterm1='+$(this).val(),//send data or search term to readname file to process
                beforeSend: function(){
                    // show loader icon
                    $("#searchword").css("background","#FFF url(LoaderIcon.gif) no-repeat 175px");
                },
                success: function(data){
                    // get the output from database on success
                    $("#id_suggesstions").show();//show the suggestions
                    $("#id_suggesstions").html(data);//append data in the box for selection
                    $("#searchword").css("background","#FFF");
                }
                });
        }
        if(veh=="vehicle"){
            $.ajax({
            type: "POST", // here used post method
            url: "vehicle-autocomplete.php",//php file where retrive the post value and fetch all the matched item from database
            data:'searchterm2='+$(this).val(),//send data or search term to readname file to process
            beforeSend: function(){
                // show loader icon
                $("#searchword").css("background","#FFF url(LoaderIcon.gif) no-repeat 175px");
            },
            success: function(data){
                // get the output from database on success
                $("#id_suggesstions").show();//show the suggestions
                $("#id_suggesstions").html(data);//append data in the box for selection
                $("#searchword").css("background","#FFF");
            }
            });
            }        

    });
   

});
// call this function after select one of these suggestion for hide the suggestion box and select the value
function selectname(selected_value) {
	$("#searchword").val(selected_value);
	$("#id_suggesstions").hide();
 
}
  //when execute press close button
  function close_data(){
        $('#customer-value').val(null);
        $('#vehicle-value').val(null);
        $("#searchword").val(null);
    }
</script>

<!-- javascript  to autocomplete  for vehicle 
<script>
$(document).ready(function(){
    // when any character press on the input field keyup function call
    $("#searchword").keyup(function(){
        var veh=$('#vehicle-value').val();

        if(veh=="vehicle"){
            $.ajax({
            type: "POST", // here used post method
            url: "vehicle-autocomplete.php",//php file where retrive the post value and fetch all the matched item from database
            data:'searchterm2='+$(this).val(),//send data or search term to readname file to process
            beforeSend: function(){
                // show loader icon
                $("#searchword").css("background","#FFF url(LoaderIcon.gif) no-repeat 175px");
            },
            success: function(data){
                // get the output from database on success
                $("#id_suggesstions").show();//show the suggestions
                $("#id_suggesstions").html(data);//append data in the box for selection
                $("#searchword").css("background","#FFF");
            }
            });
            }

    });
});
// call this function after select one of these suggestion for hide the suggestion box and select the value
function selectname(selected_value) {
	$("#searchword").val(selected_value);
	$("#id_suggesstions").hide();
 
}

</script> -->

</body>
</html>
  <!-- Start customer/vehicle modal window -->
  <div aria-hidden="false" role="dialog" tabindex="-1" id="login-form" class="modal leread-modal fade in">
    <div class="modal-dialog">
      <!-- Start login section -->
         <div id="login-content" class="modal-content">

                            <div class="modal-header" >
                            <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Add New</h4>
                            </div>
                           <div class="modal-body">
                                      
                                           <!-- index.php   -->
                                        <div class="row">
                                                    <div class="search-frm">
                                                    <div class="col-lg-12">
                                                        <div class="col-lg-10">
                                                            <input type="text" id="searchword" placeholder="Start search...." autofocus/> 
                                                            *Search your details here....
                                                        </div>
                                                        <div class="col-lg-2">    
                                                        </div>
                                                    </div>
                                                    </div> 
                                        </div>  <br>
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div id="id_suggesstions"></div> 
                                                </div>
                                        </div>
                                                           

                               </div>
       
                            <div class="modal-footer">
                            
                                <a type="button" onClick="filter_data()" data-dismiss="modal"class="btn btn-success">Save changes</a>
                                <a type="button" onClick="close_data()" class="btn btn-danger" data-dismiss="modal">Close</a>
                            </div>


      </div>
    </div>
</div>
       
<!-- modal to time picker -->

<div class="timepicker_wrapper" >
    <div class="modal-content1">
        <div class="timepicker_wrapper_main">
            <p class="timepicker_header">
                <b>12</b>:<b>00</b>
                <b>AM</b>
            </p>
            <div class="timepicker_data_select">
                <select onchange="changeTimepickerheader(this,'1')" size="2" class="timepicker_hour"></select>
                <select onchange="changeTimepickerheader(this,'2')" size="2"  class="timepicker_minute"></select>
                <select onchange="changeTimepickerheader(this,'3')" size="2" class="timepicker_ampm">
                    <option value="AM">AM</option><option value="PM">PM</option>
                </select>
            </div>    
            <div class="modal-footer">
               <a type="button"class="btn btn-danger" onclick="timepicker(this,'x')">Close</a><a type="button" class="btn btn-primary" onclick="timepicker(this,'c')">Clear</a><a type="button" class="btn btn-success" onclick="timepicker(this,'s')">Set</a>
            </div>   
        </div>

    </div>
</div>