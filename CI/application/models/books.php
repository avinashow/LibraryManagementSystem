<?php

class Books extends CI_model{

	public function __construct() {

		parent::__construct();

	}

	public function create($data) {
		for ($x = 0; $x < $data[copies]; $x++) {
			$this->db->insert("books", array(
				"book_info_id" => $data["bookid"],
				"rentable_days" => $data["rent"],
				"status" => $data["status"]
			));
		}		
	}

	public function getBooksById($data) {
		return $this->db->get_where("books",array("book_info_id" => $data));
	}

	public function checkAvailability($data) {
		$result = $this->db->get_where("books",array("book_info_id"=>$data,"status"  => "Available"));
		if ($result->num_rows() > 0) {
			return true;
		}
		return false;
	}

	public function delete($book_id) {

	}

	public function update($book_id) {
		
	}

}

?>