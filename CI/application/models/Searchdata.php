<?php
	class Searchdata extends CI_Model {
		public function __construct() {

			parent::__construct();

		}

		public function createRecord($data) {
			$this->db->insert("searchdata",array(
				"term" => $data["title"],
				"id" => $data["id"],
				"date" => date("m-d-y")
			));
		}
	}

?>