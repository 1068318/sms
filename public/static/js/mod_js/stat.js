$(function (){
	$("#topnav").find("img[alt=b6]").attr({src:"../assets/images/b6+.jpg"});
});
$(function (){
	//表单提交请求
	$("img#submit_img").click(function (){
		$("form:first").submit();
	});
	//数据浏览，弹窗
	$(".showdata").colorbox({iframe:true, scrolling:true,width:"80%", height:"90%"});
});
//第几页下拉菜单值改变事件处理函数
$(function (){
	$("select[name=pagenow]").bind("change",function (){
		$("form").submit();
	})
});

//上一页下一页点击事件处理函数
$(function (){
	$("#fenye_div a[title=prev]").bind("click",function (){
		//alert($("#fenye_div select").val()-1);
		var val = $("#fenye_div select").val()-1;
		$("#fenye_div select").val(val);
		$("#fenye_div select").trigger("change");
	});
	$("#fenye_div a[title=next]").bind("click",function (){
		//alert(parseInt($("#fenye_div select").val())+1);
		var val = parseInt($("#fenye_div select").val())+1;
		
		$("#fenye_div select").val(val);
		$("#fenye_div select").trigger("change");
	});
});