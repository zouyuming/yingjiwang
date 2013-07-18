<?php


if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * SI_Module - 网页模块类
 * 
 * 实现对构建整个网站 HTML 模块控制
 * 也可用于快速的生成 HTML 标签代码
 *
 * @author		zouyuming
 */
class MY_Admin_module extends MY_Interface {

	protected $CI;
	protected $tags;
	protected $cfgs;

	/**
	 * 此类初始方法
	 * 
	 */
	public function initialize() {

		// 全局 CSS，可在此自行添加
		$this->set_link('reset');
		$this->set_link('style');
		$this->set_link('invalid');
		// $this->set_link('jquery.slide');

		// 全局 JS，可在此自行添加
		$this->set_script('jquery-1.8.2.min');
		$this->set_script('simpla.jquery.configuration');
		$this->set_script('facebox');
		$this->set_script('jquery.wysiwyg');
		$this->set_js('yingjiwang');
		

		// 全局 JS 变量
		$this->set_cfgs('CurrentURL', rewrite_current_url());
		$this->set_cfgs('BaseURL', base_url());
		$this->set_vars('config_html', $this->get_cfgs());

        $this->load->library('Admin_Login_user');
        $user_info = $this->admin_login_user->get_user_info();
        $this->set_vars('userinfo', $user_info);
	}

	/**
	 * 设置头部公用代码
	 * 
	 */
	public function set_header_item($title, $keywords = null, $description = null, $charset = 'UTF-8') {

		// 设置网页标题
		$this->set_title($title);

		// 设置网页编码，关键字，描述
		$this->set_meta('charset', $charset);
		$this->set_meta('keywords', $keywords);
		$this->set_meta('description', $description);

		// 设置模板变量
		$this->set_vars('header_html', $this->get_clean());

		// 输出时发送 HTTP HEADER
		$this->CI->output->set_header('content-type: text/html; charset=' . $charset);
	}

	/**
	 * 设置尾部公用代码
	 * 
	 */
	public function set_footer_item() {
		$footer_html = "<div id='footer'>" .
						"	<small>" .
						"	&#169; Copyright 2013 <a href='http://www.zgldyj.com' target='_blank'>www.zgldyj.com</a> All Rights Reserved 版权所有·中国劳动同城应急网，并保留所有权。  | <a href='#'>Top</a>" .
						"	</small>" .
						"</div>";
		$this->set_vars("footer_html",$footer_html);

	}

	

	/**
	 * 设置导航栏树
	 * 
	 */
	public function set_navigate_tree($position = 'header', $class_name = 'navigate_tree') {
		$navigate_tree = $this->navigate->get_navigate_tree($position, $class_name);
		$this->set_vars($class_name . '_html', $navigate_tree);
                //设置logo
                $this->set_logo_pic();
	} 

	/**
	 * 设置导航子类
	 * 
	 */
	public function set_children_tree($position = 'header', $class_name = 'children_tree') {
		$parent_id = $this->navigate->get_parent_id();
		$children_tree = $parent_id ? $this->navigate->get_child_tree($parent_id, $position, $class_name) : '';
		$this->set_vars($class_name . '_html', $children_tree);
	}

	

   
	/**
	 * 获取 JS 配置项
	 * 
	 */
	public function get_cfgs() {
		$this->tags['script'][] = array(
			'type' => 'text/javascript',
			'html' => "Yingjiwang.extend('Config'," . json_encode($this->cfgs) . ');',
		);
		return $this->get_tags();
	}

	/**
	 * 设置 JS 配置项
	 * 
	 */
	public function set_cfgs($key, $value) {
		$this->cfgs[$key] = $value;
	}

	/**
	 * 获取标签代码
	 * 
	 */
	public function get_tags() {
		$tags = '';
		foreach ($this->tags as $tag => $opts) {
			$tags .= "\r\n<!-- $tag Tags Start -->\r\n";
			foreach ($opts as $attrs) {
				$tags .= "<$tag";
				if (is_string($attrs)) {
					$tags .= ">$attrs</$tag>\r\n";
				} else {
					foreach ($attrs as $key => $value) {
						if ($key != 'html') {
							$tags .= " $key='$value'";
						}
					}
					$html = isset($attrs['html']) ? stripslashes($attrs['html']) : '';
					$tags .= ">$html</$tag>\r\n";
				}
			}
			$tags .= "<!-- $tag Tags End -->\r\n";
		}
		return $tags;
	}

	/**
	 * 获取标签代码并清空
	 * 
	 */
	public function get_clean() {
		$tags = $this->get_tags();
		$this->clean_tags();
		return $tags;
	}

	/**
	 * 获取标签集合
	 * 
	 */
	public function clean_tags() {
		$this->tags = array();
	}

	/**
	 * 设置标签属性
	 * 
	 */
	public function set_tag($tag, $attrs) {
		$this->tags[$tag][] = $attrs;
	}

	/**
	 * 设置 title 标签
	 * 
	 */
	public function set_title($title) {
		$this->tags['title'][] = stripslashes($title);
	}

	/**
	 * 设置 meta 标签
	 * 
	 */
	public function set_meta($name, $content) {
		if ($content) {
			switch (strtolower($name)) {
				case 'charset':
				case 'content-type':
					$attrs = array(
						'http-equiv' => 'content-type',
						'content' => 'text/html; charset=' . $content
					);
					break;
				default:
					$attrs = array(
						'name' => $name,
						'content' => $content
					);
					break;
			}
			$this->tags['meta'][] = $attrs;
		}
	}

	/**
	 * 设置 link 标签
	 * 
	 */
	public function set_link($name, $skin = 'default') {
		$this->tags['link'][] = array(
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'href' => base_url("resources/admin/css/$name.css"),
		);
	}

	/**
	 * 设置 link 标签（样式表）
	 * 
	 */
	public function set_css($name, $skin = 'default') {
		$this->tags['link'][] = array(
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'href' => base_url("style/$skin/css/$name.css"),
		);
	}

	/**
	 * 设置 script 标签
	 * 
	 */
	public function set_script($name) {
		$this->tags['script'][] = array(
			'type' => 'text/javascript',
			'src' => base_url("resources/admin/scripts/$name.js"),
		);
	}

	/**
	 * 设置 script 标签（脚本）
	 * 
	 */
	public function set_js($name) {
		$this->tags['script'][] = array(
			'type' => 'text/javascript',
			'src' => base_url("resources/scripts/$name.js"),
		);
	}



	/**
	 * 设置 JS Map组件（包含Raphael）
	 * 
	 */
	public function set_jsmap() {
		$this->set_script('jsmap/raphael-min');
		$this->set_script('jsmap/chinamap');
	}

	/**
	 * 加载与自身相关 JS 与 CSS
	 * 控制器目录_控制器.js
	 * 控制器目录_控制器.css
	 * 
	 */
	public function set_oneself() {
		$url_trait = url_trait('/');
		$this->set_link('sentiui');
		$this->set_link($url_trait);
		$this->set_script('main/' . $url_trait);
	}

}

?>
