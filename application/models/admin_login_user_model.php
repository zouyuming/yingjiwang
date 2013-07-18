<?php


/**
 * Description of login_user_model
 *
 * @author zouyuming
 */
class Admin_login_user_model extends CI_Model {

	/**
	 * 根据用户名密码获取登录用户信息
	 * 
	 */
	public function check_user_info($username, $password) {
		$sql = "SELECT * FROM admins WHERE username='$username' AND password='$password' LIMIT 1";
		return $this->db->query($sql)->row_array();
	}

	/**
	 * 根据UID获取登录用户信息
	 * 
	 */
	public function get_user_info($user_id) {
		$sql = "SELECT * FROM admins WHERE id='$user_id' LIMIT 1";
		return $this->db->query($sql)->row_array();
	}
        

}

?>