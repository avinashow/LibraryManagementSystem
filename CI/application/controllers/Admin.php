<?php

class Admin extends CI_Controller{

	public function __construct() {

		parent::__construct();

	}

	public function index() {
		return $this->load->view("adminHomePage");
	}

}