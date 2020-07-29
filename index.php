
<?
	include("conf.php");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/imports.css" >
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/owl-carousel.css" >

	<script src="js/jquery.min.js"></script>

<script type="text/javascript">
	
	thisyear="";
	thismonth="";
	
	
	$(function () {
		
		$(".ydan").click(function () {
		jQuery(".data_table td").removeClass("tdselect");
		fid=$(this).attr("fid");
		fname=$(this).attr("fname");
		$(".skewm").show();
		sDate();
		
		})
		
		$(".qxyd").click(function () {
		
	
		$(".skewm").hide();
		
		})
		
		$(".qryd").click(function () {
		
		if($(".datetext").val()==""){ alert("请选择入住日期"); return false; }
		
		$(".skewm").hide();
			$.post("yd.php",{yd:"yd",fname:fname,rzdate:$(".datetext").val()},function(result){
			console.log(result);
     if(result.replace(/[\s]/g,"")=="0"){
     	alert("你还没有登录");
     	window.location.href="login.html";
     }else{
     	
     	alert("预订成功。");
     location.reload();
     }
    
  });
		
		})
		
		
		   //退房
			$(".tuif").click(function () {
		
		
			$.post("yd.php",{yd:"qx",id:$(this).attr("id")},function(result){
	
     if(result.replace(/[\s]/g,"")=="1"){
     	alert("退房成功。");
     location.reload();
     }
    
  });
		
		})
	
		
		//入住日期
			$(".datetext").click(function () {
		
		$("#zzc").show();
		
		})
		
		$(".seleterq").click(function () {
			var a1=[];
			$(".tdselect").each(function () {
				
				a1.push(thisyear+"-"+thismonth+"-"+$(this).text());
				
				
			})
			
			$(".datetext").val(a1);
			$("#zzc").hide();
		})
		
		
		
	})
	
	
	
	
	function sDate() {
				
				
				
		$.post("seleteDate.php",{fname:fname},function(result){
	
    var lsd=result.replace(/[\s]/g,"").split(",");
    
    for(var i=1;i<=lsd.length;i++){
    	
    	$("[rq="+lsd[i]+"]").removeClass("usedate");
    	$("[rq="+lsd[i]+"]").text("-");
    }
    
  });
  
	}
	
	
	
	
</script>




