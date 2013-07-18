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
class Admin_login extends CI_Controller {
        const LOG_ACTION_LOGIN = '用户登录';
        const LOG_ACTION_LOGOUT = "用户退出";

	/**
	 * 登录页面默认页
	 * 
	 */
	public function index() {
		$this->load->library('Admin_module');
		$this->admin_module->set_script('admin_login');
		// $this->admin_module->set_link('login');
		$this->admin_module->set_header_item('后台登录页面', '登录页面关键字', '登录页面描述');
		$this->load->view('admin/admin_login');
	}

	/**
	 * 检测用户登出
	 * 
	 */
	public function checkout() {
		$this->load->library('Session');
                
        $this->load->library("Admin_login_user");
        $user_info = $this->admin_login_user->get_user_info();
        // print_r($user_info);        
        
        $this->session->unset_userdata('AdminLoginUser');
		// $this->session->unset_userdata('NavigateList');

		redirect('admin/admin_login');
	}

	/**
	 * 检测用户登录
	 * 
	 */
	public function check() {

		// 表单验证规则
		$this->load->library('Ajax_response');
		$this->load->library('Form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('password', 'Passowrd', 'trim|required');

		// 执行表单验证
		if (!$this->form_validation->run()) {
			$this->ajax_response->failured('用户名或密码不合法！');
			
		}

		// 检测用户
		$this->load->library('Admin_login_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$userinfo = $this->admin_login_user->check_user_info($username, $password);
                
		// 是否已登录
		if (isset($userinfo['id'])) {

            $this->ajax_response->succeed('登录成功', $userinfo);
		}

		// 不存在此用户
		$this->ajax_response->failured('用户名或密码输入错误！');
	}

	/**
	 * 检测Session是否失效
	 */
	public function checkSession(){
		// 检测用户
		$this->load->library('Admin_login_user');
		echo $this->admin_login_user->check_session();
	}
}

?>
