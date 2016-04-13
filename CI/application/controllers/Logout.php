<?php


class Logout extends CI_controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
	}

	public function index() {
		$this->session->unset_userdata("username");
		redirect("/login");
	}
}


?>