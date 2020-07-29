
    	window.onload=function(){
			var mydate=new Date();
			 thisyear=mydate.getFullYear();
			 thismonth=mydate.getMonth()+1;
			var thisday=mydate.getDate();
			var mydate1=new Date();
			var thisyear1=mydate1.getFullYear();
			var thismonth1=mydate1.getMonth()+1;
			var thisday1=mydate1.getDate();
			var selectday=thisday; //标记日期
			var indate=thisday;//入住日期
			var inmonth=thismonth; //入住月份
			var outdate=thisday+1; //退房日期
			var outmonth=thismonth; //退房月份
			var datetxt="datetoday";
			var datefirst;
			var datesecond;
			function initdata(){ //日期初始填充
				var tdheight=jQuery(".data_table tbody tr").eq(0).find("td").height();
				jQuery(".data_table tbody td").css("height",tdheight);
				jQuery(".selectdate").val(thisyear+"年"+thismonth+"月");
				var days=getdaysinonemonth(thisyear,thismonth);
				var weekday=getfirstday(thisyear,thismonth);
				setcalender(days,weekday);
			
				markdate(thisyear,thismonth,selectday);
				orderabledate(thisyear,thismonth,thisday);
			}
			initdata();
			jQuery(".datetoday").val(thisyear+"-"+thismonth+"-"+thisday);
			jQuery(".dateendday").val(thisyear+"-"+thismonth+"-"+(thisday+1));
			function orderabledate(thisyear,thismonth,thisday){  //能预订的日期
				if(thisyear<thisyear1){
					jQuery(".data_table tbody td").addClass("orderdate");
					jQuery(".data_table tbody td").removeClass("usedate");
				}else if(thisyear==thisyear1){
					if(thismonth<thismonth1){
						jQuery(".data_table tbody td").addClass("orderdate");
						jQuery(".data_table tbody td").removeClass("usedate");
					}else if(thismonth==thismonth1){
						for(var j=0;j<6;j++){
							for(var i=0;i<7;i++){
								var tdhtml=jQuery(".data_table tbody tr").eq(j).find("td").eq(i).html();
								if(tdhtml<thisday){
									jQuery(".data_table tbody tr").eq(j).find("td").eq(i).addClass("orderdate");
									jQuery(".data_table tbody tr").eq(j).find("td").eq(i).removeClass("usedate");
								}else{
									jQuery(".data_table tbody tr").eq(j).find("td").eq(i).removeClass("orderdate");
								}
							}
						}
					}else{
						jQuery(".data_table tbody td").removeClass("orderdate");
					}
				}else{
					jQuery(".data_table tbody td").removeClass("orderdate");
				}
			}
			function markdate(thisyear,thismonth,thisday){ //标记日期
				var datetxt=thisyear+"年"+thismonth+"月";
				var thisdatetxt=thisyear1+"年"+thismonth1+"月";
				jQuery(".data_table td").removeClass("tdselect");
				if(datetxt==thisdatetxt){
					for(var j=0;j<6;j++){
						for(var i=0;i<7;i++){
							var tdhtml=jQuery(".data_table tbody tr").eq(j).find("td").eq(i).html();
							if(tdhtml==thisday){
								jQuery(".data_table tbody tr").eq(j).find("td").eq(i).addClass("tdselect");
							}
						}
					}
				}
			}
			function getdaysinonemonth(year,month){ //算某个月的总天数
				month=parseInt(month,10);
				var d=new Date(year,month,0);
				return d.getDate();
			}
			function getfirstday(year,month){ //算某个月的第一天是星期几
				month=month-1;
				var d=new Date(year,month,1);
				return d.getDay();
			}
			function setcalender(days,weekday){ //往日历中填入日期
				var a=1;
				for(var j=0;j<6;j++){
					for(var i=0;i<7;i++){
						
						
							jQuery(".data_table tbody tr").eq(j).find("td").eq(i).attr("rq",thisyear+"-"+thismonth+"-"+a); //添加rq标签
						
						
						if(j==0&&i<weekday){
							jQuery(".data_table tbody tr").eq(0).find("td").eq(i).html("");
							jQuery(".data_table tbody tr").eq(0).find("td").eq(i).removeClass("usedate");
						}else{
							if(a<=days){
								jQuery(".data_table tbody tr").eq(j).find("td").eq(i).html(a);
								jQuery(".data_table tbody tr").eq(j).find("td").eq(i).addClass("usedate");
								a++;
							}else{
								jQuery(".data_table tbody tr").eq(j).find("td").eq(i).html("");
								jQuery(".data_table tbody tr").eq(j).find("td").eq(i).removeClass("usedate");
								a=days+1;
							}
						}
						
					
						
					}
				}
			}
			function errorreset(){ //日期报错后，数据重置
				thisyear=thisyear1;
				thismonth=thismonth1;
				thisday=thisday1;
				selectday=thisday1;
				indate=thisday1;
				inmonth=thismonth1;
				outdate=thisday1+1;
				outmonth=thismonth1;
				initdata();
			}
			jQuery(document).on("click",".data_table tbody td.usedate",function(){ //点击日期的效果
				var thishtml=parseInt(jQuery(this).html());
				//jQuery(".data_table td").removeClass("tdselect");
				//alert(thisyear+"/"+thismonth+"/"+selectday)
				if($(this).is(".tdselect")){
					
					jQuery(this).removeClass("tdselect");
					
				}else{
				jQuery(this).addClass("tdselect");
				
				}
				
				selectday=thishtml;
				if(datetxt=="datetoday"){
					jQuery(".datetoday").val(thisyear+"-"+thismonth+"-"+selectday);
					indate=selectday;
					inmonth=thismonth;
				}else{
					jQuery(".dateendday").val(thisyear+"-"+thismonth+"-"+selectday);
					outdate=selectday;
					outmonth=thismonth;
					if(outmonth<inmonth){
						alert("日期填写错误");
						jQuery(".datetoday").val(thisyear1+"-"+thismonth1+"-"+thisday1);
						jQuery(".dateendday").val(thisyear1+"-"+thismonth1+"-"+(thisday1+1));
						errorreset();
					}else if(outmonth==inmonth){
						if(outdate<=indate){
							alert("日期填写错误");
							jQuery(".datetoday").val(thisyear1+"-"+thismonth1+"-"+thisday1);
							jQuery(".dateendday").val(thisyear1+"-"+thismonth1+"-"+(thisday1+1));
							errorreset();
						}
					}
				}
			});
			jQuery(".datetoday").click(function(){ //选择入住日期
				datetxt="datetoday";
			});
			jQuery(".dateendday").click(function(){ //选择退房日期
				datetxt="dateendday";
			});
			jQuery(".lastmonth").click(function(){ //上一个月
				
				
				thismonth--;
				if(thismonth==0){
					thismonth=12;
					thisyear--;
				}
				initdata();
				
				sDate();//访问方法 已经预订过的不给预订
				
				
				jQuery(".data_table td").removeClass("tdselect");  //移除选择
			});
			jQuery(".nextmonth").click(function(){ //上一个月
				thismonth++;
				if(thismonth==13){
					thismonth=1;
					thisyear++;
				}
				initdata();
				
			sDate();//访问方法 已经预订过的不给预订
				
			});
			jQuery(".btsure").click(function(){ //确定日期
				var start = new Date($(".datetoday").val());
				var end = new Date($(".dateendday").val());
				var diff = parseInt((end - start) / (1000*3600*24));
				jQuery(".bookdate").html(inmonth+"月"+indate+"日至"+outmonth+"月"+outdate+"日("+diff+")晚")
			});
			jQuery(".caltline1").toggle(
				function(){
					jQuery(".caltline2").slideDown(500);
					jQuery(".calender").fadeIn(500);
					errorreset();
					jQuery(".caltline1").find("img").attr("src","images/iconpointup.png");
				},
				function(){
					jQuery(".caltline2").slideUp(500);
					jQuery(".calender").fadeOut(500);
					jQuery(".caltline1").find("img").attr("src","images/iconpoint.png");
				}
			);
		}
  