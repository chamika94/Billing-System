
<?php

session_start();

if(!isset($_SESSION['userID'])) {
    header('Location: login.php');
}

?>
<?php
include 'db.php';
$select = "SELECT * FROM admin_task";
$result = $con->query($select);
$option = '<option value="">Select Task</option>';
while($row = $result->fetch_object()){
    $option .= '<option value="'.$row->task.'">'.$row->task.'</option>';
}

?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Summary Report</title>
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
 <!-- style for progress bar -->  
 <style>
      .progressbar {
      margin: 50px 0 50px 0;
      counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 13%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
      
  }
  .progressbar li:before {
      width: 20px;
      height: 20px;
      content: '';
      line-height: 30px;
      border: 2px solid #7d7d7d;
      background-color: #7d7d7d;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      transition: all .8s;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 7px;
      left: -50%;
      z-index: -1;
      transition: all .8s;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active:before {
      border-color: #55b776;
      background-color: #55b776;
      transition: all .8s;
  }
  .progressbar li.active:after {
      background-color: #55b776;
      transition: all .8s;
  }

</style>


<!-- style for checklist components-->
<style>
    .form-group1{
  padding:10px;
  border: 0.1em solid;
  margin:10px;
  border-radius: 4px;
  box-shadow: 0 0 0.3in -0.2in rgba(0, 0, 0, 0.5);
  background-color:;
}
.form-group2{
  padding:5px;
  border: 0.1em solid;
  margin:5px;
  border-radius: 4px;
  box-shadow: 0 0 0.3in -0.2in rgba(0, 0, 0, 0.5);
  background-color:;
  height:50%;
}
.form-group1>label{
  position:absolute;
  top:-1px;
  left:20px;
  background-color:white;
}
.info{
    background-color:#f5f5f0;
    border: 0.1px solid;
    border-radius: 2px;
    
}

.description{
    background-color:#f5f5f0;
    border: 0.1px solid;
    border-radius: 2px;
 
}
.topic{
    margin-left:5%;
}
.center {
margin: auto;
width: 70%;

padding: 5px;
}

</style>
<!-- scrpt to style table-->
<style>
	.table{
		box-shadow:0.2in -0.1in 0 0  rgba(0, 0, 0, 0.5);
		border-radius: 1px;
		background-color:#f5f5f0;
	}
</style>

</head>
<!-- script to add all data to the database-->
<script type="text/javascript">
 
$(document).ready(function (e){
        $("#uploadForm").on('submit',(function(e){ e.preventDefault();

                        var token=Math.floor(Math.random() * 1000000) + 1
                        $('#token').val(token);
                        var cid = $('#cid').val();
                        //alert(cid);
                        var vid = $('#vid').val();

                            if(cid!=null && vid!=null){
                                                if (confirm("Do you want to save data?")) {
                                                    $.ajax({
                                                    url: "summaryreport-backend.php",
                                                    type: "POST",
                                                    data: new FormData(this),
                                                    contentType: false, cache: false, processData:false,
                                                    success: function(data){
                                                    $('.panel').html(data);
                                                    },
                                                    error: function(){}
                                                    });
                                                }
                            }else if(cid==null&& vid!=null){

                            // alert("Please Select Customer.!");
                            $('#displaydata').show();
                            $('#displaydata').html('<div class="alert alert-danger" role="alert"id=""><h3 style=" color:red;">Please Select Customer..!</h3></div>');
                            alert("Please Select Customer..!");
                            }else if(vid==null&&cid!=null){
                            //alert("Please Select Vehicle.!");
                            $('#displaydata1').show();
                            $('#displaydata1').html('<div class="alert alert-danger" role="alert"id=""><h3 style=" color:red;">Please Select Vehicle..!</h3></div>');
                            alert("Please Select Vehicle..!");
                            }else if(vid==null&&cid==null){
                            // alert("Please Select Customer & Vehicle.!");
                            $('#displaydata').show();
                            $('#displaydata1').show();
                            $('#displaydata').html('<div class="alert alert-danger" role="alert"id=""><h3 style=" color:red;">Please Select Customer..!</h3></div>');
                            $('#displaydata1').html('<div class="alert alert-danger" role="alert"id=""><h3 style=" color:red;">Please Select Vehicle..!</h3></div>');
                            alert("Please Select Customer & Vehicle..!");
                            }

        }));
});
</script>

<!-- script to preview images-->
<script>
    function previewFile1(input){
        var file = $("#img1").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg1").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile2(input){
        var file = $("#img2").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg2").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile3(input){
        var file = $("#img3").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg3").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile4(input){
        var file = $("#img4").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg4").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile5(input){
        var file = $("#img5").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg5").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile6(input){
        var file = $("#img6").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg6").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile7(input){
        var file = $("#img7").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg7").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile8(input){
        var file = $("#img8").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg8").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile9(input){
        var file = $("#img9").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg9").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile10(input){
        var file = $("#img10").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg10").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile11(input){
        var file = $("#img11").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg11").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile12(input){
        var file = $("#img12").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg12").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile13(input){
        var file = $("#img13").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg13").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile14(input){
        var file = $("#img14").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg14").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile15(input){
        var file = $("#img15").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg15").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile16(input){
        var file = $("#img16").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg16").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }           
</script>
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
				<div class="profile-usertitle-info">Summary Report</div>
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
   <!--     <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Vehicle</h1>
				</div>
		</div>  -->
        
		<div class="panel panel-container">    
            
        <form enctype="multipart/form-data" id="uploadForm" action="checklist-backend.php" method="post">
        <input id="token" name="token" type="hidden"></input>
                <!-- ===================================== -->
                <div class="body_next">
                <section class="section_next"> 
                    
                        <div class="col-md-12">
                                
                                   <div class="col-md-6">  
                                       <!-- =======================================--> 
                                        <div class="row">
                                           <div class="col-md-12"> 
                                            <div class="form-group1">
                                                <label>Customer</label>
                                                    <a class="btn btn-info btn-sm customer login modal-form" data-target="#login-form" style=" margin-left: 42%;margin-top:15px"data-toggle="modal" onClick="filter_data_modal1()" id="add1"href="#">Add</a>
                                                    <a class="btn btn-danger btn-sm login modal-form" data-target="#login-form" style="display:none;margin-left: 42%;margin-top:15px" data-toggle=""onClick="chamika1()" href="#"id="delete1">Delete</a>
                                                    <input type="hidden" id="customer-value" value=""></input><br></br>
                                                    <div class="col-md-12"><div id="displaydata"></div></div> 
                                                </div>    
                                            </div>                                           
                                        </div>
                                        <!-- =======================================--> 
                                        <div class="row">
                                          <div class="col-md-12"> 
                                            <div class="form-group1">
                                                <label>Vehicle</label>
                                                <a class="btn btn-info btn-sm vehicle login modal-form" data-target="#login-form" style=" margin-left: 42%;margin-top:15px"data-toggle="modal" onClick="filter_data_modal2()" href="#"id="add2">Add</a>
                                                <a class="btn btn-danger btn-sm login modal-form" data-target="#login-form" style="display:none;margin-left: 42%;margin-top:15px" data-toggle=""onClick="chamika2()" href="#"id="delete2">Delete</a>
                                                <input type="hidden" id="vehicle-value" value=""></input><br></br>
                                                <div class="col-md-12"><div id="displaydata1"></div></div> 
                                               </div>  
                                            </div>                                            
                                        </div>
                                        <!-- =======================================--> 
                                        <div class="row">
                                                <div class="col-md-6">  
                                                    <div class="form-group1">
                                                        <label>Vehicle In-Time</label>
                                                    Time IN :  <input style="padding:0px; width:60%" class="" type="time" name="vtime" id="" value=""></input><br></br>
                                                    Date IN : <input style="padding:0px; width:60%" class="" type="date" name="vdate" id="" value=""></input><br></br>
                                                    OdoMeter : <input style="padding:0px; width:50%" class="info" type="text" name="vmeter" id="" value=""></input>
                                                    </div>
                                                </div>
            
                                                <div class="col-md-6">  
                                                    <div class="form-group1">
                                                        <label>Vehicle Out-Time</label>
                                                    Time IN :  <input style="padding:0px; width:60%" class="" type="time" name="ctime" id="" value=""></input><br></br>
                                                    Date IN : <input style="padding:0px; width:60%" class="" type="date" name="cdate" id="" value=""></input><br></br>
                                                    OdoMeter : <input style="padding:0px; width:50%" class="info" type="text" name="cmeter" id="" value=""></input>
                                                    </div>
                                                </div>                                           
                                        </div>                                    
                                  </div> 
                   <!-- =======================================-->               
                  <!-- =======================================-->                                 
                                    <div class="col-md-6">
                                          <div class="form-group1">
                                            <label>Tasks</label>
                                                 <div class="col-md-12"><div class="col-md-3">Task 1 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task1" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 2 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task2" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 3 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task3" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 4 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task4" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 5 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task5" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 6 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task6" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 7 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task7" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 8 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task8" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 9 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task9" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 10 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task10" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 11 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task11" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 12 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task12" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 13 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task13" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 14 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task14" ><?php echo $option?></select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 15 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task15" ><?php echo $option?></select></div></div><br></br>
                                            </div>
                                     </div>
                  <!-- =======================================-->               
                   <!-- =======================================-->
                    </div>
                </section>       
<!-- ============================================================================================================-->
               <section class="section_next"> 
                <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-1</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title1" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info1"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div id="yourContainer" class="center"><img   style="width: 200px; height: 100px; object-fit: contain;"                             id="previewImg1"                                     src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;" name="img1" id="img1" onchange="previewFile1(this);"     type="file" value=""></input></div>
                             </div>
                   </div>  
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-2</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title2" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info2"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg2"                                   style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img2" id="img2" onchange="previewFile2(this);"     type="file" value=""></input></div>
                             </div>
                   </div>  
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-3</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title3" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info3"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg3"                                   style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img3" id="img3" onchange="previewFile3(this);"     type="file" value=""></input></div>
                             </div>
                   </div>                                     
               </section>
<!-- ============================================================================================================-->
<section class="section_next"> 
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-4</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title4" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info4"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg4"                                   style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img4" id="img4" onchange="previewFile4(this);"     type="file" value=""></input></div>
                             </div>
                   </div>
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-5</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title5" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info5"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg5"                                   style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img5" id="img5" onchange="previewFile5(this);"     type="file" value=""></input></div>
                             </div>
                   </div>  
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-6</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title6" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info6"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg6"                                   style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img6" id="img6" onchange="previewFile6(this);"     type="file" value=""></input></div>
                             </div>
                   </div>                                      
               </section>

<!-- ============================================================================================================-->
<section class="section_next"> 
                <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-7</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title7" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info7"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg7"                                    style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img7" id="img7" onchange="previewFile7(this);"     type="file" value=""></input></div>
                             </div>
                   </div>  
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-8</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title8" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info8"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg8"                                   style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img8" id="img8" onchange="previewFile8(this);"     type="file" value=""></input></div>
                             </div>
                   </div> 
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-9</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title9" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info9"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg9"                                    style="width: 200px; height: 100px; object-fit: contain;" src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img9" id="img9" onchange="previewFile9(this);"     type="file" value=""></input></div>
                             </div>
                   </div>                                      
               </section>
<!-- ============================================================================================================-->
<section class="section_next"> 
 
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-10</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title10" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info10"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg10"                                    style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img10" id="img10" onchange="previewFile10(this);"     type="file" value=""></input></div>
                             </div>
                   </div>  
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-11</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title11" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info11"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg11"                                    style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img11" id="img11" onchange="previewFile11(this);"     type="file" value=""></input></div>
                             </div>
                   </div>  
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-12</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title12" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info12"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg12"                                   style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="wi
                                    dth:100%;"name="img12" id="img12" onchange="previewFile12(this);"     type="file" value=""></input></div>
                             </div>
                   </div>                                     
               </section>

<!-- ============================================================================================================-->
<section class="section_next"> 
                <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-13</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title13" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info13"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg13"                                   style="width: 200px; height: 100px; object-fit: contain;" src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input style="width:100%;"name="img13" id="img13" onchange="previewFile13(this);"     type="file" value=""></input></div>
                             </div>
                   </div>  
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-14</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title14" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info14"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg14"                                   style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input name="img14" id="img14" onchange="previewFile14(this);"     type="file" value=""></input></div>
                             </div>
                   </div> 
                   <div class="col-md-4"> 
                            <div class="form-group1" style="margin-center;">
                                        <label>Task-15</label>
                                        
                                   <h3 style="text-align:center"><b>Title</b></h3><select class="description" style=" width:100%" name="title15" ><?php echo $option?></select><br></br>
                                   <div style=""> Descrption :  <textarea                      name="info15"                          style="padding:10px; width:100%;"class="description" rows="5" id="address" ></textarea></div>
                                    <div class="center"><img                                id="previewImg15"                                   style="width: 200px; height: 100px; object-fit: contain;"  src="images/preview.png" ></div>
                                    <div class="center">Upload Image <input name="img15" id="img15" onchange="previewFile15(this);"     type="file" value=""></input></div>
                             </div>
                   </div>                                     
               </section>
<!-- ============================================================================================================-->
<section class="section_next"> 

                  <div class="col-md-2"> 

                   </div> 
                   <div class="col-md-8"> 
                            <div class="form-group1" style="margin-center;">
                                        <label></label>
                                        <h4 style="text-align:center;margin-top:-3px;"><b>Summary</b></h4>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 1 : </div><div class="col-md-8"><input name="comment1" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 2 : </div><div class="col-md-8"><input name="comment2" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 3 : </div><div class="col-md-8"><input name="comment3" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 4 : </div><div class="col-md-8"><input name="comment4" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 5 : </div><div class="col-md-8"><input name="comment5" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 6 : </div><div class="col-md-8"><input name="comment6" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 7 : </div><div class="col-md-8"><input name="comment7" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 8 : </div><div class="col-md-8"><input name="comment8" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 9 : </div><div class="col-md-8"><input name="comment9" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 10 : </div><div class="col-md-8"><input name="comment10" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 11 : </div><div class="col-md-8"><input name="comment11" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 12 : </div><div class="col-md-8"><input name="comment12" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 13 : </div><div class="col-md-8"><input name="comment13" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 14 : </div><div class="col-md-8"><input name="comment14" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                        <div class="col-md-12"><div class="col-md-4">Recommendation 15 : </div><div class="col-md-8"><input name="comment15" style="padding:0px; width:100%;" class="description" type="text"value=""></input></div></div><br></br>
                                       


                                        
                             </div>
                   </div>      
                   <div class="col-md-2"> 

                   </div>                                 
               </section>
<!-- ============================================================================================================-->
</div>
                  <!-- button instead of in scripted button-->

                  <div class="row">
                    <div class="col-md-12">
                    <div class="container">
                    <div class="row">
                        <div class="col" >
                        <ul id="progress-bar" class="progressbar"style="margin-top:-45px">
                            <li class="active">Step 1</li>
                            <li>Step 2</li>
                            <li>Step 3</li>
                            <li>Step 4</li>
                            <li>Step 5</li>
                            <li>Step 6</li>
                            <li>Final</li>
                            
 
                        </ul>
                        </div>
                    </div>
                    </div>
               </div>
              </div>  




                  <div class="row">
                    <div class="col-md-12">
                        <div class="modal-footer">
                        <a type="button" id="Back"class="btn btn-sm btn-success prev" style="display:none">&#60; Previous</a>
                        <a type="button" id="Next" class="btn btn-sm btn-info next"> Next &#62;</a>
                        <button type="submit" id="" name="" value="" class="btn btn-sm btn-warning finish" style="display:none"> finish</button>
                        <button type="submit" id="" name="" value="" class="btn btn-sm btn-primary save" style="display:none"> Save</button>
                        <a type="button" href="summaryreport-home.php" id="Reset" class="btn btn-sm btn-danger"> Exit </a>
                        </div>  
                    </div>
                 </div>
</form>

    
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
 <!-- script to show sections as a pages--> 
<script>
    $(function() {

/* add next/previous buttons to all class body_next */

//$(".body_next").append('<button type="button" class="btn-info next">Next &#62;</button>');
//$(".body_next").append('<button type="button" class="btn-danger prev" style="display:none">&#60; Previous</button>');
// $(".body_next").append('<button type="button" class="btn-danger save" style="display:none">Save</button>');

var tracker = 1;
var n = $(".section_next").length;
//alert(n);

/* hide all section_next except the first */
$(".body_next").each(function() {
  $(".section_next:not(:first)", this).hide();
});

$(".next").click(function() {
  $(".section_next:visible").next(".section_next:hidden").show().prev(".section_next:visible").hide();

  tracker++;

  /* show previous button if displayed section is not the first one */
  if (tracker > 1) {
    $(".prev").show();
    $(".finish").show();
  }

  /* hide next button if displayed section is the last one */
  if (tracker == n) {
    $(".next").hide();
    $(".finish").hide();
    $(".save").show();
  }
});

$(".prev").click(function() {
  $(".section_next:visible").prev(".section_next:hidden").show().next(".section_next:visible").hide();

  tracker = tracker - 1;

  /* show next button if displayed section is not the first one */
  if (tracker > 1) {
    $(".next").show();
    $(".finish").show();
    $(".save").hide();
  }

  /* hide previous button if displayed section is the first one */
  if (tracker == 1) {
    $(".prev").hide();
    $(".finish").hide();
  }
});
});
</script>
<!-- script for progress bar -->
<script>
    var progressBar = {
  Bar : $('#progress-bar'),
  Reset : function(){
    if (this.Bar){
      this.Bar.find('li').removeClass('active'); 
    }
  },
  Next: function(){
    $('#progress-bar li:not(.active):first').addClass('active');
  },
  Back: function(){
    $('#progress-bar li.active:last').removeClass('active');
  }
}

progressBar.Reset();

////
$("#Next").on('click', function(){
  progressBar.Next();
})
$("#Back").on('click', function(){
  progressBar.Back();
})
$("#Reset").on('click', function(){
  progressBar.Reset();
})
</script>	

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
//for customer
    function chamika1(){
    
        //$("#cid").val(null);
        $('#displaydata').html(null);
        $('#delete1').hide();
        $('#add1').show();
        
        //var cid=$("#cid").val();
        //alert(cid);
        //$("#id_suggesstions").show(); 
    }
//for vehicle  
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

         var veh=$('#vehicle-value').val();    
         var cus=$('#customer-value').val();
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

</script>


<script>
    function close_data(){
        $("#searchword").val(null);
        $('#customer-value').val("");
        $('#vehicle-value').val("");
    }
</script>

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