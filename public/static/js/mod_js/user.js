$(function (){
	$("#topnav").find("img[alt=b12]").attr({src:"../assets/images/b12+.jpg"});
	//日志管理分页
	$("div#fenye_div").find("a").bind("click",function (){
		//alert($(this).attr("alt"));
		$("#page").val($(this).attr("alt"));
		//alert($("#logpage").val());
		$("form#logmanager").submit();
		$("form#ipmacmanager").submit();
	});
	//设置IP MAC 显示出设置DIV
	$("a[alt=ip_mac]").click(function (){
		var user_id = $(this).prev("input").val();
		$("#ip_mac").find("input#user_id").val(user_id);
		var police_info = $(this).parent().siblings();
		var police_num = police_info.eq(0).text();
		var police_name = police_info.eq(1).text();
		var a_user_info = $("#ip_mac").find("span.right");
		a_user_info.eq(0).text(police_num);
		a_user_info.eq(1).text(police_name);
		$("#ip_mac").css("display","block");
	});
	//点击设置确定按钮响应事件
	$("#ip_mac_bind").click(function (){
		if($("#ip_mac").find("input.right").eq(1).val() == ""){
			alert("IP地址不能为空");
		} else{
			$.ajax({
				type:"post",
				url:"ipmac_bind.php",
				data:{
					id:$("#ip_mac").find("input.right").eq(0).val(),
					ip:$("#ip_mac").find("input.right").eq(1).val(),
					mac:$("#ip_mac").find("input.right").eq(2).val()
				},
				success:function (){
						var user_id = $("#ip_mac").find("input.right").eq(0).val();
						var ip_mac = $("table").find("td input[value="+user_id+"]").parent().siblings();
						ip_mac.eq(2).text($("#ip_mac").find("input.right").eq(1).val());
						ip_mac.eq(3).text($("#ip_mac").find("input.right").eq(2).val());
						$("#ip_mac").css("display","none");
						alert("设置成功");
				}
			});	
		}
	});
	//开启关闭IPMAC
	$("#ipmac_flag input").click(function (){
		if(!confirm('确定要执行该操作吗?')) {return false;}
		$.get("ipmac_bind.php?flag="+$(this).attr("alt"),function (response,status,xhr){
			if(response == "开启"){
				alert('操作成功');
			}else{
				alert('操作成功');
			}
			location.reload();
		});
	});
});