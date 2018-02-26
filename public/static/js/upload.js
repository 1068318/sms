function textChange(ele){
	//alert($(ele).val());
	var res = $(ele).val().split(/\s+/);
	$("#related_div").empty();
	for(var i=0; i<res.length; i++){
		$("<input type='radio' name='related' value='"+res[i]+"'>").appendTo($("#related_div"));
		$("<span>"+res[i]+"</span>").appendTo($("#related_div"));
	}
}