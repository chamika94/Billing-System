
<?php

session_start();

include 'db.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE name = '$name' AND password = '$password'";
    $result = mysqli_query($con , $sql);

    $rows = mysqli_fetch_assoc($result);

    $_SESSION['userID']= $rows['id'];

    header('Location: index.php');

}


/*
session_start();

include 'db.php';
if(isset($_POST['submit'])){
	$name = trim($_POST['name']);
	$password = trim($_POST['password']);
	
	$sql = "select * from user where name = '".$name."'";
	$rs = mysqli_query($con,$sql);
	$numRows = mysqli_num_rows($rs);
	
	if($numRows  == 1){
		$row = mysqli_fetch_assoc($rs);
		if(password_verify($password,$row['password'])){
			    $_SESSION['userID']= $row['id'];
                header('Location: index.php');
		}
		else{
			echo "Wrong Password";
			 header('Location: login.php');
		}
	}
	else{
		echo "No User found";
		 header('Location: login.php');
	}
}

*/


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VOXAUTO - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><i class="fa fa-lock"></i><B>VOX-AUTO</B></div>
				<div class="panel-body">
				<form role="form" method="POST" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
			<!--		<form role="form" method="POST" action="login.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="name" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<a type="submit"name="submit"  class="btn btn-primary">Login</a>
							<button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
						</fieldset>
					</form>-->
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
