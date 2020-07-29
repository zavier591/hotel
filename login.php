
				<?php
			header("Content-Type:text/html;charset=utf-8");
			
			
		
			
			include("conf.php");	
			
			if(trim($_POST['phone'])==""&&trim($_POST['name'])==""){
				
				echo '姓名和手机不能为空<meta http-equiv="refresh" content="2; url=register.html" />';
				 	die();
				
			}
			
			 $sql="select * from hotel_u where phone='{$_POST['phone']}' and name='{$_POST['name']}' and password='{$_POST['password']}'";
					
$result= mysqli_query($con,$sql);
			if(mysqli_affected_rows($con)>0){
				
				$_SESSION['name']=$_POST['name'];
				$_SESSION['phone']=$_POST['phone'];
				 	echo '登录成功<meta http-equiv="refresh" content="1; url=index.php" />';
				 	die();
			}else{
				
				echo '姓名手机填写错误<meta http-equiv="refresh" content="2; url=login2.html" />';
				
			}		
			
			
					
			
			
			
         

 

?>
				
