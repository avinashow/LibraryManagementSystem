<?php

class Books extends CI_model{

	public function __construct() {

		parent::__construct();

	}

	public function create($data) {
		$this->db->insert("books", array(
			"book_info_id" => $data["bookid"],
			"rentable_days" => $data["rent"],
			"Edition" => $data["edition"],
			"isbn" => $data["isbn"],
			"status" => $data["status"]
		));
	}

	public function getBooksById($data) {
		return $this->db->get_where("books",array("book_info_id" => $data));
	}

	public function delete($book_id) {

	}

	public function update($book_id) {
		
	}

}

?>