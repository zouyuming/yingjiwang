<?php

/**
 * 获取当前 REWRITE 地址
 * 相当于内置 current_url 去掉 index.php
 * 
 * @author		zouyuming
 */
if (!function_exists('rewrite_current_url')) {
	function rewrite_current_url($url = '') {
		return base_url(url_trait('/')) . '/' . $url;
	}
}

/**
 * 检测链接是否为当前页面链接
 * 用于导航的选中效果
 * 
 * @author		zouyuming
 */
if (!function_exists('in_url')) {
	function in_url($url = '') {
		$CI =& get_instance();
		return strrpos($CI->uri->uri_string(), trim($url, '/')) === 0;
	}
}

/**
 * 连接控制器与方法名组合成页面特殊
 * 用于命名 JS 文件名与 CSS 文件名
 * 
 * @author		zouyuming
 */
if (!function_exists('')) {
	function url_trait($separator = '_') {
		$CI =& get_instance();
		return ltrim($CI->uri->segment(1) . $separator . $CI->uri->segment(2), $separator);
	}
}
