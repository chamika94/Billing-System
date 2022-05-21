<?php
include 'db.php';

$intime =$_POST["intime"];
$indate =$_POST["indate"];
$inmeter =$_POST["inmeter"];
$outtime =$_POST["outtime"];
$outdate =$_POST["outdate"];
$outmeter =$_POST["outmeter"];

$deposite =$_POST["deposite"];
$note =$_POST["note"];
$cid =$_POST["cid"];
$vid =$_POST["vid"];
$token =$_POST["token"];
$status =$_POST["status"];
$type =$_POST["type"];

$itemsArr = json_decode($_POST["items"]);
$infoArr = json_decode($_POST["info"]);
$partNoArr = json_decode($_POST["partNo"]);
$quantityArr = json_decode($_POST["quantity"]);
$priceArr = json_decode($_POST["price"]);

$date = date('Y-m-d');
$year = date("Y",strtotime($date));
$month = date("m",strtotime($date));
$day = date("d",strtotime($date));

if(!empty($cid)&& !empty($vid)){

        $total = 0;
        for ($i = 0; $i < count($itemsArr); $i++) {
                    if(($itemsArr[$i] != "")){ /*not allowing empty values and the row which has been removed.*/
                        $total=$total+$priceArr[$i];
                    $sql="INSERT INTO useritem (info, partNo, quantity, price, cid, vid, type_of,created_date,status_of,token)
                    VALUES
                    ('$infoArr[$i]','$partNoArr[$i]','$quantityArr[$i]','$priceArr[$i]','$cid','$vid','$type','$date','$status','$token')";
                    $result1 = mysqli_query($con , $sql);
                    if (!$result1)
                    {
                    die('Error: ' . mysqli_error($con));
                    }
        }


}

$query3 = "INSERT INTO `invoice`(`intime`,`indate`,`inmeter`,`outtime`,`outdate`,`outmeter`,`deposite`,`note`,`cid`, `vid`,`type_of`,`day`,`month`,`year`, `created_date`,`status_of`,`total`,`token`) VALUES ('$intime','$indate','$inmeter','$outtime','$outdate','$outmeter','$deposite','$note','$cid', '$vid', '$type', '$day', '$month', '$year','$date', '$status','$total','$token')";
$result3 = mysqli_query($con , $query3);
//Print "Data added Successfully !";



echo '<div class="row">'    
               .' <div class="col-sm-12">'
                    .' <div class="col-sm-12">'
                                .' <div id="customer"class="alert alert-success" role="alert"style="height:100px;">'
                                    .' <h3 style=" color:green;">Invoice Added Successfully!</h3>'
                                    .'<input type="hidden"name="" id="cid" value="'.$cid.'"></input>'
                                    .'<input type="hidden"name="" id="vid" value="'.$vid.'"></input>'
                                    .'<input type="hidden"name="" id="date" value="'.$date.'"></input>'
                                 .' </div>' 
                        .' </div>'
                .' </div> '    
        .'</div>'
        .'<div class="row">'
                 .'<div class="col-sm-12">'
                        .'<div class="modal-footer">'
                        .' <a style="margin-left:-100px;"class="btn btn-info btn-sm vehicle login modal-form" onClick="" href="invoice.php">Back To New</a>'
                                  .'<a class="btn btn-success btn-sm login modal-form" data-target="" data-toggle="" onClick="" id="view" href="invoice-view.php?cid='.$cid.'&vid='.$vid.'&date='.$date.'&type='.$type.'&status='.$status.'&token='.$token.'&deposite='.$deposite.'">View</a>'
                                  .'<a class="btn btn-danger btn-sm login modal-form" data-target="" data-toggle="" onClick="" id="view" href="download-invoice.php?cid='.$cid.'&vid='.$vid.'&date='.$date.'&type='.$type.'&status='.$status.'&token='.$token.'&deposite='.$deposite.'">Download</a>'
                       .' </div>'
                  .'</div>'
        .'</div>'
        ;
      


}else{

}
mysqli_close($con);
?>
                                 
                                   
                                             
                                                
                                                    
                                                   
                                                    
                                                
                                                    

