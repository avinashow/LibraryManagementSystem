<?php
	class Myaccount extends CI_Controller {
		public function __construct() {
			parent::__construct();
			 $this->load->helper('url');
			 $this->load->library('session');
			 $this->load->library('encrypt');
		}	

		public function index() {
			return $this->load->view("myaccount");
		}
	}

?>