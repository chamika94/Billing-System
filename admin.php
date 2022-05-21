
<?php

session_start();

if(!isset($_SESSION['userID'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vox Auto - Admin</title>
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

<style>
	.table{
		box-shadow:0.08in -0.08in 0 0  rgba(0, 0, 0, 0.5);
		border-radius: 1px;
		background-color:#f5f5f0;
	}
</style>



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
				<div  class="profile-usertitle-name">Dashboard</div>
				<div class="profile-usertitle-info">Admin</div>
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
     <!--   <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Customer</h1>
				</div>
		</div>-->
		<br>
				<div class="panel panel-container">    
				<div class="row">
						<div class="col-md-12">
							<div class="col-md-4">                                       
									<table width="100%" class="table table-bordered">
									<tr>
										<td colspan="3"> 
													<div class="blog-news-title">
														<h3>Part No</h3>
													</div>
													<div class="blog-news-details">
																	<a class="btn btn-success btn-sm login modal-form" data-target="#login-form" data-toggle="modal" href="#" onClick="addpartNo()">Add New</a>
																	<a class="btn btn-info btn-sm login modal-form" data-target="#login-form" data-toggle="" href="partno-list.php"onClick="">List</a>
																
																												
													</div>                  
										</td>
									</tr>
									</table>
								</div> 
								<div class="col-md-4">                                       
									<table width="100%" class="table table-bordered">
									<tr>
										<td colspan="3"> 
													<div class="blog-news-title">
														<h3>Description</h3>
													</div>
													<div class="blog-news-details">
																	<a class="btn btn-success btn-sm login modal-form" data-target="#login-form" data-toggle="modal" href=""onClick="addDescription()">Add New</a>
																	<a class="btn btn-info btn-sm login modal-form" data-target="#login-form" data-toggle="" href="description-list.php"onClick="">List</a>			
													</div>                  
										</td>
									</tr>
									</table>
								</div>
								<div class="col-md-4">                                       
									<table width="100%" class="table table-bordered">
									<tr>
										<td colspan="3"> 
													<div class="blog-news-title">
														<h3>Tasks</h3>
													</div>
													<div class="blog-news-details">
																	<a class="btn btn-success btn-sm login modal-form" data-target="#login-form" data-toggle="modal" href=""onClick="addTask()">Add New</a>
																	<a class="btn btn-info btn-sm login modal-form" data-target="#login-form" data-toggle="" href="task-list.php"onClick="">List</a>			
													</div>                  
										</td>
									</tr>
									</table>
								</div>								
					</div>               
					</div> 
			</div>
<!--  ------------------------  -->

            <div id="show_data"></div>
<!--	        <div class="panel panel-container"> 
					  <div class="row">
						  <div class="col-lg-12">
						  <div class="col-lg-12">
						  <table class="table table-striped">
							<thead>
								<tr>                         
								<th scope="col">PartNo</th>
								<th scope="col">Date</th>
								<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
									<tr>                         
									<td>chamika</td>
									<td>chamika</td>

									<td>
										<a class="btn btn-danger btn-sm" href="">Delete</a>
									
									</td>
									</tr>
							</tbody>
							</table>
						</div>
                      </div>
					</div>
			   </div> -->
			   <div class="panel panel-container">    
				<div class="row">
						<div class="col-md-12">
							<div class="col-md-4">                                       
									<table width="100%" class="table table-bordered">
									<tr>
										<td colspan="3"> 
													<div class="blog-news-title">
														<h3>Send Email</h3>
													</div>
													<div class="blog-news-details">
																	<a class="btn btn-success btn-sm login modal-form" data-target="#login-form" data-toggle="" href="sendEmail.php" onClick="">Send New</a>
																	
																
																												
													</div>                  
										</td>
									</tr>
									</table>
								</div> 
										
					</div>               
					</div> 
					<div class="modal-footer">
       
	                        <a type="button" onClick="" data-dismiss=""class="btn  btn-danger" href="index.php" id=""> Exit</a>

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


<!-- script to add data of partno and description -->
<script>
	function addData(){
		var input_value = $('#input_value').val();
		var data_value = $('#data_value').val();
		//alert(data_value);
        $.ajax({
        type: "POST",
        url : "add-part-description-task.php",
		data: {input_value : input_value, data_value : data_value},
        success : function(data)
        {
			
			$('#input_value').val("");
			$("#message").show();
			$('#message').html(data);
			setTimeout(function() { $("#message").hide('slow'); }, 1000);
        }
        });		

	}
</script>

<!-- script to control modal when add partno and description-->
<script>
function addpartNo(){
	$('#label').html("Part Number");
	$('#data_value').val("partNo");
}
function addDescription(){
	$('#label').html("Description");
	$('#data_value').val("description");
}
function addTask(){
	$('#label').html("New Task");
	$('#data_value').val("task");
}

</script>

</body>
</html>
	  <!-- Start login modal window -->
	  <div aria-hidden="false" role="dialog" tabindex="-1" id="login-form" class="modal leread-modal fade in">
    <div class="modal-dialog">

      <!-- Start signup section -->
      <div id="signup-content" class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><i class="fa fa-lock"></i>Add New</h4>
        </div>
        <div class="modal-body">
        <div class="row">
                <div class="col-lg-12">
                    
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        <fieldset>            
                    

                        <!-- Text input-->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="name"id="label"></label>  
                        <div class="col-md-6">
						<input id="data_value" type="hidden" value="" name="" type="text">	
                        <input id="input_value" name="pNo" type="text" placeholder="Enter Here.." class="form-control input-md" required="">
                        </div>
                        </div>


                        <div class="form-group" >
                                <label class="col-md-4 control-label" for="image"></label>
                                <div class="col-md-6" id="message">
                                
                                </div>
                        </div>

                        </fieldset>
                        </form>


                </div>
            </div>
            
        </div>
        <div class="modal-footer">
       
       <a type="button" onClick="addData()" data-dismiss=""class="btn btn-success" id="">Add New</a>
       <a type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
       </div>

      </div>
    </div>
  </div>
  <!-- End login modal window -->