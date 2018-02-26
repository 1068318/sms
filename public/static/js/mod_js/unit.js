$(function (){
	$("#navi_div").find("img[alt=b6]").attr({src:"../assets/images/b6++.jpg"});
});

function editUtil(url) {
		//判断单位名称和单位地址是否为空
	
	var msg="";
	var policeName=$.trim($("#edit_policeName").val());
    var code=$.trim($("#edit_code").val());
	var id=$("#edit_id").val();
	var parentId=$("#edit_parentId").val();
	
	if(policeName==""){
       msg="单位名称不能为空！"
	}
	if(code==""){
        msg+="\n"+"单位编号不能为空！";
	}
	if( code!="" && code.length != 12 ) {
	   msg+="\n"+"单位编号不合法，请输入12位单位编号。";
	}
			
	if(msg!=""){
		alert(msg);
		return false;
	}else{
			  $.ajax({
				type: "GET",
				url: "ajax_util.php",
				data: {"sub1nav":"unit","edit":"edit","edit_code":code,"edit_policeName":policeName,"edit_parentId":parentId,"edit_id":id},
				dataType: "text",
				success: function(data) {
					
				if(data=="success") {
					alert('更新成功');
						
					window.location.href=url+"?sub1nav=unit";
                     
				} else {
					alert('已查询到相同的记录，请重新修改');
				}
	            }
            });
	}
};
function addUtil(url) {
		//判断单位名称和单位地址是否为空
	
	var msg="";
	var policeName=$.trim($("#add_policeName").val());
    var code=$.trim($("#add_code").val());
	var parentId=$("#add_parentId").val();
	if(policeName==""){
       msg="单位名称不能为空！"
	}
	if(code==""){
        msg+="\n"+"单位编号不能为空！";
	}
	if( code!="" && code.length != 12 ) {
	   msg+="\n"+"单位编号不合法，请输入12位单位编号。";
	}
			
	if(msg!=""){
		alert(msg);
		return false;
	}else{
			  $.ajax({
				type: "GET",
				url: "ajax_util.php",
				data: {"sub1nav":"unit","add":"add","add_code":code,"add_policeName":policeName,"add_parentId":parentId},
				dataType: "text",
				success: function(data) {
					
				if(data=="success") {
					alert('单位添加成功');
						
					window.location.href=url+"?sub1nav=unit";
                     
				} else {
					alert('存在相同的单位，请重新添加');
				}
	            }
            });
	}
};