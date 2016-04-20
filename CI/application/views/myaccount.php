<html>
	<head>

		<title>MyAccount Page</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!--<link rel="stylesheet" href="/CI/assets/css/loginPage.css"/>-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<!--<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>-->
		<script>	
			$(document).ready(function() {
				$("#id").text("welcome " + sessionStorage.getItem("username"));
				$("#search").hide();
				$("#logout").click(function(){
					sessionStorage.removeItem("username");
					window.location="search";
				});
			});
		</script>
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
		    
		</div>

	</body>
</html>