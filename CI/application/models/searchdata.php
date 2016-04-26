<?php
	class Searchdata extends CI_Model {
		public function __construct() {

			parent::__construct();

		}

		public function createRecord($data) {
			$this->db->insert("searchdata",array(
				"term" => $data["title"],
				"book_id" => $data["id"],
				"date" => date("m-d-y")
			));
		}

		public function getBookIdByTitle($data) {
			$this->db->select("book_id");
			$this->db->distinct();
			$this->db->from("searchdata");
			$this->db->like("term",$data["title"],"after");
			return $this->db->get();
		}
	}

?>