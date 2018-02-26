$(function (){
	//手机查看详细事件处理函数
	$("#case_browse").find("a[title=phoneinfo]").bind("click",function (){
		$.jBox("iframe:audit_device.php"+"?id="+$(this).parent().siblings().eq(1).text(), {
			title: "设备详情",
			width: 400,
			height: 250,
			buttons: { '关闭': true }
		});
	});
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

$(function (){
	$("img#submit_form").click(function (){
		$("form:first").submit();
	});
	//查看详细，弹窗
	$(".showsqlite").colorbox({iframe:true, width:"80%", height:"90%"});
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
});