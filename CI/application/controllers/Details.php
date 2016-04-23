<?php
class Details extends CI_controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
	}

	public function index() {
		$data["id"] = $_GET["infoid"];
		$this->load->database();
		$this->load->model("BookInfo");
		$book_Info_Row = $this->BookInfo->getBookDetailsById($data);
		$subdict1 = array();
		foreach ($book_Info_Row->result() as $row1) {
			$subdict1["title"] = $row1->title;
			$subdict1["isbn"] = $row1->ISBN;
			$subdict1["image_url"] = $row1->image_url;
			$subdict1["edition"] = $row1->Edition;
			$subdict1['publisher'] = $row1->publisher;
			$this->load->model("Books");
			if ($this->Books->checkAvailability($row1->id)) {
				$subdict1["status"] = "A";
			} else {
				$subdict1["status"] = "N/A";
			}
			$subdict1["id"] = $row1->id;
		}
		return $this->load->view("bookdetails", $subdict1);
	}

	public function getDetails() {
		$book_info_id = $_GET["data"];
		$this->session->set_userdata("id", $book_info_id);
	}
}