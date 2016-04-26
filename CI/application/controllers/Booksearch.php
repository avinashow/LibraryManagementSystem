<?php
class Booksearch extends CI_controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
	}	

	public function index() {
		return $this->load->view("homePage");
	}


	public function search() {
		echo "dichik";
		//echo $_GET["data"];
		$this->load->database();
		$this->load->model("Searchdata");
		$data["title"] = $_GET["data"];
		$bookRow = $this->Searchdata->getBookIdByTitle($data);
		$subdict = array();
		foreach ($bookRow->result() as $row) {
			$rowid["id"] = $row->id;
			$this->load->model("BookInfo");
			$book_Info_Row = $this->BookInfo->getBookDetailsById($rowid);
			foreach ($book_Info_Row->result() as $row1) {
				$subdict1 = array();
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
				$subdict[$row1->id] = $subdict1;
			}

		}
		echo json_encode($subdict);
	}

}

?>
