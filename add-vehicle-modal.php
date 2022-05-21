<?php
// readname.php
// connect dbconnection file
include 'db.php';
// hear we search term exist then process the below lines of code
if(!empty($_POST["name"])) 
{
    // the query responsible for fetch matched data
    $sql_query ="SELECT * FROM vehicle order by created_date DESC LIMIT 6";
    $get_result = mysqli_query($con,$sql_query);
 
        if(!empty($get_result)) {
            // prepare the list for append
        ?>
                <div id="name-list" style="cursor:pointer; bgcolor: yellow;">
                <div class="table-responsive">
                <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0">
                   <tr>
                       <th>ViN</th>
                       <th>Rego</th>
                       <th>Make</th>
                       
                   </tr> 
                <?php
                while($name_val = mysqli_fetch_array($get_result,MYSQLI_ASSOC))
				{
                ?>
   
                   <tr>
                       <td onClick="selectname('<?php echo $name_val["vin"]; ?>');"><?php echo $name_val["vin"]; ?></td>
                       <td onClick="selectname('<?php echo $name_val["vin"]; ?>');"><?php echo $name_val["rego"]; ?></td>
                       <td onClick="selectname('<?php echo $name_val["vin"]; ?>');"><?php echo $name_val["make"]; ?></td>
                    
                   </tr>
               

					
                <?php 
				}  
				?>
         </table> 
            </div>
                </div>
        <?php } 
} 
?>
                                        