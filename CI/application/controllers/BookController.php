<?php
class BookController extends CI_controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
	}	

	public function index() {
		$msg["msg"] = "";
		return $this->load->view("AddBookForm",$msg);
	}

	public function CreateUser() {
		$this->load->model("ReaderInfo");
		$uname = $_POST["uname"];
		if ($this->ReaderInfo->get_item($uname)) {
			$msg["msg"] = "Username already exists";
			return $this->load->view("AddBookForm",$msg);
		}
		$this->ReaderInfo->create();
		$msg["msg"] = "Created!";
		redirect("/addbook", "refresh");
	}

}

?>