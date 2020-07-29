
				<?php
			header("Content-Type:text/html;charset=utf-8");
			
			
		
			
			include("conf.php");	
			
			if(trim($_POST['phone'])==""&&trim($_POST['name'])==""&&trim($_POST['password'])==""){
				
				echo '姓名和手机、密码不能为空<meta http-equiv="refresh" content="2; url=register2.html" />';
				 	die();
				
			}
			
			 $sql="select * from hotel_u where phone='{$_POST['phone']}'";
					
$result= mysqli_query($con,$sql);
			if(mysqli_affected_rows($con)>0){
				
				 	echo '这个手机号已经存在<meta http-equiv="refresh" content="2; url=register2.html" />';
				 	die();
			}	
			
			
					 $sql="insert into hotel_u(name,phone,password) values('{$_POST['name']}','{$_POST['phone']}','{$_POST['password']}')";
					
$result= mysqli_query($con,$sql);
				
			if(mysqli_affected_rows($con)>0){
				
				$_SESSION['name']=$_POST['name'];
				$_SESSION['phone']=$_POST['phone'];
				
				 	echo '注册成功 已经自动登录<meta http-equiv="refresh" content="2; url=index.php" />';
				 	
			}
				
			
			
			
         

 

?>
				
