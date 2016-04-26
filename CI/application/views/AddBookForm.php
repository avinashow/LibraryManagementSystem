<html>
<head>
	<title>Add Books</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!--<link rel="stylesheet" href="/CI/assets/css/loginPage.css"/> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->

	<script>
		$(document).ready(options);

		function options() {
			$("div.success").text("AddBook Page");
			$( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
			$("#id").text("welcome " + sessionStorage.getItem("username"));
			$.get('Home/getOptions','',function(data) {
				var data_objects = eval("(" + data + ")");
				displayAddBookForm();
				displayAddBooksForm(data_objects);
			});

			$("#logout").click(function() {
				sessionStorage.removeItem("username");
				window.location="home"
			});
		}


		function displayAddBookForm() {
			//alert(data_objects["authors"][0]);
			var formField = $("#form-hr");
			var fieldNames = ["Title","Publisher","Author","Category","ISBN","Edition","Pages"];
			for (var i = 0; i < fieldNames.length; i++) {
				$("<div class='form-group'><label>" + fieldNames[i] +"</label><input type='text' class='form-control field-size' name='"+ fieldNames[i] +"'/></div>").appendTo(formField);
			}
			$("<div class='form-group'><label>Upload Image</label><input type='file' name='fileToUpload' id='fileToUpload'/></div>").appendTo(formField);
			$("<input type='submit' id='submit_form' class='btn btn-primary' value='Submit'/>").appendTo(formField);

		}

		function displayAddBooksForm(data_objects) {
			var dataDict = {};
			var formField = $("#addbooks");
			var fieldNames = ["copies","Rentable Days"];
			for (var title in data_objects) {
				var name = title + " (Edition - " + data_objects[title]["edition"] + ")";
				$("<li value='" + data_objects[title]['id'] +"'><a href='JavaScript:void(0)'>" + name +"</a></li>'").appendTo("#dropdown-titles");				
			}			
			for (var i = 0; i < fieldNames.length; i++) {
				$("<div class='form-group'><label>" + fieldNames[i] +"</label><input type='text' class='form-control field-size' name='"+ fieldNames[i].replace(/\s/g, '') +"'/></div>").appendTo(formField);
			}
			$("<input type='submit' id='submit_form' class='btn btn-primary' value='Submit'/>").appendTo(formField);

			$("#copy").click(function () {
				$("div.success").text("AddBookCopies Page");
				$( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
			})

			$("#dropdown-titles li").click(function() {
				$("#selvalue").text($(this).text());
				$("#titleval").val($(this).val());
			});
		}
	</script>

	<style>
		.field-size {
			width : 70%;
		}

		#addbookform {
			position: absolute;
			left: 15%;
			width: 40%;
		}

		#addbooksform {
			position: relative;
    		left: 15%;
    		top: 3%;
    		width: 40%;
		}

		#form-hr {
			position: relative;
			left: 10%;
			width: 70%;
		}

		#heading {
			position: relative;
			left: 10%;
		}

		.alert-box {
			padding: 15px;
		    margin-bottom: 20px;
		    border: 1px solid transparent;
		    border-radius: 4px;  
		    text-align: center;
		    left:25%;
    		width:50%;
    		position:absolute;
		}

		.success {
		    color: #3c763d;
		    background-color: #dff0d8;
		    border-color: #d6e9c6;
		    display: none;
		    font-size:20px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">Library Management System</a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav" id="links">
	      <li><a href="home">Home</a></li>
	      <li><a href="addbook">Add Book(s)</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li class="dropdown" id="user-account">
	        <a href="#" class="dropdown-toggle" id="id" data-toggle="dropdown"></a>
	        <ul class="dropdown-menu">
	          <li id="logout"><a href="javascript:void(0)">Logout</a></li>
	        </ul>
	      </li>
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</nav>
	<div class="alert-box success"></div>
	<div class="container">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a data-target="#addbookform" id="new" data-toggle="tab">AddNewBook</a></li>
			<li><a data-target="#addbooksform" id="copy" data-toggle="tab">Addcopies</a></li>
		</ul>
		<div class="tab-content">
			<div class="form-position tab-pane active" id="addbookform">
				<div id="heading"><h2>Add New Book</h2></div>
				<form role="form" id="form-hr" action="Home/upload" method="post" enctype="multipart/form-data">
				</form>
			</div>

			<div class="form-position tab-pane" id="addbooksform">
				<div id="heading1"><h2>Add Books / Copies</h2></div>
				<form role="form" id="addbooks" action="Home/addBooks" method="post" enctype="multipart/form-data">
					<input type="hidden" id="titleval" name="title" value=""/>
					<div class="form-group">
						<label>Title</label><br>
						<div class="btn-group">
			                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			                   <span data-bind="label" id="selvalue" name="title">Select One</span>&nbsp;<span class="caret"></span>
			                 </button>
			                 <ul class="dropdown-menu" id="dropdown-titles" role="menu">
			                 	<li><a href="javascript:void(0)">Select One</a></li>
			                 </ul>
			            </div>
		        	</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
