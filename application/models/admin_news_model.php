<?php


/**
 * Description of news_model
 *
 * @author zouyuming
 */
class Admin_news_model extends CI_Model {

	/**
	 * 获取某一页新闻列表
	 * 
	 */
	public function get_news_list($pageSize=20, $page=1) {
		$offset= $pageSize*($page-1);
		$sql = "SELECT n.*,nt.name as type_name FROM news n LEFT JOIN news_type nt ON n.type_id = nt.id WHERE n.readrank >=0 LIMIT $offset,$pageSize";
		return $this->db->query($sql)->result_array();
	}

	/**
	 * 获取新闻总数
	 * 
	 */
	public function get_news_count() {
		$sql = "SELECT count(id) as ncount FROM news WHERE readrank >=0";
		return $this->db->query($sql)->row_array();
	}
        

}

?>