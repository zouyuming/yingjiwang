<?php


/**
 * Description of news_lib
 *
 * @author zouyuming
 */
class MY_Admin_news extends MY_Interface {

	protected $user_info;

	/**
	 * 获取新闻列表
	 */
	public function get_news_list($pageSize=20,$page=1){
		$news_list = $this->model->get_news_list($pageSize,$page);
		$news_count = $this->model->get_news_count();
		// echo "新闻总数是：";print_r($news_count);
		return $news_list;
	}

	/**
	 * 获取新闻总数
	 */
	public function get_news_count(){
		$news_count = $this->model->get_news_count();

		return $news_count["ncount"];
	}

	/**
	 * 获取分页显示新闻列表
	 * 
	 */
	public function get_news_page($page = 1) {
		
        //载入CI自带的分页类库
		$this->load->library('pagination');
		//通过$config 数组设置分页类的配置参数
		$config['base_url'] = base_url('admin/admin_news/show_news_page');
		$config['total_rows'] = $this->get_news_count();//total_rows 这个数字展示了你需要做分页的数据总行数，我们可以通过演员表模型中count方法获得
		$config['per_page'] = 2;//分页类每页显示多少条记录
		$config['uri_segment'] = 4;// 表示第 3 段 URL 为当前页数，如 index.php/控制器/方法/页数，如果表示当前页的 URL 段不是第 3 段,请修改成需要的数值。
		$config['num_links'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['first_link'] = '首页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '末页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);//分页类中的initialize方法传递参数配置
		$data['newsList'] = $this->get_news_list($config['per_page'],$page);
		$data['pagestr'] = $this->pagination->create_links();//分页类中的 create_links()方法将输出分页链接
		// print_r($data);
		// $this->load->view('admin/admin_news',$data);
		return $data;
	}

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
