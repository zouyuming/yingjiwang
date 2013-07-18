<?php


/**
 * Description of login
 *
 * @author zouyuming
 */
class login extends CI_Controller {
        const LOG_ACTION_LOGIN = '用户登录';
        const LOG_ACTION_LOGOUT = "用户退出";

	/**
	 * 登录页面默认页
	 * 
	 */
	public function index() {
		$this->load->library('Module');
		$this->module->set_script('main/login');
		$this->module->set_link('login');
		$this->module->set_header_item('登录页面', '登录页面关键字', '登录页面描述');
		$this->load->view('main/login');
	}

	/**
	 * 检测用户登出
	 * 
	 */
	public function checkout() {
		$this->load->library('Session');
                
                $this->load->library("Login_user");
                $user_info = $this->login_user->get_user_info();
                
                $this->load->library('User_log');
                $content = "用户" . $user_info['username'] . "退出系统";
                $this->user_log->save_log($user_info['id'], $user_info['username'], $user_info['id'], self::LOG_ACTION_LOGOUT, $content, '', $content);
                
		$this->session->unset_userdata('LoginUser');
		$this->session->unset_userdata('NavigateList');
                

		redirect('login');
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
		$this->load->library('Login_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$userinfo = $this->login_user->check_user_info($username, $password);

                //取出配置好的登录后的首页URL
                $this->load->config('home');
                $this->home_config = $this->config->item('routes');
                $login_url = $this->home_config['login'];
                
		// 是否已登录
		if (isset($userinfo['id'])) {
                    $this->load->library('User_log');
                    $content = "用户" . $username . "登录系统";
                    $this->user_log->save_log($user_info['id'], $username, $userinfo['id'], self::LOG_ACTION_LOGIN, $content, '', $content);
                    
                    $userinfo['login_url'] = $login_url;
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
		$this->load->library('Login_user');
		echo $this->login_user->check_session();
	}
}

?>
