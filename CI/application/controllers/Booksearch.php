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
		//echo $_GET["data"];
		$this->load->database();
		$this->load->model("BookInfo");
		$data["title"] = $_GET["data"];
		$bookRow = $this->BookInfo->getBookIdTitle($data);
		$book_id = [];
		$book_name = [];
		$book_url = [];
		$book_publisher = [];
		$book_pages = [];
		$subMainResponse = array();
		//$mainResponse = array();
		$mainResponse["data"] = array();
		if ($bookRow->num_rows() > 0) {
			foreach ($bookRow->result() as $row) {
				array_push($book_id,$row->id);
				array_push($book_name,$row->title);
				array_push($book_url,$row->image_url);
				array_push($book_publisher,$row->publisher);
				array_push($book_pages,$row->pages);
			}
			for ($i = 0; $i < count($book_id); $i++) {
				$this->load->model("Books");
				$booksRows = $this->Books->getBooksById($book_id[$i]);
				foreach ($booksRows->result() as $row) {
					$response = array();
					$response["id"] = $row->id;
					$response["title"] = $book_name[$i];
					$response["Edition"] = $row->Edition;
					$response["isbn"] = $row->isbn;
					$response["publisher"] = $book_publisher[$i];
					$response["pages"] = $book_pages[$i];
					$response["url"] = $book_url[$i];
					array_push($subMainResponse,$response);
				}
			}
			$mainResponse["data"] = $subMainResponse;
		}
		echo json_encode($mainResponse);
	}

}

?>