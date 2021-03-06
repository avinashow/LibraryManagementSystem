<?php

class BooksAuthors extends CI_model{

	public function __construct() {

		parent::__construct();

	}

	public function create($data) {
		$this->db->insert("book_authors_info", array(
			"book_id" => $data["bookid"],
			"author_id" => $data["authorid"]			
		));
	}

	public function getAuthorById($data) {
		$this->db->select("author_id");
		return $this->db->get_where("book_authors_info",array("book_id" => $data["id"]));
	}

	public function delete($author_id, $book_id) {

	}

	public function update($author_id, $book_id) {
		
	}

}

?>