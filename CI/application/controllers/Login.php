<?php
class Login extends CI_controller {
	public function __construct() {
		parent::__construct();
	}	

	public function index() {
		return $this->load->view("loginPage",array("msg"=>""));
	}

	public function validate() {
		$uname = $_POST["uname"];
		$this->load->database();
		$this->load->model('LoginValidation');
		if ($this->LoginValidation->get_item($uname)) {
			return $this->load->view("Home");
		}
		$data["msg"] = "Wrong Username";
		return $this->load->view("loginPage",$data);
	}
}

?>