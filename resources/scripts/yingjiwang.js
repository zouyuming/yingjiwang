/* 
    Document   : Yingjiwang.js
    Created on : 2013-7-11, 11:54:18
    Author     : zouyuming
    Description: Yingjiwang 公用函数库
 */


/**
 * 创建命名空间
 *
 */
var Yingjiwang = window.Yingjiwang || {};

/**
 * 扩展一个模块
 * 将存在全局中
 *
 */
Yingjiwang.extend = function(name, methods) {
	var module = Yingjiwang[name] || window[name];
	if (module == null) {
		Yingjiwang[name] = methods || {};
		module = window[name] || Yingjiwang[name];
	} else if (methods) {
		for (var key in methods) {
			if (!module[key]) {
				module[key] = methods[key];
			}
		}
	}
	window[name] = module;
	Yingjiwang.ready(module);
};

/**
 * 扩展模块公用成员
 *
 */
Yingjiwang.Members = {};


/**
 * 扩展模块公用方法
 *
 */
Yingjiwang.Methods = {

	/**
	 * 扩展插件方法
	 * 不存在全局中
	 *
	 */
	extend: function(name, methods) {
		var module = window[name] || this[name];
		if (module == null) {
			this[name] = methods || {};
			module = this[name];
		} else if (methods) {
			for (var key in methods) {
				if (!module[key]) {
					module[key] = methods[key];
				}
			}
		}
		Yingjiwang.ready(module);
	}
};

/**
 * 将页面布局元素赋值给各个模块
 *
 */
Yingjiwang.ready = function(module) {
	$.extend(module, Yingjiwang.Methods);
	if ($.isFunction(module.ready)) {
		$(function(jquery) {
			$.extend(module, Yingjiwang.Members);
			module.ready(jquery);
		});
	}
};
$(function() {
	$.extend(Yingjiwang.Members, {
		boot: $(window),
		root: $(document),
		wrapper: $('#wrapper'),
		container: $('#container > .inner'),
		pageLeft: $('#page_left > .inner'),
		pageRight: $('#page_right > .inner')
	});
});



$(function() {
	var checkSessionTimer = function() {
		var timer = setInterval(function() {
			var url = Config.BaseURL + 'login/checkSession';
			$.post(url, function(data) {
				if (Config.CurrentURL == Config.BaseURL + 'index.php/login' || Config.CurrentURL == Config.BaseURL + 'login/') {
					clearInterval(timer);
				}
				if (!data) {
					window.location.href = Config.BaseURL + 'login';
				}
			}, 'text');
		}, 1000 * 60 * 5);
	}
	checkSessionTimer();
});

/**
 * 扩展提示框插件
 * 参数：text 需要显示的文本
 * 调用方式：$.showTips(text)
 */;
(function($) {
	$.extend({
		showTips: function(text) {
			$("body").append(function(index, html) {
				var newHTML = "<div class='tips' id='tips'><div class='tips_text' id='tips_text'>你的操作已成功！</div><div class='tips_close_up' id='tips_close'></div></div>";
				if ($("#tips").html() == null) {
					return newHTML;
				} else {
					return "";
				}
			});
			var tipsDIV = $("#tips");
			$('#tips_close').bind({
				click: function() {
					tipsDIV.fadeOut("fast");
					//$("div").remove(".tips");
					clearTimeout(st);
				},
				mousedown: function() {
					$("#tips_close").removeClass("tips_close_up").addClass("tips_close_down");
				},
				mouseup: function() {
					$("#tips_close").removeClass("tips_close_down").addClass("tips_close_up");
				}
			});

			$(window).bind({
				scroll: function() {
					if (tipsDIV.html() !== null) {
						tipsDIV.fadeOut("fast");
						// tipsDIV.css({"left":$(document).width()/2-255,"top":$(document).scrollTop()+$(window).height()-40});
					}
				}
			});

			tipsDIV.css({
				"left": $(document).width() / 2 - 232 + 3,
				"top": $(document).scrollTop() + $(window).height() - 40
			});
			$("#tips_text").html(text);
			tipsDIV.show();

			var st = setTimeout(function() {
				tipsDIV.fadeOut("slow");
				//$("div").remove(".tips");
				clearTimeout(st);
			}, 5000);
		}
	});
})(jQuery);