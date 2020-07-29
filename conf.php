<?php 
	session_start();
       $con=mysqli_connect("localhost","root","root","test"); 
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
}  
 mysqli_set_charset($con, "utf8");
 
?>