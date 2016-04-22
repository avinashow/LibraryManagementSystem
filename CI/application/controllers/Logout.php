<?php

class Logout extends CI_controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
	}

	public function index() {
	}

	public function signout() {
		$this->session->sess_destroy();
	}
}


?>