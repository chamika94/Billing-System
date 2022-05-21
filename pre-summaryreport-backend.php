


<?php
$connect = new PDO("mysql:host=localhost;dbname=userdb3", "root", "");


if(isset($_POST["action"]))
{
	$query = "  
	SELECT distinct summary_report.id,rego,summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid
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
    $query .= "order by summary_report.created_date DESC";

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
                           <th class="thead-dark"scope="col">Summary Report</th>
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
                                <a class="btn btn-xs btn-success" href="download-summaryreport.php?cid=<?php echo $row["cid"]; ?>&vid=<?php echo $row["vid"]; ?>&date=<?php echo $row["created_date"]; ?>&token=<?php echo $row["token"]; ?>" id="">Download</a>
                                <a class="btn btn-xs btn-warning" href="summaryreport-view.php?cid=<?php echo $row["cid"]; ?>&vid=<?php echo $row["vid"]; ?>&date=<?php echo $row["created_date"]; ?>&token=<?php echo $row["token"]; ?>" id="">View</a>
                                <a class="btn btn-xs btn-danger" href="delete-summaryreport.php?cid=<?php echo $row["cid"]; ?>&vid=<?php echo $row["vid"]; ?>&date=<?php echo $row["created_date"]; ?>&token=<?php echo $row["token"]; ?>" id="" onclick="return confirm('Are you sure you want to delete this?')">Delete</a> 
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














<!--
<?php
include 'db.php';

    $filter_input =$_POST["filter_input"];
    $year = date("Y",strtotime($filter_input));
    $month = date("m",strtotime($filter_input));
    $day = date("d",strtotime($filter_input));

    if($filter_input==""){

                if(!isset($_POST["year"])&&!isset($_POST["month"])&&!isset($_POST["day"])){
                    $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid order by summary_report.created_date DESC ";
                }
                if(isset($_POST["day"])&&isset($_POST["year"])&&isset($_POST["month"])){
                    //echo $year=$_POST["day"];
                    
                   // echo $day;
                   $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and YEAR(summary_report.created_date)=$year and MONTH(summary_report.created_date)=$month and DAY(summary_report.created_date)=$day order by summary_report.created_date DESC ";
                } 

 //==========================================Year===================================================================            

                if(isset($_POST["year"])&&!isset($_POST["month"])&&!isset($_POST["day"])){
                    //echo $year=$_POST["year"];
                   

                    $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and YEAR(summary_report.created_date)=$year order by summary_report.created_date DESC ";

                }
                if(isset($_POST["year"])&&isset($_POST["month"])&&!isset($_POST["day"])){
                    //echo $year=$_POST["year"];
                   

                    $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and YEAR(summary_report.created_date)=$year and MONTH(summary_report.created_date)=$month order by summary_report.created_date DESC ";

                }
                if(isset($_POST["year"])&&!isset($_POST["month"])&&isset($_POST["day"])){
                    //echo $year=$_POST["year"];
                   

                    $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and YEAR(summary_report.created_date)=$year and DAY(summary_report.created_date)=$day order by summary_report.created_date DESC ";

                }  

                

 //===============================================Month==============================================================               
                
                if(isset($_POST["month"])&&!isset($_POST["year"])&&!isset($_POST["day"])){
                   // echo $year=$_POST["month"];
                   
                  // echo  $month;
                  $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and MONTH(summary_report.created_date)=$month order by summary_report.created_date DESC ";
                   

                }
                if(isset($_POST["month"])&&!isset($_POST["year"])&&isset($_POST["day"])){
                    // echo $year=$_POST["month"];
                    
                   // echo  $month;
                   $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and MONTH(summary_report.created_date)=$month and DAY(summary_report.created_date)=$day order by summary_report.created_date DESC ";
                    
 
                 }


 //===============================================Day==============================================================                    
                if(isset($_POST["day"])&&!isset($_POST["year"])&&!isset($_POST["month"])){
                    //echo $year=$_POST["day"];
                    
                   // echo $day;
                   $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and DAY(summary_report.created_date)=$day order by summary_report.created_date DESC ";
                }   
            
        $get_result = mysqli_query($con,$sql_query);

            if(!empty($get_result)) {
        
            ?>
                    <table class="table table-striped table-bordered">
                       <tr>
                           <th>Summary Report</th>
                           <th>Customer</th>
                           <th>Vehicle</th>
                           <th>mobile</th>
                           <th>Date</th>
                           <th>action</th>
                           
                       </tr> 
                    <?php
                    $count=0;
                    while($name_val = mysqli_fetch_array($get_result,MYSQLI_ASSOC))
                    {
                        $count=$count+1;
                    ?>
       
                       <tr class="delete_mem<?php echo $name_val["name"]; ?>">
                           <td ><?php echo $count; ?></td>
                           <td ><?php echo $name_val["name"]; ?></td>
                           <td ><?php echo $name_val["vin"]; ?></td>
                           <td ><?php echo $name_val["mobile"]; ?></td>
                           <td ><?php echo $name_val["created_date"]; ?></td>
                           <td width="250px">
                           <a class="btn btn-xs btn-success" href="download-summaryreport.php?cid=<?php echo $name_val["cid"]; ?>&vid=<?php echo $name_val["vid"]; ?>&date=<?php echo $name_val["created_date"]; ?>&token=<?php echo $name_val["token"]; ?>" id="">Download</a>
                           <a class="btn btn-xs btn-warning" href="summaryreport-view.php?cid=<?php echo $name_val["cid"]; ?>&vid=<?php echo $name_val["vid"]; ?>&date=<?php echo $name_val["created_date"]; ?>&token=<?php echo $name_val["token"]; ?>" id="">View</a>
                            <a class="btn btn-xs btn-danger" href="delete-summaryreport.php?cid=<?php echo $name_val["cid"]; ?>&vid=<?php echo $name_val["vid"]; ?>&date=<?php echo $name_val["created_date"]; ?>&token=<?php echo $name_val["token"]; ?>" id="">Delete</a>
                          </td>
                       </tr>
                
                    <?php 
                    }  
                    ?>
             </table> 
            <?php } 

        }else{



            if(!isset($_POST["year"])&&!isset($_POST["month"])&&!isset($_POST["day"])){
                $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and YEAR(summary_report.created_date)=$year and MONTH(summary_report.created_date)=$month and DAY(summary_report.created_date)=$day order by summary_report.created_date DESC ";
            }
            if(isset($_POST["day"])&&isset($_POST["year"])&&isset($_POST["month"])){
                //echo $year=$_POST["day"];
                
               // echo $day;
               $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and YEAR(summary_report.created_date)=$year and MONTH(summary_report.created_date)=$month and DAY(summary_report.created_date)=$day order by summary_report.created_date DESC ";
            } 

//==========================================Year===================================================================            

            if(isset($_POST["year"])&&!isset($_POST["month"])&&!isset($_POST["day"])){
                //echo $year=$_POST["year"];
               

                $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and YEAR(summary_report.created_date)=$year order by summary_report.created_date DESC ";

            }
            if(isset($_POST["year"])&&isset($_POST["month"])&&!isset($_POST["day"])){
                //echo $year=$_POST["year"];
               

                $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and YEAR(summary_report.created_date)=$year and MONTH(summary_report.created_date)=$month order by summary_report.created_date DESC ";

            }
            if(isset($_POST["year"])&&!isset($_POST["month"])&&isset($_POST["day"])){
                //echo $year=$_POST["year"];
               

                $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and YEAR(summary_report.created_date)=$year and DAY(summary_report.created_date)=$day order by summary_report.created_date DESC ";

            }  

            

//===============================================Month==============================================================               
            
            if(isset($_POST["month"])&&!isset($_POST["year"])&&!isset($_POST["day"])){
               // echo $year=$_POST["month"];
               
              // echo  $month;
              $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and MONTH(summary_report.created_date)=$month order by summary_report.created_date DESC ";
               

            }
            if(isset($_POST["month"])&&!isset($_POST["year"])&&isset($_POST["day"])){
                // echo $year=$_POST["month"];
                
               // echo  $month;
               $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and MONTH(summary_report.created_date)=$month and DAY(summary_report.created_date)=$day order by summary_report.created_date DESC ";
                

             }


//===============================================Day==============================================================                    
            if(isset($_POST["day"])&&!isset($_POST["year"])&&!isset($_POST["month"])){
                //echo $year=$_POST["day"];
                
               // echo $day;
               $sql_query ="SELECT distinct summary_report.token,summary_report.cid,summary_report.vid,summary_report.created_date,customer.name,customer.mobile,vehicle.vin,summary_report.id from summary_report,customer,vehicle where summary_report.cid=customer.ccid and summary_report.vid=vehicle.vvid and DAY(summary_report.created_date)=$day order by summary_report.created_date DESC ";
            }   
        
    $get_result = mysqli_query($con,$sql_query);

        if(!empty($get_result)) {
    
        ?>
                <table class="table table-striped table-bordered">
                   <tr>
                       <th>Summary Report</th>
                       <th>Customer</th>
                       <th>Vehicle</th>
                       <th>mobile</th>
                       <th>Date</th>
                       <th>action</th>
                       
                   </tr> 
                <?php
                $count=0;
                while($name_val = mysqli_fetch_array($get_result,MYSQLI_ASSOC))
                {
                    $count=$count+1;
                ?>
   
                   <tr class="delete_mem<?php echo $name_val["name"]; ?>">
                       <td ><?php echo $count; ?></td>
                       <td ><?php echo $name_val["name"]; ?></td>
                       <td ><?php echo $name_val["vin"]; ?></td>
                       <td ><?php echo $name_val["mobile"]; ?></td>
                       <td ><?php echo $name_val["created_date"]; ?></td>
                       <td width="250px">
                       <a class="btn btn-xs btn-success" href="download-summaryreport.php?cid=<?php echo $name_val["cid"]; ?>&vid=<?php echo $name_val["vid"]; ?>&date=<?php echo $name_val["created_date"]; ?>&token=<?php echo $name_val["token"]; ?>" id="">Download</a>
                           <a class="btn btn-xs btn-warning" href="summaryreport-view.php?cid=<?php echo $name_val["cid"]; ?>&vid=<?php echo $name_val["vid"]; ?>&date=<?php echo $name_val["created_date"]; ?>&token=<?php echo $name_val["token"]; ?>" id="">View</a>
                            <a class="btn btn-xs btn-danger" href="delete-summaryreport.php?cid=<?php echo $name_val["cid"]; ?>&vid=<?php echo $name_val["vid"]; ?>&date=<?php echo $name_val["created_date"]; ?>&token=<?php echo $name_val["token"]; ?>" id="">Delete</a>
                      </td>
                   </tr>
            
                <?php 
                }  
                ?>
         </table> 
        <?php } 

        
    }
        
        ?>
-->