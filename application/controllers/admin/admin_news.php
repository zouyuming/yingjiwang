<?php

/*
 * @描述 后台新闻管理控制文件
 * 
 */

/**
 * Description of Admin_news
 *
 * @author zouyuming
 */
class Admin_news extends CI_Controller {

    /**
     * 检测是否已登录
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('Admin_Login_user');
        $this->admin_login_user->redirect();
		$this->load->library('Admin_module');
		$this->admin_module->set_script('admin_news');
		// $this->admin_module->set_link('bootstrap.min');
		$this->admin_module->set_header_item('新闻管理页面', '新闻管理关键字', '新闻管理页面描述');
		$this->admin_module->set_footer_item();
    }

	/**
	 * 页面默认页
	 * 
	 */
	public function index($page = 1) {

		$this->load->library('Admin_news');
/*
		// $news_list = $this->admin_news->get_news_list();
        // $this->admin_module->set_vars('newsList', $news_list);
		
        //载入CI自带的分页类库
		$this->load->library('pagination');
		//通过$config 数组设置分页类的配置参数
		$config['base_url'] = base_url('admin/admin_news/index');
		$config['total_rows'] = $this->admin_news->get_news_count();//total_rows 这个数字展示了你需要做分页的数据总行数，我们可以通过演员表模型中count方法获得
		$config['per_page'] = 2;//分页类每页显示多少条记录
		$config['uri_segment'] = 4;// 表示第 3 段 URL 为当前页数，如 index.php/控制器/方法/页数，如果表示当前页的 URL 段不是第 3 段,请修改成需要的数值。
		$config['num_links'] = 3;
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
		$data['newsList'] = $this->admin_news->get_news_list($config['per_page'],$page);
		$data['pagestr'] = $this->pagination->create_links();//分页类中的 create_links()方法将输出分页链接
		// $this->load->view('cast_index',$data);
		print_r($data);
*/
		$data = $this->admin_news->get_news_page();
		$this->load->view('admin/admin_news',$data);
	}

	/**
	 * 分页显示新闻列表
	 * 
	 */
	public function show_news_page($page = 1) {
		$this->load->library("Admin_news");
		$data = $this->admin_news->get_news_page($page);


		
		$this->load->library('Ajax_response');
		
		$this->ajax_response->succeed('获取列表成功！',$data);
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
