
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
	<title>CheckList</title>
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
  <!-- style for progress bar -->  
    <style>
      .progressbar {
      margin: 50px 0 50px 0;
      counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 20%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
      
  }
  .progressbar li:before {
      width: 22px;
      height: 22px;
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
    .form-group{
  padding:10px;
  border: 0.1em solid;
  margin:10px;
  border-radius: 4px;
  box-shadow: 0 0 0.3in -0.2in rgba(0, 0, 0, 0.5);
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
.info{
    background-color:#f5f5f0;
    border: 0.1px solid;
    border-radius: 2px;
    
}
.info1{
    background-color:#f5f5f0;
    border: 0.1px solid;
    border-radius: 2px;
    width:90%;
    margin-left:5%;    
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

</head>
<!-- script to add all data to the database-->
<script type="text/javascript">
 
$(document).ready(function (e){
    var token=Math.floor(Math.random() * 1000000) + 1
    $('#token').val(token);
    $('#token_copy').val(token);
       $("#uploadForm_page1").on('submit',(function(e){ e.preventDefault();
    
       // $("#uploadForm").submit(); // Submit the form
   
                        var cid = $('#cid').val();
                        var vid = $('#vid').val();

//assign cid and vid to contiune pages 2/3/4
                        $('#cid_copy').val(cid);
                        $('#vid_copy').val(vid);
                                                    $.ajax({
                                                    url: "checklist-page1-backend.php",
                                                    type: "POST",
                                                    data: new FormData(this),
                                                    contentType: false, cache: false, processData:false,
                                                    success: function(data){
                                                   // $('.panel').html(data);
                                                    },
                                                    error: function(){}
                                                    });           
                        
      /*                      if(cid!=null && vid!=null){
                                                    $.ajax({
                                                    url: "checklist-page1-backend.php",
                                                    type: "POST",
                                                    data: new FormData(this),
                                                    contentType: false, cache: false, processData:false,
                                                    success: function(data){
                                                   // $('.panel').html(data);
                                                    },
                                                    error: function(){}
                                                    });
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
                            }  */

        }));
        $("#uploadForm").on('submit',(function(e){ e.preventDefault();
    
    // $("#uploadForm").submit(); // Submit the form

                     var cid = $('#cid').val();
                     var vid = $('#vid').val();

                         if(cid!=null && vid!=null){
                                                 $.ajax({
                                                 url: "checklist-backend.php",
                                                 type: "POST",
                                                 data: new FormData(this),
                                                 contentType: false, cache: false, processData:false,
                                                 success: function(data){
                                                 $('.panel').html(data);
                                                 },
                                                 error: function(){}
                                                 });
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
     //to delete back to page-1
     $(".prev1").click(function() {
 
                     var cid = $('#cid_copy').val();
                     var vid = $('#vid_copy').val();
                     var token = $('#token_copy').val();
                                                    $.ajax({
                                                        url: "delete-checklist-page1.php",
                                                        type: "post",
                                                        data: {cid : cid, vid : vid, token : token},
                                                    success : function(data){
                                                   // $('.panel').html(data);
                                                    },
                                                    error: function(){}
                                                    });  
  
     });
          $(".prev1").click(function() {
 
                     var cid = $('#cid_copy').val();
                     var vid = $('#vid_copy').val();
                     var token = $('#token_copy').val();
                                                    $.ajax({
                                                        url: "delete-checklist-page1.php",
                                                        type: "post",
                                                        data: {cid : cid, vid : vid, token : token},
                                                    success : function(data){
                                                   // $('.panel').html(data);
                                                    },
                                                    error: function(){}
                                                    });  
  
       });
       $(".exit").click(function() {
 
                    var cid = $('#cid_copy').val();
                    var vid = $('#vid_copy').val();
                    var token = $('#token_copy').val();
                                                    $.ajax({
                                                        url: "delete-checklist-page1.php",
                                                        type: "post",
                                                        data: {cid : cid, vid : vid, token : token},
                                                    success : function(data){
                                                // $('.panel').html(data);
                                                    },
                                                    error: function(){}
                                                    });  

        });


});
</script>

<!-- script to show sections as a pages--> 
<script>
    $(function() {

/* add next/previous buttons to all class body_next */

//$(".body_next").append('<button type="button" class="btn-info next">Next &#62;</button>');
//$(".body_next").append('<button type="button" class="btn-danger prev" style="display:none">&#60; Previous</button>');
// $(".body_next").append('<button type="button" class="btn-danger save" style="display:none">Save</button>');

var tracker = 1;
var n = $(".section_next").length;

/* hide all section_next except the first */
$(".body_next").each(function() {
  $(".section_next:not(:first)", this).hide();
  $("#footer").hide();
 
});

$(".next").click(function() {
 // $("#footer").show();
  $(".section_next:visible").next(".section_next:hidden").show().prev(".section_next:visible").hide();

  tracker++;

  if (tracker == 3) {
    $("#footer").show();
  
  }

  /* show previous button if displayed section is not the first one */
  if (tracker > 2) {
    $(".prev").show();
  
  }
  if (tracker == 2) {
    $(".prev1").show();
  
  }
  /* hide next button if displayed section is the last one */
  if (tracker == n) {
    $(".next").hide();
    $(".save").show();
  }
});

$(".prev").click(function() {
  $(".section_next:visible").prev(".section_next:hidden").show().next(".section_next:visible").hide();

  tracker = tracker - 1;

  /* show next button if displayed section is not the first one */
  if (tracker > 1) {
    $(".next").show();
    $(".save").hide();
  }

  /* hide previous button if displayed section is the first one */
  if (tracker == 1) {
    $(".prev").hide();
    $("#footer").hide();

  }
  if (tracker == 2) {
    $(".prev").show();
    $("#footer").hide();

  }
});
$(".prev1").click(function() {
  $(".section_next:visible").prev(".section_next:hidden").show().next(".section_next:visible").hide();

  tracker = tracker - 1;

  
});







});
</script>
<!-- script to image previwe -->
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
				<div class="profile-usertitle-info">CheckList</div>
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
       
		<div class="panel chamika panel-container">    
           
<form enctype="multipart/form-data" id="uploadForm_page1" action="checklist-page1-backend.php" method="POST">
    <input id="token" name="token" type="hidden"></input>
                <!-- ===================================== -->
                <div class="body_next">
                <section class="section_next"> 
                    <div class="row">
                        <div class="col-sm-12">

                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label>Customer</label>
                                            <a class="btn btn-info btn-sm customer login modal-form" data-target="#login-form" style=" margin-left: 42%;margin-top:15px"data-toggle="modal" onClick="filter_data_modal1()" id="add1"href="#">Add</a>
                                                    <a class="btn btn-danger btn-sm login modal-form" data-target="#login-form" style="display:none;margin-left: 42%;margin-top:15px" data-toggle=""onClick="chamika1()" href="#"id="delete1">Delete</a>
                                                <input type="hidden" id="customer-value" value=""></input><br></br>
                                                <div class="col-sm-12"><div id="displaydata"></div>
                                                  <!--  <div style="box-shadow:0.08in -0.08in 0 0  rgba(0, 0, 0, 0.5);padding:10px;border: 0.1px solid;background-color:#FEF9E7;border-radius: 5px;"><em class="glyphicon glyphicon-pushpin"></em>
                                                         <p> <label for="">Name : </label> chamika Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc</p>
                                                         <p> <label for="">Address : </label> chamika Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc</p>
                                                         <p> <label for="">Mobile : </label> 0785284677</p>
                                                         <p> <label for="">Home : </label> 0255680288</p>
                                                         <p> <label for="">Office : </label> 0255680288</p>
                                                         <p> <label for="">email : </label> chamika Lorem ipsum dolor sit amet, consectetur adipiscing@gmail.com </p>
                                                    </div>
                                                    <br></br>      -->   
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                                  <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label>Vehicle</label>
                                            <a class="btn btn-info btn-sm vehicle login modal-form" data-target="#login-form" style=" margin-left: 42%;margin-top:15px"data-toggle="modal" onClick="filter_data_modal2()" href="#"id="add2">Add</a>
                                                <a class="btn btn-danger btn-sm login modal-form" data-target="#login-form" style="display:none;margin-left: 42%;margin-top:15px" data-toggle=""onClick="chamika2()" href="#"id="delete2">Delete</a>
                                            <input type="hidden" id="vehicle-value" value=""></input><br></br>
                                            <div class="col-sm-12"><div id="displaydata1"></div></div> 
                                        </div>
                                    </div>


                          </div>
                     </div>              
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="row">
                  <div class="col-md-12">
                        
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Oder Request</label>
                                                 <div class="col-md-12"><div class="col-md-3">Task 1 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task1" ><?php echo $option?> </select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 2 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task2" ><?php echo $option?> </select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 3 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task3" ><?php echo $option?> </select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 4 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task4" ><?php echo $option?> </select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 5 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task5" ><?php echo $option?> </select></div></div><br></br>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label></label>
                                            <div class="col-md-12"><div class="col-md-3">Task 6 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task6" ><?php echo $option?> </select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 7 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task7" ><?php echo $option?> </select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 8 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task8" ><?php echo $option?> </select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 9 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task9" ><?php echo $option?> </select></div></div><br></br>
                                                 <div class="col-md-12"><div class="col-md-3">Task 10 : </div><div class="col-md-9"><select class="description" style=" width:100%" name="task10" ><?php echo $option?> </select></div></div><br></br>
                                            </div>
                                        </div>                                       
                           
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                                    <div class="col-md-3">  
                                        <div class="form-group">
                                            <label>Vehicle In-Time</label>
                                           Time IN :  <!--<input style="padding:0px; width:60%" class="" type="time" name="vtime" id="" value=""></input><br></br>-->
                                           <input style="padding:0px; width:60%" type="text" onclick="timepicker(this,'a')" name="vtime" value="" id="intime" placeholder="Click here"><br></br>
                                           Date IN : <input style="padding:0px; width:60%" class="" type="date" name="vdate" id="" value=""></input><br></br>
                                           OdoMeter : <input style="padding:0px; width:51%" class="info" type="text" name="vmeter" id="" value=""></input>
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                                  <div class="col-md-3">  
                                        <div class="form-group">
                                            <label>Vehicle Out-Time</label>
                                           Time IN :  <!--<input style="padding:0px; width:60%" class="" type="time" name="ctime" id="" value=""></input><br></br>-->
                                           <input style="padding:0px; width:60%" type="text" onclick="timepicker(this,'a')" name="ctime" value="" id="intime" placeholder="Click here"><br></br>
                                           Date IN : <input style="padding:0px; width:60%" class="" type="date" name="cdate" id="" value=""></input><br></br>
                                           OdoMeter : <input style="padding:0px; width:51%" class="info" type="text" name="cmeter" id="" value=""></input>
                                        </div>
                                    </div>
                                    <div class="col-md-2">  
                                        <div class="form-group">
                                            <label>Picture1</label>
                                            <div class="logo"><img id="previewImg1" style="width: 110px; height: 70px; object-fit: contain;"  src="images/preview.png" ></div><br>
                                                <input style="padding:3px;width:100%;"onchange="previewFile1(this)" type="file" id="img1" name="img1"accept="image/*;capture=camera">

                                        </div>
                                    </div>                                    
                                    <div class="col-md-2">  
                                        <div class="form-group">
                                            <label>Picture2</label>
                                            
                                            <div class="logo"><img id="previewImg2" style="width: 110px; height: 70px; object-fit: contain;"  src="images/preview.png" ></div><br>
                                                <input style="padding:3px;width:100%;"onchange="previewFile2(this)"type="file" id="img2" name="img2"accept="image/*;capture=camera">
                                        </div>
                                    </div>  
                                    <div class="col-md-2">  
                                        <div class="form-group">
                                            <label>Picture3</label>
                                           
                                            <div class="logo"><img id="previewImg3" style="width: 110px; height: 70px; object-fit: contain;" src="images/preview.png" ></div><br>
                                                <input style="padding:3px;width:100%;"onchange="previewFile3(this)"type="file" id="img3" name="img3"accept="image/*;capture=camera">
                                        </div>
                                    </div>                                      

                          </div>
                     </div>    
    <!-- footer======================================== -->                   
            <div class="row probar">
                <div class="col-md-12">
                    <div class="container">
                    <div class="row">
                        <div class="col" >
                        <ul id="progress-bar" class="progressbar"style="margin-top:-45px">
                            <li class="">Customer & Vehicle Details</li>
                            <li>Summary</li>
                            <li>Breaks & Tyers</li>
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
                      
                        <button type="submit" id="Next" class="btn btn-sm btn-info next"> Next &#62;</button>
                        <a type="button" href="checklist-home.php" id="Reset" class="btn btn-sm btn-danger exit"> Exit </a>
                        </div>  
                    </div>
                 </div>
</form>
<!-- ==================footer End=====================--> 

                </section>       
                
                

  <!--............................................................page1............................... -->                
                <!-- =======================================-->               
                <!-- =======================================-->
                <section class="section_next"> 
                    <div class="row">
                        <div class="col-md-12">
<form enctype="multipart/form-data" id="uploadForm" action="checklist-page1-backend.php" method="POST">   
    <input id="token_copy" name="token_copy" type="hidden"></input> 
    <input id="cid_copy" name="cid_copy" type="hidden"></input>  
    <input id="vid_copy" name="vid_copy" type="hidden"></input>                        
                                    <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> ENGINE OIL AND FILTER CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_1" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_1" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_1" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> AIR CLEANER CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_2" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_2" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_2" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> POLLON FILTER CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_3" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_3" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_3" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> BREAK/CLUTCH FLUID CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_4" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_4" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_4" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>

                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> FUEL FILTER CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_5" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_5" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_5" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> SPARK PLUSS CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_6" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_6" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_6" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> DSG OIL AND FILTER CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_7" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_7" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_7" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> HALDEX OIL CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_8" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_8" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_8" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> DIFF OIL CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_9" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_9" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_9" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>                                                                                                                                                                                                                    
                 <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> TIMING BELT WATER PUMP CHANGED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_10" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_10" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_10" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> HEAD LAMP FOUCSED AND ADJUSTED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_11" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_11" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_11" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> DOORS SUN ROOF AND CON VETERALE ROOF ADJUSTED AND LUBRICATED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_12" id="" value="OKAY">
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_12" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_12" id="" value="NOT APPLICABLE"  checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> SERVICE INTERVAL RESET AND SERVICE REMINDER ATTACHED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_13" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_13" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_13" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group">
                                            <label></label>
                                            <h5> LOG BOOK STAMPED</h5>
                                                <div class="form-check" style="padding:2px; ">
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_14" id="" value="OKAY" >
                                                    <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                        OKAY
                                                    </label>
                                                    <input style="padding:10px" class="form-check-input" type="radio" name="page2_14" id="" value="NOT OKAY">
                                                    <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT OKAY 
                                                    </label>
                                                    <input style="padding:10px;" class="form-check-input" type="radio" name="page2_14" id="" value="NOT APPLICABLE" checked>
                                                    <label style="color:Navy;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                        NOT APPLICABLE
                                                    </label>
                                                </div> 
                                        </div>
                                    </div>   
                                    
                                    


            <div class="row probar">
                <div class="col-md-12">
                    <div class="container">
                    <div class="row">
                        <div class="col" >
                        <ul id="progress-bar" class="progressbar"style="margin-top:-45px">
                            <li class="active">Customer & Vehicle Details</li>
                            <li>Summary</li>
                            <li>Breaks & Tyers</li>
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
                        <a type="button" id="Back"class="btn btn-sm  btn-success prev1" style="">&#60; Previous</a>
                        <a type="button" id="Next" class="btn btn-sm btn-info next"> Next &#62;</a>
                        <a type="button" href="checklist-home.php" id="Reset" class="btn btn-sm btn-danger exit"> Exit </a>
                        </div>  
                    </div>
                 </div>


                </section> 
                

 <!--............................................................page2............................... -->                 
                <!-- =======================================-->
                <!-- ===================================== -->
                <section class="section_next"> 
                    <div class="row">
                        <div class="col-md-12">


                              <div class="col-md-4">  
                                    <div class="col-md-12">  
                   
                                            <div class="row">  
                                                <div class="form-group">
                                                    
                                                    <h5 style="text-align:;margin-top:-20px; width:90px; background-color: white;"> <b>Breaks Left</b></h5>
                                                    <h5> Breaks Condition Left-Front</h5>
                                                        <div class="form-check" style="padding:5px; text-align:center;">
                                                            <input style="padding:10px; color:green" class="form-check-input" type="radio" name="blf" id="" value="Green" checked>
                                                            <label style="color:green"class="form-check-label" for="exampleRadios1">
                                                                Green 
                                                            </label>
                                                            <input style="padding:10px; color:yellow" class="form-check-input" type="radio" name="blf" id="" value="Yellow">
                                                            <label style="color:#FFb733" class="form-check-label" for="exampleRadios2">
                                                                Yellow 
                                                            </label>
                                                            <input style="padding:10px; color:red" class="form-check-input" type="radio" name="blf" id="" value="Red">
                                                            <label style=" color:red" class="form-check-label" for="exampleRadios2">
                                                                Red
                                                            </label>
                                                        </div> 
                                                        <input placeholder="Thickness(mm)"style="padding:5px; width:100%" class="info" type="text" name="blfinfo" id="" value=""></input>


                                                     <h5>   Breaks Condition Left-Rear  </h5>    
                                                        <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:10px; color:green" class="form-check-input" type="radio" name="blb" id="" value="Green" checked>
                                                            <label style="color:green"class="form-check-label" for="exampleRadios1">
                                                                Green 
                                                            </label>
                                                            <input style="padding:10px; color:yellow" class="form-check-input" type="radio" name="blb" id="" value="Yellow">
                                                            <label style="color:#FFC733"class="form-check-label" for="exampleRadios2">
                                                                Yellow
                                                            </label>
                                                            <input style="padding:10px; color:red" class="form-check-input" type="radio" name="blb" id="" value="Red">
                                                            <label style=" color:red" class="form-check-label" for="exampleRadios2">
                                                                Red
                                                            </label>
                                                        </div> 
                                                        <input placeholder="Thickness(mm)" style="padding:5px; width:100%" class="info" type="text" name="blbinfo" id="" value=""></input>                                               
                                                </div>
                                            </div>

                                            
                                            <div class="row">  
                                                <div class="form-group">
                                                 
                                                 <h5 style="text-align:;margin-top:-20px; width:80px; background-color: white;"> <b>Tyers Left</b></h5>
                                                   <h5> Tyres Condition Left-Front</h5>
                                                        <div class="form-check" style="padding:5px; text-align:center;">
                                                            <input style="padding:10px; color:green" class="form-check-input" type="radio" name="tlf" id="" value="Green" checked>
                                                            <label style="color:green"class="form-check-label" for="exampleRadios1">
                                                                Green 
                                                            </label>
                                                            <input style="padding:10px; color:yellow" class="form-check-input" type="radio" name="tlf" id="" value="Yellow">
                                                            <label style="color:#FFC733"class="form-check-label" for="exampleRadios2">
                                                                Yellow 
                                                            </label>
                                                            <input style="padding:10px; color:red" class="form-check-input" type="radio" name="tlf" id="" value="Red">
                                                            <label style=" color:red" class="form-check-label" for="exampleRadios2">
                                                                Red
                                                            </label>
                                                        </div> 
                                                        <input placeholder="Thickness(mm)"style="padding:5px; width:100%" class="info" type="text" name="tlfinfo" id="" value=""></input>

                                                     <h5>   Tyers Condition Left-Rear  </h5>    
                                                        <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:10px; color:green" class="form-check-input" type="radio" name="tlb" id="" value="Green" checked>
                                                            <label style="color:green"class="form-check-label" for="exampleRadios1">
                                                                Green 
                                                            </label>
                                                            <input style="padding:10px; color:yellow" class="form-check-input" type="radio" name="tlb" id="" value="Yellow">
                                                            <label style="color:#FFC733"class="form-check-label" for="exampleRadios2">
                                                                Yellow
                                                            </label>
                                                            <input style="padding:10px; color:red" class="form-check-input" type="radio" name="tlb" id="" value="Red">
                                                            <label style=" color:red" class="form-check-label" for="exampleRadios2">
                                                                Red
                                                            </label>
                                                        </div> 
                                                        <input placeholder="Thickness(mm)" style="padding:5px; width:100%" class="info" type="text" name="tlbinfo" id="" value=""></input>                                              
                                                </div>
                                            </div>                                            
                               </div>
                           </div>                          
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">   
                                  <div class="col-md-12">  
      

                                  <img src="images/aa.png " style="width:100%;margin-top:30px" class="img-fluid" alt="Responsive image">
                                  


                                    </div>
               </div>                      
                <!-- =======================================-->
                <!-- ===================================== -->
                             <div class="col-md-4">  
                                    <div class="col-md-12">  
                   
                                            <div class="row">  
                                                <div class="form-group">
                                                    
                                                    <h5 style="text-align:;margin-top:-20px; width:100px; background-color: white;"> <b>Breaks Right</b></h5>
                                                    <h5> Breaks Condition Right-Front</h5>
                                                        <div class="form-check" style="padding:5px; text-align:center;">
                                                            <input style="padding:10px; color:green" class="form-check-input" type="radio" name="brf" id="" value="Green" checked>
                                                            <label style="color:green"class="form-check-label" for="exampleRadios1">
                                                                Green 
                                                            </label>
                                                            <input style="padding:10px; color:yellow" class="form-check-input" type="radio" name="brf" id="" value="Yellow">
                                                            <label style="color:#FFC733"class="form-check-label" for="exampleRadios2">
                                                                Yellow 
                                                            </label>
                                                            <input style="padding:10px; color:red" class="form-check-input" type="radio" name="brf" id="" value="Red">
                                                            <label style=" color:red" class="form-check-label" for="exampleRadios2">
                                                                Red
                                                            </label>
                                                        </div> 
                                                        <input placeholder="Thickness(mm)"style="padding:5px; width:100%" class="info" type="text" name="brfinfo" id="" value=""></input>


                                                     <h5>   Breaks Condition Right-Rear  </h5>    
                                                        <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:10px; color:green" class="form-check-input" type="radio" name="brb" id="" value="Green" checked>
                                                            <label style="color:green"class="form-check-label" for="exampleRadios1">
                                                                Green 
                                                            </label>
                                                            <input style="padding:10px; color:yellow" class="form-check-input" type="radio" name="brb" id="" value="Yellow">
                                                            <label style="color:#FFC733"class="form-check-label" for="exampleRadios2">
                                                                Yellow
                                                            </label>
                                                            <input style="padding:10px; color:red" class="form-check-input" type="radio" name="brb" id="" value="Red">
                                                            <label style=" color:red" class="form-check-label" for="exampleRadios2">
                                                                Red
                                                            </label>
                                                        </div> 
                                                        <input placeholder="Thickness(mm)" style="padding:5px; width:100%" class="info" type="text" name="brbinfo" id="" value=""></input>                                             
                                                </div>
                                            </div>

                                            
                                            <div class="row">  
                                                <div class="form-group">
                                                 
                                                 <h5 style="text-align:;margin-top:-20px; width:90px; background-color: white;"> <b>Tyers Right</b></h5>
                                                   <h5> Tyres Condition Right-Front</h5>
                                                        <div class="form-check" style="padding:5px; text-align:center;">
                                                            <input style="padding:10px; color:green" class="form-check-input" type="radio" name="trf" id="" value="Green" checked>
                                                            <label style="color:green"class="form-check-label" for="exampleRadios1">
                                                                Green 
                                                            </label>
                                                            <input style="padding:10px; color:yellow" class="form-check-input" type="radio" name="trf" id="" value="Yellow">
                                                            <label style="color:#FFC733"class="form-check-label" for="exampleRadios2">
                                                                Yellow 
                                                            </label>
                                                            <input style="padding:10px; color:red" class="form-check-input" type="radio" name="trf" id="" value="Red">
                                                            <label style=" color:red" class="form-check-label" for="exampleRadios2">
                                                                Red
                                                            </label>
                                                        </div> 
                                                        <input placeholder="Thickness(mm)"style="padding:5px; width:100%" class="info" type="text" name="trfinfo" id="" value=""></input>

                                                     <h5>   Tyres Condition Right-Rear  </h5>    
                                                        <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:10px; color:green" class="form-check-input" type="radio" name="trb" id="" value="Green" checked>
                                                            <label style="color:green"class="form-check-label" for="exampleRadios1">
                                                                Green 
                                                            </label>
                                                            <input style="padding:10px; color:yellow" class="form-check-input" type="radio" name="trb" id="" value="Yellow">
                                                            <label style="color:#FFC733"class="form-check-label" for="exampleRadios2">
                                                                Yellow
                                                            </label>
                                                            <input style="padding:10px; color:red" class="form-check-input" type="radio" name="trb" id="" value="Red">
                                                            <label style=" color:red" class="form-check-label" for="exampleRadios2">
                                                                Red
                                                            </label>
                                                        </div> 
                                                        <input placeholder="Thickness(mm)" style="padding:5px; width:100%" class="info" type="text" name="trbinfo" id="" value=""></input>                                             
                                                </div>
                                            </div>                                            
                                     </div>
                                </div>  

  
                             </div>
                         </div>  


            <div class="row probar">
                <div class="col-md-12">
                    <div class="container">
                    <div class="row">
                        <div class="col" >
                        <ul id="progress-bar" class="progressbar"style="margin-top:-45px">
                            <li class="active">Customer & Vehicle Details</li>
                            <li class="active">Summary</li>
                            <li>Breaks & Tyers</li>
                            <li>Final</li>
                        </ul>
                        </div>
                    </div>
                    </div>
               </div>
              </div>   
                         


                </section>     


 <!--............................................................page3............................... -->                  
                <!-- =======================================-->               
                <!-- =======================================-->
                <section class="section_next"> 
                    <div class="row">
                        <div class="col-md-12">
                            
                                    <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> ENGINE OIL LEAKS </h5>    
                                                <input  class="info1" type="text" name="page4_1info" id="" value=""></input>
                                                        <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_1" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_1" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_1" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div> 
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> GEAR OIL LEAKS </h5>    
                                                <input  class="info1" type="text" name="page4_2info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_2" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_2" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_2" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div> 
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> COOLANT LEAKS </h5>    
                                                <input  class="info1" type="text" name="page4_3info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_3" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_3" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_3" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div> 
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> ANY FLUID LEAKS </h5>    
                                                <input  class="info1" type="text" name="page4_4info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_4" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_4" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_4" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div> 
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> BATERY </h5>    
                                                <input  class="info1" type="text" name="page4_5info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_5" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_5" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_5" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div>  
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> WIPERS AND SPRAY JETAINES </h5>    
                                                <input  class="info1" type="text" name="page4_6info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_6" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_6" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_6" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div>  
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> BODY DAMAGE/STRUCTURED VISUAL CHECK </h5>    
                                                <input  class="info1" type="text" name="page4_7info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_7" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_7" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_7" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div>  
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> BODY RUSH VISUAL CHECK </h5>    
                                                <input  class="info1" type="text" name="page4_8info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_8" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_8" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_8" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div> 
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> SUSPENSION LINKS,BOOTSJOINTS BUSHES VISUAL CHECK </h5>    
                                                <input  class="info1" type="text" name="page4_9info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_9" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_9" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_9" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div>  
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> STEERING SYSTEM</h5>    
                                                <input  class="info1" type="text" name="page4_10info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_10" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_10" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_10" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div> 
                                          </div>
                                    </div>                                                                                                                                                                                                                       
                 <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> WINDOW AND WINDSCRIEEN </h5>    
                                                <input  class="info1" type="text" name="page4_11info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_11" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_11" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_11" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div>  
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5 class="topic"> FINAL TEST DRIVE </h5>    
                                                <input  class="info1" type="text" name="page4_12info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_12" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_12" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_12" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div> 
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5>  </h5> 
                                                <input  class="info1" type="text" name="page4_13header" id="" value=""></input><br></br>   
                                                <input  class="info1" type="text" name="page4_13info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_13" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_13" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_13" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div> 
                                          </div>
                                    </div> 
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5> </h5>    
                                                <input  class="info1" type="text" name="page4_14header" id="" value=""></input><br></br>   
                                                <input  class="info1" type="text" name="page4_14info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_14" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_14" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_14" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div> 
                                          </div>
                                    </div>
                <!-- =======================================-->
                <!-- ===================================== -->
                <div class="col-md-4">  
                                        <div class="form-group1">
                                            <label></label>
                                                <h5>  </h5>  
                                                <input  class="info1" type="text" name="page4_15header" id="" value=""></input> <br></br>   
                                                <input  class="info1" type="text" name="page4_15info" id="" value=""></input>
                                                <div class="form-check" style="padding:5px; text-align:center;">
                                                           <input style="padding:; " class="form-check-input" type="radio" name="page4_15" id="" value="OKAY" >
                                                            <label style="color:green;font-size:12px"class="form-check-label" for="exampleRadios1">
                                                                OKAY 
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_15" id="" value="NOT OKAY">
                                                            <label style="color:red;font-size:12px"class="form-check-label" for="exampleRadios2">
                                                                NOT OKAY
                                                            </label>
                                                            <input style="padding:; " class="form-check-input" type="radio" name="page4_15" id="" value="NOT APPLICABLE" checked>
                                                            <label style=" color:navy;font-size:12px" class="form-check-label" for="exampleRadios2">
                                                                NOT APPLICABLE
                                                            </label>
                                                      </div>  
                                          </div>
                                        </div>
  
                                        

             <div class="row probar">
                <div class="col-md-12">
                    <div class="container">
                    <div class="row">
                        <div class="col" >
                        <ul id="progress-bar" class="progressbar"style="margin-top:-45px">
                            <li class="active">Customer & Vehicle Details</li>
                            <li class="active">Summary</li>
                            <li class="active">Breaks & Tyers</li>
                            <li>Final</li>
                        </ul>
                        </div>
                    </div>
                    </div>
               </div>
              </div>   
                     



                </section> 


                             
                <!-- =======================================-->               
                <!-- =======================================-->
                  </div>
                  <!-- button instead of in scripted button-->
 <div id="footer">
                  <!--<div class="row">
                    <div class="col-md-12">
                    <div class="container">
                    <div class="row">
                        <div class="col" >
                        <ul id="progress-bar" class="progressbar"style="margin-top:-45px">
                            <li class="active">Customer & Vehicle Details</li>
                            <li>Summary</li>
                            <li>Breaks & Tyers</li>
                            <li>Final</li>
                        </ul>
                        </div>
                    </div>
                    </div>
               </div>
              </div> --> 
                  <div class="row">
                    <div class="col-md-12">
                        <div class="modal-footer">
                        <a type="button" id="Back"class="btn btn-sm  btn-success prev" style="display:none">&#60; Previous</a>
                        <a type="button" id="Next" class="btn btn-sm btn-info next"> Next &#62;</a>
                        <button type="submit" id="submitBtn" name="submit" value="submit" class="btn btn-sm btn-primary save" style="display:none"> Save</button>
                        <a type="button" href="checklist-home.php" id="Reset" class="btn btn-sm btn-danger exit"> Exit </a>
                        </div>  
                    </div>
                 </div>
 
     </div>                       
</form>

       </div><!--end container-->
	 </div>	<!--/.main-->
<!-- script for progress bar -->
<!--<script>
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
}) -->
</script>	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

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