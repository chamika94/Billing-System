
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
	<title>Send Email</title>
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
		box-shadow:0.2in -0.1in 0 0  rgba(0, 0, 0, 0.5);
		border-radius: 1px;
		background-color:#f5f5f0;
	}
</style>

<style>
    @charset "utf-8";

.form-email {
	max-width: 500px;
	padding: 19px 29px 29px;	
	background-color: #fff;	
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	box-shadow: 0 1px 2px rgba(0,0,0,.05);			
	font-family:Tahoma, Geneva, sans-serif;
	color:#990000;
	font-weight:lighter;
}
.form-email .form-email-heading {
    color:#00A2D1;
}
.form-email input[type="text"],
.form-email input[type="password"],
.form-email input[type="email"] {
    font-size: 16px;
    height: 45px;
    padding: 7px 9px;
}
.body-container {
	margin-top:110px;
}
.navbar-brand {
	font-family:"Lucida Handwriting";
}
#btn-submit{
	height:45px;
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
				<div class="profile-usertitle-info">Send Email</div>
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
            <div class="row">
				<div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                <div class="container">
                               
                                <div id='success_message' class='hidden'>		 
                                    <h2>Your Mail Sent Successfully!</h2>
                                    <p><strong>You will be in touch soon.</strong></p>		 
                                </div>	
                                <form action='sendEmail-backend.php' class="form-email" method="post" id="email-form" enctype='multipart/form-data'>		
                                    <div id="error">
                                    </div>
									<div class="form-group">
									<a class="btn btn-info btn-sm customer login modal-form" data-target="#login-form" style=" margin-left: 25%;margin-top:15px"data-toggle="modal" onClick="filter_data_modal1()" id="add1"href="#">Add Customer</a>
                                        <span id="check-e"></span>
                                    </div>


									<div id="email">
										<div class="form-group">
											<input type="input" class="form-control" placeholder="Name" name="u_name" id="u_name" />
											<span id="check-e"></span>
										</div>
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Email address" name="u_email" id="u_email" />
											<span id="check-e"></span>
										</div>
                                   </div>


                                    <div class="form-group">
                                       Invoice : <input type="file" class="form-control" placeholder="File" name="attach" id="attach" />
                                    </div>
                                   <div class="form-group">
                                       Checklist Service : <input type="file" class="form-control" placeholder="File" name="attach1" id="attach" />
                                    </div>
                                    <div class="form-group">
                                       Summary Report Service : <input type="file" class="form-control" placeholder="File" name="attach2" id="attach" />
                                    </div>
                                    <div class="form-group">
                                       Log Report : <input type="file" class="form-control" placeholder="File" name="attach3" id="attach" />
                                    </div>
                                    <div class="form-group">
                                        <textarea style="width:100%"rows="5"  id="message" name="message" placeholder='Message'></textarea>
                                    </div>

									<?php
									include 'db.php';
                                    if(isset($_GET['status'])){
										$status=$_GET['status'];
									   if($status=='done'){
									?>

										<div id="customer"class="alert alert-success" role="alert">Email Sent Successfully.!</div>
									
									
									<?php   
									  }if($status=='error'){
                                    ?>

                                        <div id="customer"class="alert alert-danger" role="alert">Something went wrong.!</div>

                                   <?php
									  }
								    }
									?>
								
                                    <hr />
									
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="email_send" id="email_send">
                                        Send Email
                                        </button> 
                                    </div> 
                                </form>				
                            </div>

                </div>
                <div class="col-md-2"></div>

            </div>
        </div><br>
        <div class="modal-footer">
       
       <a type="button" onClick="" data-dismiss=""class="btn  btn-danger" href="admin.php" id=""> Exit</a>
       
       </div>  
<br>
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



<!-- script to fetch data(customer) from modal using ajax-->
<script type="text/javascript">
    function filter_data(){
        var filter_input = $('#searchword').val();
        // alert(filter_input);
           
                $.ajax({
                    'type': 'POST',
                    'url' : 'add-customer-email.php',
                    'data' : 'name='+filter_input,
                    success : function(result)
                    {
                    //alert(result);
                    //$("#new_row").html(result);
                    $('#email').html(result);
                    //vartr = $("#new_row").parent();
                    //tr.replaceWith(result);
                    $("#searchword").val(null);
                    }
                });
       
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



<!-- javascript  to autocomplete  for customer -->
<script>
$(document).ready(function(){
    
    // when any character press on the input field keyup function call
    
        $("#searchword").keyup(function(){
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
    

    });
   

});
// call this function after select one of these suggestion for hide the suggestion box and select the value
function selectname(selected_value) {
	$("#searchword").val(selected_value);
	$("#id_suggesstions").hide();
 
}



</script>

</body>  <!-- Start customer modal window -->
  <div aria-hidden="false" role="dialog" tabindex="-1" id="login-form" class="modal leread-modal fade in">
    <div class="modal-dialog">
      <!-- Start login section -->
      <div id="login-content" class="modal-content">
        <div class="modal-header" >
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Add To Invoice</h4>
        </div>
        <div class="modal-body">
      
                                           <!-- index.php   -->
                                        <div class="search-frm">
                                        <div class="col-lg-12">
                                            <div class="col-lg-0">
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="text" id="searchword" placeholder="Start search...." autofocus/> 
                                                  *Search your details here....
                                            </div>
                                            <div class="col-lg-0">    
                                            </div>

                                         </div>


                                    <br>        
                                      

                                        </div> <br>
                                        <div class="col-lg-12">
                                        <div id="id_suggesstions">

                                            // this area for show the jquery ajax autocomplete search result
                                        </div>
                                       </div>


        </div>
        <div class="modal-footer">
       
        <a type="button" onClick="filter_data()" data-dismiss="modal"class="btn btn-success">Save changes</a>
        <a type="button" onClick="close_data()" class="btn btn-danger" data-dismiss="modal">Close</a>
      </div>
      </div>

</html>
