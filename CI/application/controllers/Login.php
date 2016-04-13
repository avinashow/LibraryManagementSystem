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
		$uname = $_POST["uname"];
		$this->load->database();
		$this->load->model('LoginValidation');
		if ($this->LoginValidation->get_item($uname)) {
			$username = explode("@", $uname, -1);
			$this->session->set_userdata("username",$username[0]);
			redirect("home","refresh");
		}
		$data["msg"] = "Wrong Username";
		return $this->load->view("loginPage",$data);
	}
}

?>