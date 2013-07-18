<?php

/*
 * @描述 后台登陆控制文件
 * 
 */

/**
 * Description of Admin_login
 *
 * @author zouyuming
 */
class Admin_index extends CI_Controller {

    /**
     * 检测是否已登录
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('Admin_Login_user');
        $this->admin_login_user->redirect();
    }

	/**
	 * 后台登录首页
	 * 
	 */
	public function index() {
		$this->load->library('Admin_module');
		// $this->admin_module->set_script('admin_index');
		// $this->admin_module->set_link('admin_index');
		$this->admin_module->set_header_item('应急网后台首页', '劳动应急网', '《中国劳动应急网》是一个集全国县城乡劳动资源信息为一体的信息发布平台，服务对象是有临时用工需求的社会各个阶层（单位和个人）。务必请您注册时认真如实填写各类相关的信息，您劳动作业的机会可能因此而增多。');

		$this->load->view('admin/admin_index');
	}

	
}

?>
