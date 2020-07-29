
				<?php 
					
			 	
			header("Content-Type:text/html;charset=utf-8");
			include("conf.php");	
			
			   if(!isset($_SESSION['name'])){
   
              echo 0;die();
   	
   }
			
			if($_POST['yd']=="yd"){
			
			$rzrq="2818-9-9";
			 $datatime=date('Y-m-d H:i:s',time());
					
					 $sql="insert into hotel_y(reservation_name,reservation_phone,reservation_time,fname,rzdate) values('{$_SESSION['name']}','{$_SESSION['phone']}','{$datatime}','{$_POST['fname']}','{$_POST['rzdate']}')";
					
			}else if($_POST['yd']=="qx"){
				
				
				 $sql="delete from hotel_y where id = {$_POST['id']}";
				
			}
			 
			 
$result= mysqli_query($con,$sql);
			if(mysqli_affected_rows($con)>0){
				
				 	echo '1';
				 	
			}	
				
			

?>
				
