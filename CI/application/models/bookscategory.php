<?php

class BooksCategory extends CI_model{

	public function __construct() {

		parent::__construct();

	}

	public function create($data) {
		$this->db->insert("book_category", array(
			"category_id" => $data["categoryid"],
			"book_id" => $data["bookid"]
		));
	}

	public function get_item($data) {

	}

	public function delete($author_id) {

	}

	public function update($author_id) {
		
	}

}

?>