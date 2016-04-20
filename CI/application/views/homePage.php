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
	<script src="assets/js/alertify.js"></script>
	<link rel="stylesheet" href="assets/js/css/alertify.css">
	<link rel="stylesheet" href="assets/js/css/themes/default.css">
	<script>
		$(document).ready(function() {
			if (sessionStorage.getItem("username") === null) {
				$("#user-account").hide();
				$("#login-form").show();
			} else {
				$("#user-account").show();
				$("#login-form").hide();
				$("#id").text("welcome " + sessionStorage.getItem("username"));
			}			
			$("#search").keyup(function() {
				var val = $(this).val();
				if (val.length > 0) {
					$.get("Booksearch/search",{data:$(this).val()}, function(data) {
						//console.log(data_objects["data"][0]["url"])
						var data_objects = eval("(" + data + ")");
						$(".books").empty();
						if (data_objects["data"].length == 0) {
							$("<span id='span-position'><p style='font-size:20px;'>No Entries Found</p><span>").appendTo(".books");
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

			$("#login").click(function () {
				var logindata = {};
				logindata["username"] = $("input[name='username']").val();
				logindata["password"] = $("input[name='password']").val();
				$.get("Login/validate",{data:logindata}, function(data){
					var data_objects = eval("(" + data + ")");
					if (data_objects["data"] === "success") {
						sessionStorage.setItem("username",logindata["username"]);
						$("#user-account").show();
						$("#login-form").hide();
						$("#id").text("welcome " + logindata["username"]);
					} else {
						alertify.alert("Notification","Invalid Credentials");
					}
				});
			});

			$("#logout").click(function () {
				sessionStorage.removeItem("username");
				window.location="search";
			});
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
		      <li><a href="search">Home</a></li>
		    </ul>
		    <div class="col-sm-3 col-md-3">
		        <form class="navbar-form" role="search">
			        <div class="input-group">
			            <input type="text" class="form-control" id="search" placeholder="Search by Title" name="search" autocomplete="off">
			        </div>
		        </form>
		    </div>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="dropdown" id="login-form">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		        	<form >
						<li><label>UserName</label></li>
						<li><input type="text" name="username" class="form-control" autocomplete="off"/></li>
						<li><label>Password</label></li>
						<li><input type="password" name="password" class="form-control" autocomplete="off"/></li>
						<li class="divider"></li>
						<li><input type="button" class="btn btn-primary" id="login" value="Login" name="submit"></li>
		        	</form>		          
		        </ul>
		      </li>
		      <li class="dropdown" id="user-account">
		        <a href="#" class="dropdown-toggle" id="id" data-toggle="dropdown"></a>
		        <ul class="dropdown-menu">
		          <li><a href="myAccount">MyAccount</a></li>
		          <li class="divider"></li>
		          <li id="logout"><a href="javascript:void(0)">Logout</a></li>
		        </ul>
		      </li>
		    </ul>
		  </div><!-- /.navbar-collapse -->
		</nav>
	<div class="container">
	    <div class="books">
	    </div>
	</div>
</body>
</html>