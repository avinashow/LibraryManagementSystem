<?php

class Asap_m extends CI_model{

	public function __construct() {

		parent::__construct();

	}

	public function create_item() {
		$uname = "avinashow";
		$pass = "@vinasH90";
		$dept = "computers";
		$fname = "avinash";
		$lname = "mellamputi";

		$this->db->insert("reader", array(
			"username" => $uname,
			"firstname" => $fname,
			"lastname" => $lname,
			"password" => $pass
		));
	}

	public function get_all() {
		$t =  $this->db->get('reader');
		foreach ($t->result() as $val) {
			# code...
		}
		return $val->username;
	}

	public function update_item() {

	}

	public function get_item() {

	}

	public function delete_item() {

	}

}

?>