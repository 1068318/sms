$(function (){
	$("#topnav").find("img[alt=b9]").attr({src:"../assets/images/b9+.jpg"});
	$("#sub1nav").find("a").eq(0).click(function (){
		$.layer({
			type:2,
			title:"如何使用模板",
			offset:['50px',''],
			area:['890px','540px'],
			border:[10,0.2,'#000',true],
			shadeClose:false,
			bgcolor:"#FFF",
			zIndex:19911002,
			shade:[0.9,'#000',true],
			iframe:{
				src:'info.php',
				scrolling:'no'
			}
			//end:function (){
			//	window.location.href = '?';
			//}
		});
	});
	$("#sub1nav").find("a").eq(1).click(function (){
		$.layer({
			type:2,
			title:"管理模版",
			offset:['50px',''],
			area:['860px','440px'],
			border:[10,0.2,'#000',true],
			shadeClose:false,
			bgcolor:"#FFF",
			zIndex:19911002,
			shade:[0.9,'#000',true],
			iframe:{
				src:'manager.php',
				scrolling:'no'
			},
			end:function (){
				window.location.href = '?';
			}
		});
	});
	$("#sub1nav").find("a").eq(2).click(function (){
		$.layer({
			type:2,
			title:"创建模版",
			offset:['50px',''],
			area:['860px','440px'],
			border:[10,0.2,'#000',true],
			shadeClose:false,
			bgcolor:"#FFF",
			zIndex:19911002,
			shade:[0.9,'#000',true],
			iframe:{
				src:'create.php',
				scrolling:'no'
			},
			end:function (){
				window.location.href = '?';
			}
		});
	});

	$("#sub1nav").find("a").eq(3).click(function (){
		$.layer({
			type:2,
			title:"手工录入电话本",
			offset:['50px',''],
			area:['860px','440px'],
			border:[10,0.2,'#000',true],
			shadeClose:false,
			bgcolor:"#FFF",
			zIndex:19911002,
			shade:[0.9,'#000',true],
			iframe:{
				src:'contacts.php',
				scrolling:'no'
			}
			//end:function (){
			//	window.location.href = '?';
			//}
		});
	});
});

