$(function (){
	$("#navi_div").find("img[alt=b2]").attr({src:"../assets/images/b2++.jpg"});
});
$(function (){
	//表单提交请求
	$("img#submit_img").click(function (){
		$("form:first").submit();
	});
});