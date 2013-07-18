<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * SI_Interface - 提供 CI 接口类
 * 
 * 自动获取 CI 类实例，并且赋值给自身对应成员
 * 非必要情况下可自行加载类，再使用 CI 中实例
 * 此类实现了可跳过调用 CI 成员，但不推荐使用
 *
 * @author windows
 */
class MY_Interface {

	protected $CI;
	private $class;
	private static $_models;
	private static $_databases;

	public function __construct() {
		$this->CI = & get_instance();
		$this->initialize();
		$this->class = str_replace($this->CI->config->item('subclass_prefix'), '', get_class($this));
//		log_message('debug', "$this->class Class Initialized");
	}

	public function initialize() {
		
	}

	/**
	 * 自动加载入类
	 * 
	 */
	public function &__get($class) {

		// 本类中未设置
		switch (strtolower($class)) {
			case 'database':
				$class = 'db';
			case 'db':
				$this->database();
				break;
			case 'model':
				$this->model();
				break;
			case 'load':
				$this->load = $this->CI->load;
				break;
			default:
				if (!isset($this->CI->$class)) {
					$this->CI->load->library($class);
				}
				$this->$class = $this->CI->$class;
				break;
		}

		return $this->$class;
	}

	/**
	 * 遍历调用 CI 已实例类中方法（不建议使用）
	 * 
	 */
//	public function __call($method, $params) {
//		foreach ($this->CI as $object) {
//			if (is_object($object) && method_exists($object, $method)) {
//				return call_user_func_array(array($object, $method), $params);
//			}
//		}
//		return false;
//	}

	/**
	 * 设置模板变量
	 * 
	 */
	public function set_vars($key, $value) {
		$this->CI->load->vars($key, $value);
		return $value;
	}
	/**
	 * 获取本类模型
	 * 
	 */
	public function &model($group = 'default') {

		// 连接默认数据库
		if ($group === 'default') {
			$model = & $this->model;
			if (!isset($model)) {
				$this->database($group);
				$model = $this->class . '_model';
				$this->CI->load->model($model);
				$model = $this->CI->$model;
			}
		}

		// 连接其它数据库
		else {
			$model = & self::$_models[$group];
			if (!isset($model)) {
				$model = $this->class . '_model';
				$this->CI->load->model($model);
				$model = $this->CI->$model;
				$this->$model = $model;
				$model->db = $this->database($group);
			}
		}

		return $model;
	}

	/**
	 * 加载本类模板
	 * 
	 */
	public function view() {
		$this->CI->load->view('main/' . url_trait('/'));
	}

	/**
	 * 获取数据库连接实例
	 * @todo: 考虑到1台服务器仅能分配50个用户，后期可能 $group 要动态改变
	 * 
	 */
	public function &database($group = 'default') {

		// 默认数据库
		if ($group === 'default') {
			$db = & $this->db;
			if (!isset($db)) {
				$this->CI->load->database($group, false);
				$db = $this->CI->db;
			}
		}

		// 其它数据库
		else {
			$db = & self::$_databases[$group];
			if (!isset($db)) {
				$db = & $this->CI->load->database($group, true);
				$this->$group = $db;
			}
		}

		return $db;
	}

}

?>