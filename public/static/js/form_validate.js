jQuery.validator.addMethod("isMobile", function(value, element) {
	var length = value.length;
	var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
	return this.optional(element) || (length == 11 && mobile.test(value));
}, "手机号码不正确，请检查");

jQuery.validator.addMethod("isChar", function(value, element) {  
    var length = value.length;  
    var regName = /[^\u4e00-\u9fa5]/g;  
    return this.optional(element) || !regName.test( value );    
}, "请正确格式的姓名(暂支持汉字)"); 


$(function() {
// 在键盘按下并释放及提交后验证提交表单
	$("#register").validate({
		rules: {
			username: {
				required: true,
				rangelength: [5,12]
			},
			password: {
				required: true,
				rangelength: [6,20]
			},
			confirm_password: {
				required: true,
				rangelength: [6,20],
				equalTo: "#password"
			},
			phone:{
				required:true,
				minlength:11,
				isMobile:true
			},
			simage:{
				required:true,
				extension:"gif|jpg|png|jpeg"
			}

		},
		messages: {
			username: {
				required: "请输入用户名",
				rangelength: "用户名长度5-12位，数字、字母、下划线组成"
			},
			password: {
				required: "请输入密码",
				rangelength: "密码长度6-20位"
			},
			confirm_password: {
				required: "请输入确认密码",
				rangelength: "密码长度6-20位",
				equalTo: "两次密码输入不一致"
			}
			simage:{
				required:"请选择要上传的文件",
				extension:"文件后缀名必须为jpg,jpeg,gif,png"
			}
		}
	});
});