</head>
<style type="text/css">
	.navbar{
		font-size: 20px;
		height: 50px;
		margin-bottom: 300rpx;
		
	}
	
	.navbar-brand{
		font-size: 20px;
		line-height: 50px;
	}
	
	.nav navbar-nav navbar-right{
		float: left;
	}
	
	
	
	
	
	
	
	.ydan,.qryd,.qxyd{ margin-top: 15px; width: 100%; font-size: 16px !important; height: 35px; line-height: 30px; }
	.symbol{ font-size: 16px; line-height: 16px; color: #999; }
	.skewm{ position: fixed; display: none; text-align: center; padding: 20px; width: 450px;  top: 10%; z-index: 99; left: 0px; right: 0; margin: auto; background: #fff; border-radius: 2px; box-shadow: 0 0 10px #999;  }
	
	.wdyd{ color: #333; background: #fff; border-radius: 5px; padding: 5px; font-size: 14px; margin-bottom: 10px; padding-left: 10px; }
	
	
	/*日期选择*/
	.choosecal{ width:96%; margin:3% auto; overflow:hidden;}
.ccaltop{ width:100%; border-radius:5px; border:1px solid #000;}
.caltline1,.caltline2{ width:100%; background-color:#F90; overflow:hidden; padding:2% 3%;}
.caltline1 p,.caltline2 p{ float:left; width:10%; font-weight:700; text-align:right;}
.caltline1 .bookdate{ width:90%; text-align:left;}
.caltline2{ background-color:#FFF; display:none;}
.caltline2 p{ width:20%;}
.caltline2 .datetext{ width:35%; border:1px solid #000; background-color:#FFF; font-weight:700;}
.calender{  position: absolute; background: #fff; border-radius: 7px; z-index: 8888; width:430px; top: 0; bottom: 0; left: 0; height: 400px; right: 0; margin: auto; border-bottom: 2px solid #999; overflow: hidden; }
.selectmouth{  background-color:#F30; width:100%; overflow:hidden;border-radius:5px 5px 0 0;}
.selectmouth p{ float:left; width:33%; color:#FFF; font-weight:700; cursor:pointer;}
.selectmouth .selectdate{ width:100%; background-color:#F30; border:none; color:#FFF; font-weight:700; text-align:center;}
.data_table{ width:100%;border:1px solid #cccccc;border-collapse:collapse; }
.data_table thead{ background-color:#333;}
.data_table thead td{ color:#FFF; text-align:center;border:1px solid #333;border-collapse:collapse; padding:1% 0;}
.data_table tbody td{border:1px solid #cccccc;border-collapse:collapse; text-align:center;color:#0C6;padding:10px;}
.data_table tbody td.orderdate{ background: #f8f8f8; color:#999;}
.data_table tbody td.tdselect{ color:#fff;background-color:#09f; }
.calender p{ margin: 0px;line-height: 44px;  }
	#zzc{ display: none; position:fixed; width: 100%; background: rgba(255,255,255,.5); top: 0; left: 0; z-index: 999; height: 100%; }
	
	
</style>


	<!--导航 End-->







<body class="home">
	<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		
		
		
		
		</button>
		
		<a class="navbar-brand" href="#">ww酒店平台</a>
		
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="active"><a href="">首页</a></li>
			<li><a href="">入住须知</a></li>
			<li><a href="">联系我们</a></li>
			<li><a href="default2.html">关于我们</a></li>
			
			<li class="dropdown">
			<a href="" class="dropdown-toggle" data-toggle="dropdown">酒店信息<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
				<li><a href="#">ww酒店</a></li>
				<li><a href="#">特惠预告</a></li>
				<li><a href="#">合作伙伴</a></li>
				
	</ul>
			
</li>
</ul>
		<form class="navbar-form navbar-left" role ="search">
			<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
			
			
			</div>
			<button type="submit" class="btn btn-default">确认</button>
			
			
			
		  </form>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="login2.html">登录</a></li>
			<li><a href="index.php">退出</a></li>
			
			
			
			</ul>
		
		
		
		</div>
	
	
	
	</div>

<div id="zzc">
	

<!--日期选择 -->
<div class="calender">
        	<div class="selectmouth">
            	<p style="text-align:right" class="lastmonth"><</p>
                <p><input type="text" class="selectdate" value="2014年2月" readonly=readonly /></p>
                <p class="nextmonth">></p>
            </div>
        	<table class="data_table" cellspacing="0px">
             	<thead>
                 	<tr>
                      	<td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td>
                  	</tr>
              	</thead>
              	<tbody>
                 	<tr>
                     	<td>1</td><td></td><td></td><td></td><td></td><td></td><td></td>
                   	</tr>
                    <tr>
                     	<td>1</td><td></td><td></td><td></td><td></td><td></td><td></td>
                   	</tr>
                    <tr>
                     	<td>1</td><td></td><td></td><td></td><td></td><td></td><td></td>
                   	</tr>
                    <tr>
                     	<td>1</td><td></td><td></td><td></td><td></td><td></td><td></td>
                   	</tr>
                    <tr>
                     	<td>1</td><td></td><td></td><td></td><td></td><td></td><td></td>
                   	</tr>
                  
                    </tbody>
                </table>
                
                <a style="background: #06f; width: 100%; height: 35px; line-height: 30px; margin-top: 10px;" class='seleterq btn btn-primary btn-xs'>选好了 </a>
                <p style="text-align: center; font-size: 12px; padding-top: 10px;">请选择入住日期(可多选)</p>
        </div>
	
	<!--日期选择结束-->
</div>



<div class="skewm">
	<img width="60%" style="margin-bottom: 20px;" src="images/pay.png"/>
	
	<input  type="text" value="" class="datetext datetoday" readonly="readonly" placeholder="请选择入住日期" />
	
	
	
	
	<a fid='{$row[0]} ' style="" class='btn qryd btn-primary btn-xs'>付款完成，预订房间 <i class='login'></i></a>
	<a fid='{$row[0]} ' style="background: #06f;" class='btn qxyd btn-primary btn-xs'>取消 <i class='login'></i></a>
</div>

<div id="top"></div>



<!-- Hero Section
================================================== -->
<section class="hero hero-overlap" style="background-image: url('images/hero-1.jpg'); margin-bottom:60px;">
	<div class="bg-overlay">
		<div class="container">
			<div class="intro-wrap">
				<h1 class="intro-title">酒店预订</h1>
				
		</div>
	</div>
</section>


<!-- Featured Destinations
================================================== -->
<section class="featured-destinations">
	<div class="container">
		<div class="cards overlap">

			<!-- Section Title -->
			<div class="title-row">
				
				<? 
					 if(!isset($_SESSION['name'])){
					 	
					 	echo '<h3 class="title-entry">你还没有登录</h3>
				<a href="login2.html" class="btn btn-primary btn-xs">登 录 <i class="login"></i></a> &nbsp;&nbsp;
				<a href="register2.html" class="btn btn-primary btn-xs">注 册 <i class="login"></i></a>
			</div>';
					 	
					 }else{
					 	
					 	
					 echo "<h3 class='title-entry'>姓名:{$_SESSION['name']}  |  手机号:{$_SESSION['phone']}</h3>
				<a class='btn btn-primary btn-xs'>我的预订 <i class='login'></i></a> &nbsp;&nbsp;<a href='tuichu.php' class='btn btn-primary btn-xs'>退出登录 <i class='login'></i></a> 
				
			</div>";
		
		
						$sql="SELECT * FROM hotel_y where reservation_phone='{$_SESSION['phone']}'";
  $result= mysqli_query($con,$sql);
  
  while ($row = mysqli_fetch_array($result)) {
					
					echo "<div class='wdyd'>我的预订:{$row[4]}  &nbsp;&nbsp;&nbsp; 入住日期:{$row[5]}  &nbsp;&nbsp;&nbsp; 预订时间:{$row[3]} <a id='{$row[0]} ' style='background: #f63; margin-left: 20px;' class='btn tuif btn-primary btn-xs'>退房<i class='login'></i></a></div>";
					 
					 	
					 }	
					 	
					 	
					 	
					 	
					 	
					 } 
					 
					 
					  ?>
				
			
			<!-- Cards Row -->
			<div class="row">


<?
	

	$sql="SELECT * FROM hotel";
  $result= mysqli_query($con,$sql);
  
  while ($row = mysqli_fetch_array($result)) {
  	
  	echo "<div class='col-md-3 col-sm-6 col-xs-12'>
					<article class='card'>
						<a href='' class='featured-image' style='background-image: url({$row['fimg']})'>
							<div class='featured-img-inner'></div>
						</a>
						<div class='card-details'>
							<h4 class='card-title'><a href=''>{$row[1]}</a></h4>
							<div class='meta-details clearfix'>
								<ul class='hierarchy'>
									<li class='symbol'>{$row[2]}  价格:{$row[3]}</li>
									
								</ul>
								<br /><a fname='$row[1]' fid='{$row[0]} ' class='btn ydan btn-primary btn-xs'>我 要 预 订 <i class='login'></i></a>
								
							</div>
						</div>
					</article>
				</div>";
  	
  	
  }
	
?>

	
<!--	
	----------------------------------->
			</div> <!-- /.row -->
		</div>
	</div>
</section>




	<section class="sub-footer">
		<div class="container">
			<div class="row">

			</div>
		</div>
	</section>
</footer>

<!--
日期选择开始-->
<script src="js/seleteDate.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
