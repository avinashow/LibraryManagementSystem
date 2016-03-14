<?php

class Dashboard extends CI_controller {

	public function __consruct() {

		parent::__construct();		
	}
	
	public function index($val) {
		$this->listing();
	}

	public function listing($di) {
		echo $di;
		$this->load->database();
		$this->load->model('LoginValidation');
		$this->LoginValidation->create_item();
		$val['a'] = $this->LoginValidation->get_all();
		$this->load->view('sample',$val);
	}
}

?>