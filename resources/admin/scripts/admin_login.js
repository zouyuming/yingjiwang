/* 
    Document   : admin_login.js
    Created on : 2013-7-11, 11:52:10
    Author     : zouyuming
    Description:
        后台用户登录
			
 */

Yingjiwang.extend('Login', {
	ready: function () {
		this.bindEvent();
	},

	bindEvent: function () {
		$('#checkLogin').submit(function () {
									  
        var Sys = {};
        var ua = navigator.userAgent.toLowerCase();
        var s;
        (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :
        (s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] :
        (s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :
        (s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :
        (s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0;
		
			if (Sys.ie){
				alert("本系统暂不支持IE浏览器，推荐使用Chrome或FireFox");
				return false;
			}
			else{
				Login.checkLogin();
				return false;
			}
			
		});
	},

	checkLogin: function () {
		var username = $('#username').val();
		var password = $('#password').val();
		$.ajax({
			url: Config.CurrentURL + 'check',
			type: 'POST',
			dataType: 'JSON',
			data: {
				username: username,
				password: password
			},
			success: function (data) {
					if (data.error) {
						
						$(".alert_info").html("用户名或密码错误！");
					} else {
						window.location.href = Config.BaseURL + "admin/admin_index";
//						window.location.href = Config.BaseURL + 'home';
					}
				
			}
		});
	}

});