
<html> 
	<head>
		<title>预订列表</title>
		<meta charset="UTF-8"/>
	</head>
	<style type="text/css">
		body{margin: 0; color: #fff; background: url(images/hero-1.jpg);}
		
		*{ font-family: "微软雅黑";}
		.a1{width: 1200px; margin: auto; }
		table{ border-left:1px solid #ccc ;border-top:1px solid #ccc ; }
		th,td{ border-right:1px solid #ccc ;border-bottom:1px solid #ccc ; }
		th{ background: #f5f5f5; color: #333;  height: 40px; font-size: 16px;}
		td{ height: 35px; text-align: center;}
		.sr input[type=text]{ text-align: center; font-size: 16px; text-indent: 3px; width: 100%; height: 100%; border: none; outline: none; -webkit-appearance: none;}
		input[name=hb]{ color: #19b96c; font-weight: bold;}
		.an{ width:80px; height: 30px; cursor: pointer; border: none; background: #2073da; color: #fff; outline: none; }
		td{ color: #f5f5f5; }
		
		
				.sr td:hover div{ display: block;  }
		 td div{ font-size: 12px; margin-top: 5px; color:#0b8246;}
		
		input[name=hb]{ color: #19b96c; font-weight: bold;}
		.ssk{
    float: left;
    height: 45px;
    line-height:45px;
	font-size:16px;
    padding: 0px;
    background: none;
    border: 1px solid #CCC;
    outline: none;
	text-indent:10px;
    font-family: 'Microsoft YaHei';
	  width: 570px;
}
.an{     width: 120px;
    background: #55a7e3;
    color: #fff;
    font-size: 16px;
    height: 45px;
    float: left;
    padding: 0px;
	outline:none;
    border: 0px none;
    cursor: pointer;
    box-sizing: border-box; 
    }

		.an1{  width: 60px;
    background: #55a7e3;
    color: #fff;
    margin-top: 5px;
    font-size: 16px;
    height: 30px;
  
	outline:none;
    border:none;
    cursor: pointer;
    }
		
		.sc{ background: #B10101;}
		tr:hover td{ background: #f9f9f9; color: #333;  }
		.zsjk{padding: 5px 15px;float: left; margin-right:10px; color: #fff; text-decoration: none; background: #09f;display: block;width: 140px; text-align: center;}
	</style>
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
			
			$(function () {
		
		
				   //退房
			$(".tuif").click(function () {
		
		
			$.post("yd.php",{yd:"qx",id:$(this).attr("id")},function(result){
	
     if(result.replace(/[\s]/g,"")=="1"){
    
     location.reload();
     }
    
  });
		
		})
		
		})
			
		</script>
	<body>
		
		<div class="a1">
			<div style=" height:50px; text-align: center; font-size: 22px; margin:auto; margin-top:40px; margin-bottom: 10px; width:830px;">
预订信息查看页面

</div>
<a class="zsjk" href="guanli_f.php">点击进入房间管理</a>  <a class="zsjk" href="tuichu.php">退出登录</a>  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr class="toub">
					<th >房间名</th>
					<th >房间类型</th>
						<th >价格</th>
				
					<th width="">预订人姓名</th>
					<th width="">预订人手机</th>
					<th width="">预订时间</th>
	         <th width="">入住时间</th>
					<th width="">操作</th>
					
					
				</tr>
			
				<?php
include("conf.php");
 
  if(isset($_POST["pwd"])){
  	
  	
  
 if($_POST["pwd"]=="ac123456"){
	
	 $_SESSION['login']=1;
	

	
}else{
	
	echo '<script type="text/javascript">
		alert("密码错误");
	window.reload();
</script>';
die();
	
}
 
 }
 
   if(!isset($_SESSION['login'])){
   
echo '<script type="text/javascript">
		alert("未登录");
	window.location.href="gllogin.html";
</script>';
   	
   }
 
 $sql="SELECT * FROM hotel right JOIN hotel_y
       ON (hotel.fname = hotel_y.fname)";
 
  $result= mysqli_query($con,$sql);
  
  
  while ($row = mysqli_fetch_array($result)) {
  	
  
  	echo "<tr class='sr'>
  		
					<td width=''>{$row[1]} </td>
					<td width=''>{$row[2]}</td>
					<td width=''>{$row[3]}</td>
					<td width=''>{$row[7]}</td>
					<td width=''>{$row[6]}</td>
					<td width=''>{$row[8]}</td>
				.<td width=''>{$row[10]}</td>
				<td width=''>
			<input type='button' id='{$row[5]}' class='an1 tuif' style='background:#c70909' value='退房'> </td>
				</tr>";
  	
  	
  }
  
?>
			</table>
			
		</div>
		
		
	</body>
</html>
