function mykeydown(e,the){
	e = window.event||e;
	var code = e.keyCode||e.which;
	if (code == 8) {
		$(the).attr('readonly',true);
		return false;
	}
}

//function win_open_case(url){
//	window.open(url,"","scrollbars=yes,width=1150,height=600,location=no,resizable=no");
//}
function gourl(url)
{
	window.location.href=url;
}

function js_reset(formName) {
    var formObj = document.forms[formName];
    var formEl = formObj.elements;
    for (var i=0; i<formEl.length; i++)
    {
        var element = formEl[i];
        if (element.type == 'submit') { continue; }
        if (element.type == 'reset') { continue; }
        if (element.type == 'button') { continue; }
        if (element.type == 'hidden') { continue; }
 
        if (element.type == 'text') { element.value = ''; }
        if (element.type == 'textarea') { element.value = ''; }
        if (element.type == 'checkbox') { element.checked = false; }
        if (element.type == 'radio') { element.checked = false; }
        if (element.type == 'select-multiple') { element.selectedIndex = -1; }
        if (element.type == 'select-one') { element.options[0].selected = true; }
    }
}


function check_all(obj,cName)
{
    var checkboxs = document.getElementsByName(cName);
    for(var i=0;i<checkboxs.length;i++){
		checkboxs[i].checked = obj.checked;
		if(checkboxs[i].value=='3'){
			checkboxs[i].checked = true;
		}
     }
}

function checkall(obj,cName)
{
    var checkboxs = document.getElementsByName(cName);
    for(var i=0;i<checkboxs.length;i++){
		checkboxs[i].checked = obj.checked;
     }
}

//搜索检测
function check_search()
{
	//if (($("#d4311").val() == "" && $("#d4312").val() != "") || ($("#d4311").val() != "" && $("#d4312").val() == ""))
	//{
	//	alert("时间请选择完整.");
	//	return false;
	//}
	return true;
}

