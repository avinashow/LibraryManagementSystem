<?php
class Home extends CI_controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
	}	

	public function index() {		
		$this->load->view("homepage");
	}

	public function getOptions() {
		$this->load->database();
		$this->load->model('BookInfo');
		$book = $this->BookInfo->get_all();
		$this->load->model('AuthorInfo');
		$author = $this->AuthorInfo->get_all();
		$author_array = [];
		if ($author->num_rows() > 0) {
			foreach ($author->result() as $row_author) {
				$name = $row_author->firstname . " " . $row_author->lastname;
				array_push($author_array,$name);
			}
		}		
		$array = [];
		foreach ($book->result() as $row) {
			array_push($array,$row->publisher);
		}
		$result["publishers"] = $array;
		$result["authors"] = $author_array;
		echo json_encode($result);
	}

	public function upload() {
		//Posting the data into the BookInfo table
		$postDictionary["title"] = $_POST["Title"];
		$postDictionary["publisher"] = $_POST["Publisher"];
		$postDictionary["Pages"] = $_POST["Pages"];
		$postDictionary["image_url"] = 'images/'.basename($_FILES["fileToUpload"]["name"]);

		echo $postDictionary["title"];
		$this->load->database();
		$this->load->model('BookInfo');
		$this->BookInfo->create($postDictionary);

		$postCategory["Category"] = $_POST["Category"];
		$this->load->database();
		$this->load->model('Categories');
		$this->Categories->create($postCategory);

		$author_name = explode(" ",$_POST["Author"]);
		$postAuthor["firstname"] = $author_name[0];
		$postAuthor["lastname"] = $author_name[1];
		$this->load->database();
		$this->load->model('AuthorInfo');
		$this->AuthorInfo->create($postAuthor);

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

		redirect("home","refresh");

	}
}

?>