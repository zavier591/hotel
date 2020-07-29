
				<?php 
			header("Content-Type:text/html;charset=utf-8");
			
			
		
			
			include("conf.php");	
			
		
			
			 $sql="select * from hotel_y where fname='{$_POST['fname']}'";
					
$result= mysqli_query($con,$sql);
 $a="";
			  while ($row = mysqli_fetch_array($result)) {
			  	
			  	$a=$a.",".$row[5];
			  	
			  	
			  	
			  }
			
			echo $a;
					
			
			
			
         

 

?>
				
