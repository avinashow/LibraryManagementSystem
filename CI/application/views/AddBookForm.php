<html>
<head>
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
			$.get('Home/getOptions','',function(data) {
				var data_objects = eval("(" + data + ")");
				displayAddBookForm();
				displayAddBooksForm(data_objects["data"]);
			});
		}

		function displayAddBookForm() {
			//alert(data_objects["authors"][0]);
			var formField = $("#form-hr");
			var fieldNames = ["Title","Publisher","Author","Category","Pages"];
			for (var i = 0; i < fieldNames.length; i++) {
				$("<div class='form-group'><label>" + fieldNames[i] +"</label><input type='text' class='form-control field-size' name='"+ fieldNames[i] +"'/></div>").appendTo(formField);
			}
			$("<div class='form-group'><label>Upload Image</label><input type='file' name='fileToUpload' id='fileToUpload'/></div>").appendTo(formField);
			$("<input type='submit' id='submit_form' class='btn btn-primary' value='Submit'/>").appendTo(formField);
		}

		function displayAddBooksForm(data_objects) {
			var dataDict = {};
			var formField = $("#addbooks");
			var fieldNames = ["ISBN","Edition","Rentable Days"];
			if (data_objects.length > 0) {
				for (var i = 0;i < data_objects.length; i++) {
					for (var key in data_objects[i]) {
						dataDict[key] = data_objects[i][key];
						$("<li value='" + data_objects[i][key] +"'><a href='JavaScript:void(0)'>" + key +"</a></li>'").appendTo(".dropdown-menu");
					}				
				}
			}
			
			for (var i = 0; i < fieldNames.length; i++) {
				$("<div class='form-group'><label>" + fieldNames[i] +"</label><input type='text' class='form-control field-size' name='"+ fieldNames[i].replace(/\s/g, '') +"'/></div>").appendTo(formField);
			}
			$("<input type='submit' id='submit_form' class='btn btn-primary' value='Submit'/>").appendTo(formField);

			$(".btn-group li").click(function() {
				$("#selvalue").text($(this).text());
				$("#dichik").val(dataDict[$(this).text()]);
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
    		left: 60%;
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
	</style>
</head>
<body>
	<div class="form-position" id="addbookform">
		<div id="heading"><h1>Add New Book</h1></div>
		<form role="form" id="form-hr" action="Home/upload" method="post" enctype="multipart/form-data">
		</form>
	</div>

	<div claa="form-position" id="addbooksform">
		<div id="heading1"><h1>Add Books / Copies</h1></div>
		<form role="form" id="addbooks" action="Home/addBooks" method="post" enctype="multipart/form-data">
			<input type="hidden" id="dichik" name="title" value=""/>
			<div class="form-group">
				<label>Title</label><br>
				<div class="btn-group">
	                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	                   <span data-bind="label" id="selvalue" name="title">Select One</span>&nbsp;<span class="caret"></span>
	                 </button>
	                 <ul class="dropdown-menu" role="menu">
	                 	<li><a href="javascript:void(0)">Select One</a></li>
	                 </ul>
	            </div>
        	</div>
		</form>
	</div>
</body>
</html>