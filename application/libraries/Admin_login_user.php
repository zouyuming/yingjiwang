<?php


/**
 * Description of login_user_lib
 *
 * @author zouyuming
 */
class MY_Admin_login_user extends MY_Interface {

	protected $user_info;

	/**
	 * 未登录定向到登录页面
	 * 
	 */
	public function redirect() {
		if (!$this->is_logged()) {
			if ($this->input->is_ajax_request()) {
				$this->ajax_response->failured('未登录不能访问此页面！');
			}
			redirect('admin/admin_login');
		}
	}

	/**
	 * 用户是否登录
	 * 
	 */
	public function is_logged() {
		$user_info = $this->get_user_info();
		return $user_info && isset($user_info['id']);
	}

	/**
	 * 获取登录信息
	 * 
	 */
	public function get_user_info() {
		$login_user = $this->session->userdata('AdminLoginUser');
		if ($login_user && isset($login_user['id'])) {
			return $login_user;
		}
	}

	/**
	 * 获取用户ID
	 * 
	 */
	public function get_user_id() {
		$user_info = $this->get_user_info();
		return $user_info && isset($user_info['id']) ? $user_info['id'] : -1;
	}


	/**
	 * 创建一个测试用户
	 * 
	 */
	public function create_unit_user($user_id, $group = 'default') {
		$user_info = $this->model->get_user_info($user_id);
		if ($user_info && isset($user_info['id'])) {
			$this->session->set_userdata('AdminLoginUser', $user_info);
			$this->database($group);
			return $user_info;
		}
		return false;
	}

	/**
	 * 获取登录信息
	 * 
	 */
	public function check_user_info($username, $password) {
		$user_info = $this->model->check_user_info($username, $password);
		if ($user_info && isset($user_info['id'])) {
			$this->session->set_userdata('AdminLoginUser', $user_info);
			return $user_info;
		}
		return false;
	}
        

	
    /**
        * 根据session中UserID是否存在，从而判断session是否失效
        */
    public function check_session(){
            $user_info = $this->get_user_info();
            return $user_info && isset($user_info['id']) ? 'true' : 'false';
    }


}

?>
