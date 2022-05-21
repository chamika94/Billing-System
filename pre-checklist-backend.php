<?php
$connect = new PDO("mysql:host=localhost;dbname=userdb3", "root", "");


if(isset($_POST["action"]))
{
	$query = "  
	SELECT distinct name,checklist.id,checklist.token,cid,vid,checklist.created_date,day,month,year,vin,rego,mobile,rego FROM checklist,customer,vehicle WHERE checklist.cid=customer.ccid and checklist.vid=vehicle.vvid 
	";

	if(isset($_POST["filter_vin"])&& isset($_POST["vin"]))
	{
		$filter_vin = $_POST["filter_vin"];
		$query .= "
		 AND vehicle.vin IN('".$filter_vin."')
		";
	}
	if(isset($_POST["filter_rego"])&& isset($_POST["rego"]))
	{
		$filter_rego = $_POST["filter_rego"];
		$query .= "
		 AND vehicle.rego IN('".$filter_rego."')
		";
	}
	if(isset($_POST["filter_mobile"])&& isset($_POST["mobile"]))
	{
		$filter_mobile = $_POST["filter_mobile"];
		$query .= "
		 AND customer.mobile IN('".$filter_mobile."')
		";
	}	
	if(isset($_POST["filter_input"])&& isset($_POST["day"]))
	{
		 $filter_input = $_POST["filter_input"];
		 $day = date("d",strtotime($filter_input));
		$query .= "
		AND day IN('".$day."')
		";
	}
	if(isset($_POST["filter_input"])&& isset($_POST["month"]))
	{
		 $filter_input = $_POST["filter_input"];
		 $month = date("m",strtotime($filter_input));
		$query .= "
		AND month IN('".$month."')
		";
	}
	if(isset($_POST["filter_input"])&& isset($_POST["year"]))
	{
		 $filter_input = $_POST["filter_input"];
		 $year = date("Y",strtotime($filter_input));
		$query .= "
		AND year IN('".$year."')
		";
	}	
    $query .= "order by checklist.created_date DESC";

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();

	if($total_row > 0)
	{
  ?>
<div class="table-responsive">
<table class="table table-striped table-bordered inventory">
<thead class="thead-dark">
                       <tr>
                           <th class="thead-dark"scope="col">Checklist</th>
                           <th class="thead-dark"scope="col">Customer</th>
                           <th class="thead-dark"scope="col">Vin/Rego</th>
                           <th class="thead-dark"scope="col">Date</th>
                           <th class="thead-dark"scope="col">Mobile</th>
                           <th class="thead-dark"scope="col">action</th>
                           
                       </tr> 
</thead><tbody>
<?php
$count=0;
		foreach($result as $row)
		{
            $count=$count+1
?>
                  
                    <tr class="delete_mem<?php echo $count; ?>">
                        
                           <td ><?php echo $count; ?></td>
                           <td ><?php echo $row["name"]; ?></td>
                           <td ><?php echo $row["vin"]; ?>/<?php echo $row["rego"]; ?></td>
                           <td ><?php echo $row["created_date"]; ?></td>
                           <td ><?php echo $row["mobile"]; ?></td>
                           <td width="250px">
                                <a class="btn btn-xs btn-success" href="download-checklist.php?cid=<?php echo $row["cid"]; ?>&vid=<?php echo $row["vid"]; ?>&date=<?php echo $row["created_date"]; ?>&token=<?php echo $row["token"]; ?>" id="">Download</a>
                                <a class="btn btn-xs btn-warning" href="checklist-view.php?cid=<?php echo $row["cid"]; ?>&vid=<?php echo $row["vid"]; ?>&date=<?php echo $row["created_date"]; ?>&token=<?php echo $row["token"]; ?>" id="">View</a>
                                <a class="btn btn-xs btn-danger" href="delete-checklist.php?cid=<?php echo $row["cid"]; ?>&vid=<?php echo $row["vid"]; ?>&date=<?php echo $row["created_date"]; ?>&token=<?php echo $row["token"]; ?>" id="" onclick="return confirm('Are you sure you want to delete this?')">Delete</a> 
                          </td>
                       </tr>


<?php
		}
?>
<tbody>
</table> 
    </div>

<?php	}
	else
	{
 ?>       
	
    <div class="col-md-12"><div class="col-md-12"><div id="customer"class="alert alert-danger" role="alert">Not Data Found..!</div></div></div>
 <?php   
	}
	
}

?>



