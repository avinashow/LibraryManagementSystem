<?php
class Home extends CI_controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
	}	

	public function index() {		
		$this->load->view("AddBookForm");
	}

	public function getOptions() {
		$this->load->database();
		$this->load->model("BookInfo");
		$book = $this->BookInfo->get_all();
		$array = [];
		foreach ($book->result() as $row) {		
			$dict = array();	
			$dict[$row->title] = $row->id;
			array_push($array,$dict);
		}
		$result["data"] = $array;
		echo json_encode($result);
	}

	public function upload() {
		//Posting the data into the BookInfo table
		$postDictionary["title"] = $_POST["Title"];
		$postDictionary["publisher"] = $_POST["Publisher"];
		$postDictionary["Pages"] = $_POST["Pages"];
		$postDictionary["image_url"] = 'images/'.basename($_FILES["fileToUpload"]["name"]);
		$this->load->database();
		$this->load->model('BookInfo');
		$book_title["title"] = $postDictionary["title"];
		$book_result = $this->BookInfo->getBookIdTitle($book_title);
		if ($book_result->num_rows() == 0) { // verify whether these details are present in database
			$this->BookInfo->create($postDictionary);
			$book_row= $this->BookInfo->getBookIdTitle($book_title);
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
		$this->load->model('Categories');
		$category_row = $this->Categories->getItem($postCategory);
		if ($category_row->num_rows == 0) {
			$this->Categories->create($postCategory);
			$cat_row = $this->Categories->getItem($postCategory);
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
		$this->load->model('AuthorInfo');
		$author_result = $this->AuthorInfo->getItem($postAuthor);
		if ($author_result->num_rows() == 0) {
			$this->AuthorInfo->create($postAuthor);
			$auth_row= $this->AuthorInfo->getItem($postAuthor);
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
		$this->load->model('BooksAuthors');
		$this->BooksAuthors->create($postAuthorBookTable);

		//posting into the table category book table
		$postCategoryBookTable["bookid"] = $book_id;
		$postCategoryBookTable["categoryid"] = $category_id;
		$this->load->database();
		$this->load->model('BooksCategory');
		$this->BooksCategory->create($postCategoryBookTable);

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

		redirect("addbook","refresh");

	}

	function addBooks() {
		$postBooks["bookid"] = $_POST["title"];
		$postBooks["isbn"] = $_POST["ISBN"];
		$postBooks["edition"] = $_POST["Edition"];
		$postBooks["rent"] = $_POST["RentableDays"];
		$postBooks["status"] = "Available";
		$this->load->database();
		$this->load->model('Books');
		$this->Books->create($postBooks);
		redirect("addbook","refresh");
	}
}

?>