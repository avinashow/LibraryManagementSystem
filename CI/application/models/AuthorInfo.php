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

	public function getAuthorName($data) {
		return $this->db->get_where("author_info",array("id" => $data));
	}

	public function getItem($author) {
		$this->db->select('id');
		return $this->db->get_where('author_info',array("firstname" => $author["firstname"], "lastname" => $author["lastname"]));
	}

	public function delete($author_id) {

	}

	public function update($author_id) {
		
	}

}

?>