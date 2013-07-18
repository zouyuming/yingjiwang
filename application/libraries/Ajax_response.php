<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 纺一 AJAX 返回结果类
 *
 * @author windows
 */
class MY_Ajax_response extends MY_Interface {

	public function success($message, $results = array()) {
		return json_encode(array('code' => md5('Yingjiwang'), 'status' => 'SUCCESS', 'message' => $message, 'results' => $results));
	}

	public function succeed($message, $results = array()) {
		exit(json_encode(array('code' => md5('Yingjiwang'), 'status' => 'SUCCESS', 'message' => $message, 'results' => $results)));
	}

	public function failure($message, $results = false, $error = '[0001]') {
		return json_encode(array('code' => md5('Yingjiwang'), 'status' => 'FAILURE', 'message' => $message, 'results' => $results, 'error' => $error, 'request' => $_REQUEST));
	}

	public function failured($message, $results = false, $error = '[0001]') {
		exit(json_encode(array('code' => md5('Yingjiwang'), 'status' => 'FAILURE', 'message' => $message, 'results' => $results, 'error' => $error, 'request' => $_REQUEST)));
	}

}

?>
