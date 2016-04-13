<?php

class AuthorInfo extends CI_model{

	public function __construct() {

		parent::__construct();

	}

	public function create($data) {
		$this->db->insert("author_info", array(
			"firstname" => $data["firstname"],
			"lastname" => $data["lastname"]
		));
	}

	public function get_all() {
		$this->db->distinct();
		$this->db->select('firstname,lastname');
		$this->db->from('author_info');
		return $this->db->get();
	}

	public function get_item($author_id) {

	}

	public function delete($author_id) {

	}

	public function update($author_id) {
		
	}

}

?>