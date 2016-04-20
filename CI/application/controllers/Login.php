<?php
class Login extends CI_controller {
	public function __construct() {
		parent::__construct();
		 $this->load->helper('url');
		 $this->load->library('session');
		 $this->load->library('encrypt');
	}	

	public function index() {
		return $this->load->view("loginPage");
	}

	public function validate() {
		//$_GET["data"]["username"];
		$login["username"] = $_GET["data"]["username"];
		$login["password"] = $_GET["data"]["password"];
		$this->load->database();
		$this->load->model('LoginValidation');
		$response["data"] = "";
		if ($this->LoginValidation->get_item($login)) {
			$response["data"] = "success";
		} 
		echo json_encode($response);
	}
}

?>