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
				displayForm(data_objects);
			});
		}

		function displayForm(data_objects) {
			//alert(data_objects["authors"][0]);
			var formField = $("#form-hr");
			var fieldNames = ["Title","Publisher","Author","Category","Pages"];
			for (var i = 0; i < fieldNames.length; i++) {
				$("<div class='form-group'><label>" + fieldNames[i] +"</label><input type='text' class='form-control field-size' name='"+ fieldNames[i] +"'/></div>").appendTo(formField);
			}
			$("<div class='form-group'><label>Upload Image</label><input type='file' name='fileToUpload' id='fileToUpload'/></div>").appendTo(formField);
			$("<input type='submit' id='submit_form' class='btn btn-primary' value='Submit'/>").appendTo(formField);
		}
	</script>

	<style>
		.field-size {
			width : 70%;
		}

		.form-position {
			position: absolute;;
			left: 30%;
			width: 40%;
		}

		#form-hr {
			position: relative;
			left: 10%;
			width: 70%;
		}
	</style>
</head>
<body>
	<div class="form-position">
		<form role="form" id="form-hr" action="home/upload" method="post" enctype="multipart/form-data">
		</form>
	</div>
</body>
</html>