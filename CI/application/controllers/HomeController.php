<?php
class HomeController extends CI_controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('encrypt');
	}	

	public function index() {
		$da["user"] = $this->session->userdata('username');
		return $this->load->view("Home",$da);
	}

}

?>