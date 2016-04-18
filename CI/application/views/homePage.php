<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!--<link rel="stylesheet" href="/CI/assets/css/loginPage.css"/> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/css/HomePage.css">
	<script>
		$(document).ready(function() {
			$("#search").keyup(function() {
				var val = $(this).val();
				if (val.length > 0) {
					$.get("Booksearch/search",{data:$(this).val()}, function(data) {
						//console.log(data_objects["data"][0]["url"])
						var data_objects = eval("(" + data + ")");
						$(".books").empty();
						if (data_objects["data"].length == 0) {
						} else {							
							displayBooks(data_objects["data"]);
						}
						
					});
				} else {
					$(".books").empty();
				}
				
			});

			function displayBooks(array_data) {
				var len = array_data.length;
				var k = 0;
				for (var i = 0; i < len; i++) {
					if (i == (4+(4*k))) {
						$("<br>").appendTo(".books");
      					k = k + 1;
					}
					$("<div class='search' style='display:inline-block'><div id='image'><img src='"+ array_data[i]["url"] +"' height='100%' width = '100%'></div><div id='searchText'><p>"+ array_data[i]["title"] +"</p></div></div>").appendTo(".books");
				}
			}
		});
	</script>

	<style>
		.search {
			position: relative;
			top:20%;
			width:20%;
			height:50%;
			padding:10px;
		}

		p {
			font-family: verdana;
			font-size: 10px;
		}

		#image {
			position: relative;
			width:100%;
			height:60%;
		}

		#searchText {
			position: relative;
			width: 100%;
			height: 40%;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
	            <h1>Expandable Search Form</h1>
	        </div>
		</div>
		<div class="row">
	        <div class="col-md-4 col-md-offset-3">
	            <form action="Booksearch/search" method = "post" class="search-form">
	                <div class="form-group has-feedback">
	            		<label for="search" class="sr-only">Search</label>
	            		<input type="text" class="form-control" name="search" id="search" placeholder="search by Author,Publisher,Title" autocomplete="off">
	              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
	            	</div>
	            </form>
	        </div>
	    </div>
	    <div class="books">
	    </div>
	</div>
</body>
</html>