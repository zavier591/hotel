
<?php 
header("Content-type: text/html; charset=utf-8");



include("conf.php");



 
$sql ="delete from hotel where id={$_GET['id']}"; //SQL语句
$result = mysqli_query($con,$sql); //查询




 echo "删除成功 <meta http-equiv=refresh content='1; url=guanli_f.php '>";
 



?>
