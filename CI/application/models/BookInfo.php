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

	public function get_item($book_id) {

	}

	public function get_all() {
		$this->db->distinct();
		$this->db->select('publisher');
		$this->db->from('book_info');
		return $this->db->get();

	}

	public function delete($book_id) {

	}

	public function update($book_id) {
		
	}

}

?>