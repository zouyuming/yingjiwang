/* 
    Document   : jquery.slide
    Created on : 2011-6-1, 17:50:54
    Author     : jack.zhu
    Description:
        Purpose of the javascript follows.
*/


(function ($) {

	// Defaults
	var defaults = {
		type: 'hover',
		direction: 'top',
		showSpeed: 300,
		hideSpeed: 300,
		showProp: {},
		hideProp: {},
		showCallback: $.noop,
		hideCallback: $.noop,
		listClassName: 'slide_list',
		innerClassName: 'slide_inner',
                container: 'slide_container'
	};

	// Variables
	var locked = false;
	var show_prop = { top: 0 };
	var hide_prop;

	// Bind show
	function bindShow(options) {
		return function () {
			if (false !== locked) {
				return ;
			}
			locked = 'show';
			var $wrapper = $(this);
			var $list = $wrapper.find('.' + options.listClassName);
			var $inner = $wrapper.find('.' + options.innerClassName);
			var offset = $wrapper.height();
			var height = -($list.height()+offset);
                        var wrapperLeft = $wrapper.offset().left;
                        var containerLeft = $("."+options.container).offset().left;
                        if((wrapperLeft - containerLeft) < $inner.width()){
                            //防止左侧遮挡不显示
                            if($inner.offset().left <= wrapperLeft)
                            $inner.offset({left:$inner.offset().left+$inner.width()});
                        }
                        
			hide_prop = { top: height };
			$inner.css('top', offset);
			$list.css('top', height).show().animate(
			$.extend(true, options.showProp, show_prop),
			options.showSpeed,
			function () {
				locked = false;
				options.showCallback.call(this, $list);
			});
		};
	}

	// Bind hide
	function bindHide(options) {
		return function () {
			if (! hide_prop || 'hide' === locked) {
				return ;
			}
			locked = 'hide';
			var $list = $('.' + options.listClassName, this).show().animate(
			$.extend(true, options.hideProp, hide_prop),
			options.hideSpeed,
			function () {
				locked = false;
				hide_prop = null;
				options.hideCallback.call(this, $list.hide());
			});
		};
	}

	// Bind slide
	$.fn.bindSlide = function (options) {
		if (typeof options === 'string') {
			options = {
				type: options
			}
		}
		options = $.extend(true, defaults, options || {});
		return this[options.type](bindShow(options), bindHide(options));
	};

	// Ready slide
	$(document).ready(function () {
		$('.slide_wrapper').bindSlide();
                
                //聚类页面
                $('.slide_wrapper_cluster').bindSlide();
	});

})(jQuery);