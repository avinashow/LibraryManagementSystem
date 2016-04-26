<?php
class Home extends CI_controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
	}	

	public function index() {		
		return $this->load->view("AddBookForm");
	}

	public function getOptions() {
		$this->load->database();
		$this->load->model("bookinfo");
		$book = $this->bookinfo->get_all();
		$array = [];
		$subdict = array();	
		foreach ($book->result() as $row) {		
			$dict = array();
			$dict["id"] = $row->id;
			$dict["edition"] = $row->Edition;
			$subdict[$row->title] = $dict;
		}
		echo json_encode($subdict);
	}

	public function upload() {
		//Posting the data into the BookInfo table
		$postDictionary["title"] = $_POST["Title"];
		$postDictionary["publisher"] = $_POST["Publisher"];
		$postDictionary["Pages"] = $_POST["Pages"];
		$postDictionary["isbn"] = $_POST["ISBN"];
		$postDictionary["edition"] = $_POST["Edition"];
		$postDictionary["image_url"] = 'images/'.basename($_FILES["fileToUpload"]["name"]);
		$this->load->database();
		$this->load->model('bookinfo');
		$book_result = $this->bookinfo->getBookIdTitle($postDictionary);
		if ($book_result->num_rows() == 0) { // verify whether these details are present in database
			$this->bookinfo->create($postDictionary);
			$book_row= $this->bookinfo->getBookIdTitle($postDictionary);
			foreach($book_row->result() as $row) {
				$book_id = $row->id;
			}
		} else {
			foreach($book_result->result() as $row) {
				$book_id = $row->id;
			}
		}

		//Posting the data into Categories table
		$postCategory["Category"] = $_POST["Category"];
		$this->load->database();
		$this->load->model('categories');
		$category_row = $this->categories->getItem($postCategory);
		if ($category_row->num_rows == 0) {
			$this->categories->create($postCategory);
			$cat_row = $this->categories->getItem($postCategory);
			foreach ($cat_row->result() as $row) {
				$category_id = $row->cat_id;
			}
		} else {
			foreach ($category_row->result() as $row) {
				$category_id = $row->cat_id;
			}
		}
		

		//Posting the data into the Author Info table
		$author_name = explode(" ",$_POST["Author"]);
		$postAuthor["firstname"] = $author_name[0];
		$postAuthor["lastname"] = $author_name[1];
		$this->load->database();
		$this->load->model('authorinfo');
		$author_result = $this->authorinfo->getItem($postAuthor);
		if ($author_result->num_rows() == 0) {
			$this->authorinfo->create($postAuthor);
			$auth_row= $this->authorinfo->getItem($postAuthor);
			foreach ($auth_row->result() as $row) {
				$auth_id = $row->id;
			}
		} else {
			foreach ($author_result->result() as  $row) {
				# code...
				$auth_id = $row->id;
			}
		}

		//posting into the table author book table
		$postAuthorBookTable["bookid"] = $book_id;
		$postAuthorBookTable["authorid"] = $auth_id;
		$this->load->database();
		$this->load->model('booksauthors');
		$this->booksauthors->create($postAuthorBookTable);

		//posting into the table category book table
		$postCategoryBookTable["bookid"] = $book_id;
		$postCategoryBookTable["categoryid"] = $category_id;
		$this->load->database();
		$this->load->model('bookscategory');
		$this->bookscategory->create($postCategoryBookTable);

		//Uploading the Image
		$target_dir = 'images/';
		$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		$var = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

		//insert into the search data table
		$arrayofData = array($_POST["Title"], $_POST["Publisher"], $_POST["Author"]);
		for ($x = 0; $x < count($arrayofData); $x++) {
			$testObject = new Home();
			$testObject->searchdataTable($arrayofData[$x], $book_id);
		}
		

		redirect("addbook","refresh");

	}

	function searchdataTable($data, $book_id) {
		$titledata_array = explode(" ",$data);
		for ($x = 0; $x < count($titledata_array); $x++) {
			$searchdata["title"] = $titledata_array[$x];
			for ($y = $x; $y<count($titledata_array); $y++) {
				if ($x != $y) {
					$searchdata["title"] = $searchdata["title"] ." ".$titledata_array[$y];
				}
				$searchdata["id"] = $book_id;
				$this->load->database();
				$this->load->model("searchdata");
				$this->searchdata->createRecord($searchdata);
			}
		}
	}

	function addBooks() {
		$postBooks["bookid"] = $_POST["title"];
		$postBooks["edition"] = $_POST["edition"];
		$postBooks["copies"] = $_POST["copies"];
		$postBooks["rent"] = $_POST["RentableDays"];
		$postBooks["status"] = "Available";
		$this->load->database();
		$this->load->model('books');
		$this->books->create($postBooks);
		redirect("addbook","refresh");
	}
}

?>