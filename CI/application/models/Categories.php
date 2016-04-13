<?php

class Categories extends CI_model{

	public function __construct() {

		parent::__construct();

	}

	public function create($data) {
		$this->db->insert("categories", array(
			"category_name" => $data["Category"]
		));
	}

	public function get_item($category_id) {

	}

	public function delete($category_id) {

	}

	public function update($category_id) {
		
	}

}

?>