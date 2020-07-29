
				<?php 
			header("Content-Type:text/html;charset=utf-8");
			
			
		
			
			include("conf.php");	
			
		
			
					 $sql="insert into hotel(fname,ftype,fprice,fimg) values('{$_POST['fname']}','{$_POST['ftype']}',{$_POST['fprice']},'{$_POST['fimg']}')";
					
$result= mysqli_query($con,$sql);
				
			if(mysqli_affected_rows($con)>0){
				
				 	echo '添加成功<meta http-equiv="refresh" content="1; url=guanli_f.php" />';
				 	
			}
				
			
			
			
         

 

?>
				
