<?php

class ReaderInfo extends CI_model{

	public function __construct() {

		parent::__construct();
		$this->load->database();

	}

	public function create() {
		$username = $_POST["uname"];
		$firstname = $_POST["fname"];
		$password = $_POST["pass"];
		$lastname = $_POST["lname"];

		$data = array("username"=>$username,"firstname"=>$firstname,"lastname"=>$lastname,"password"=>$password);
		$this->db->insert("reader",$data);

	}

	public function get_item($reader_id) {
		$result = $this->db->get_where("reader",array("username"=>$reader_id));
		if ($result->num_rows() == 0) {
			return false;
		}
		return true;
	}

	public function delete($reader_id) {

	}

	public function update($reader_id) {
		
	}

}

?>