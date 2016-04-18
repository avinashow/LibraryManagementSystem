<?php

class BookInfo extends CI_model{

	public function __construct() {

		parent::__construct();

	}

	public function create($data) {
		$this->db->insert("book_info", array(
			"title" => $data["title"],
			"publisher" => $data["publisher"],
			"pages" => $data["Pages"],
			"image_url" => $data["image_url"]
		));
	}

	public function getBookIdTitle($data) {
		$this->db->like("title",$data["title"]);
		return $this->db->get("book_info");
	}

	public function get_all() {
		$this->db->select("id,title");
		return $this->db->get("book_info");

	}

	public function delete($book_id) {

	}

	public function update($book_id) {
		
	}

}

?>