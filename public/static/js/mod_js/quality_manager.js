$(function (){//导航至本页，则导航图片特殊显示
	//$("#topnav").find("img[alt=b1]").attr({src:"../assets/images/b1+.jpg"});
	//查看sqlite详细，弹窗
	$(".showsqlite").colorbox({iframe:true, scrolling:true,width:"80%", height:"90%"});
	//浏览数据提交表单
	$("input[alt=sumbform]").click(function (){
		$("form:first").submit();
	});
	//删除记录操作
	$("a[alt=删除]").click(function (ev){
		ev.preventDefault();
		if(confirm("确定删除么？")){
			var arr = $(this).attr("href").split(/=/);
			$("#hidden_div").find("input[alt=del_id]").val(arr[1]);
			$("this").attr("href","");
			$("form:first").submit();
		}
	});
	//手机查看详细事件处理函数
	/*
	$("table.tblcon4").find("a[title=phoneinfo]").bind("click",function (){
		$.jBox("iframe:audit_device.php"+"?id="+$(this).parent().siblings().eq(0).text(), {
			title: "设备详情",
			width: 400,
			height: 250,
			buttons: { '关闭': true }
		});
	});
	*/
	//分页	上一页 下一页 首页 末页
	$("#fenye_div").find("a").bind("click",function (en){
		//alert($(this).attr("alt"));
		en.preventDefault();
		var page = $(this).attr("alt");
		$("#hidden_div").find("input[alt=pagenow]").val(page);
		$("form:first").submit();
	});
});