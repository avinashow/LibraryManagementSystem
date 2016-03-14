<?php

class Dashboard extends CI_controller {

	public function __consruct() {

		parent::__construct();		
	}
	
	public function index() {
		$this->listing();
	}

	public function listing() {
		$this->load->database();
		$this->load->model('asap_m');
		$this->asap_m->create_item();
		$val['a'] = $this->asap_m->get_all();
		$this->load->view('sample',$val);
	}
}

?>