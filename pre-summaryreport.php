






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
	<title>Previous Summary Report</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href = "css/jquery-ui.css" rel = "stylesheet">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->


	<style>
	.check1{
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
				<div class="profile-usertitle-info">Previous Report</div>
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
 
<div class="panel panel-container"> 
             <!-- /.row -->

			 <div class="row">  
                   <div class="col-lg-12">                      
                                <div class="col-lg-12">
                                <div class="col-md-12">
    
                                    <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="">
													  <div class="list-group check1">
												          <h3></h3>
												           <div class="list-group-item checkbox">
												           <input  style="width:210px"class="form-control me-2"autocomplete="off" type="text" placeholder="Search" aria-label="Search" id="filter_vin"required="">
													      <label><input type="checkbox" class="common_selector vin" value="vin"  >Vin</label>
												        </div>
											          </div>
                                                    </td>

                                                    <td style="">
													  <div class="list-group check1">
												         <h3></h3>
												        <div class="list-group-item checkbox">
												          <input  style="width:210px"class="form-control me-2"autocomplete="off" type="text" placeholder="Search" aria-label="Search" id="filter_rego"required="">
													     <label><input type="checkbox" class="common_selector rego" value="rego"  >Rego</label>
												        </div>
											         </div>
                                                    </td> 

                                                    <td style="">
													<div class="list-group check1">
												      <h3></h3>
												       <div class="list-group-item checkbox">
												         <input  style="width:210px" class="form-control me-2"autocomplete="off" type="text" placeholder="Search" aria-label="Search" id="filter_mobile"required="">
													     <label><input type="checkbox" class="common_selector mobile" value="mobile"  >Mobile</label>
												       </div>
											        </div>
                                                    </td>

                                                    <td style="">
													<div class="list-group check1">
												     <h3></h3>
												     <div class="list-group-item checkbox">
												        <input style="width:210px"class="form-control me-2" type="date" id="filter_input">
													    <label><input type="checkbox" class="common_selector day" value="" >day</label>
													    <label><input type="checkbox" class="common_selector month" value="" >month</label>
													    <label><input type="checkbox" class="common_selector year" value="" >year</label>
												     </div>
											        </div>
                                                    </td>
                                                </tr>
                                            </table>  
                                        </div>
                                         
                                      </div>        
                                </div>                                

                        </div>
                    </div>
							<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-12">   
				   <div class="col-sm-12">  
                       <div id="filter_data" style="cursor:pointer;">


				                      <!--         <div class="col-sm-12"> 
				                                    <div style="box-shadow:0.08in -0.08in 0 0  rgba(0, 0, 0, 0.5);padding:10px;border: 0.1px solid;background-color:#FEF9E7;border-radius: 5px;"><em class="glyphicon glyphicon-pushpin"></em>
                                                         <p> <label for="">Name  </label> : chamika Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                         <p> Vin : vin</p>
                                                         <p style="text-align:left"> Date : 2017/03/23 </p>
														 <div class="modal-footer">
                                                                          <a type="button" onClick="" data-dismiss=""class="btn btn-xs btn-success" href="checklist-home.php" id=""> Download</a>
																		  <a type="button" onClick="" data-dismiss=""class="btn btn-xs btn-warning" href="checklist-home.php" id=""> View</a>
																		  <a type="button" onClick="" data-dismiss=""class="btn btn-xs btn-danger" href="checklist-home.php" id=""> Delete</a>
                                                         </div>
                                                    </div><br></br>
                                               </div> -->



      
                         </div>
		             </div>
                </div>
            </div>
        </div>

		<div class="row">
			<div class="col-sm-12">
			  	<div class="col-sm-12">   
				    <div class="col-sm-12">  
				      <div class="modal-footer">
                          <a type="button" onClick="" data-dismiss=""class="btn btn-info" href="summaryreport-home.php" id=""> Back</a>
       
                       </div>
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

  
<!-- script to fillter data list order by day month year-->	
<script>
$(document).ready(function(){

	filter_data();
})
</script>

<script>
$(document).ready(function(){
   //$('.filter_data').html('<div id="loading" style="" ></div>');
   filter_data();
});

function filter_data()
{
   // $('.filter_data').html('<div id="loading" style="" ></div>');

    var action = 'fetch_data'; 
	var filter_vin = $('#filter_vin').val();
    var filter_rego = $('#filter_rego').val(); 
    var filter_mobile = $('#filter_mobile').val(); 
    
    
    var vin = get_filter('vin');
	var rego = get_filter('rego');
    var mobile = get_filter('mobile');

    var filter_input = $('#filter_input').val(); 

    var day = get_filter('day');
    var month = get_filter('month');
    var year = get_filter('year');

    $.ajax({
        url:"pre-summaryreport-backend.php",
        method:"POST",
        data:{action:action,filter_rego:filter_rego,filter_vin:filter_vin,filter_mobile:filter_mobile,rego:rego,vin:vin,mobile:mobile,filter_input:filter_input,day:day,month:month,year:year},
        success:function(data){
            $('#filter_data').html(data);
           // $("#filter_input").val(null);
        }
    });
}

function get_filter(class_name)
{
    var filter = [];
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
    });
    return filter;
}

$('.common_selector').click(function(){
    filter_data();
});
</script>
</body>
</html>














