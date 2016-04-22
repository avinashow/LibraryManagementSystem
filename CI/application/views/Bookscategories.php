<?php
	$this->load->library('session');
	$this->load->library('encrypt');
	session_start();
?>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="http://www.bootply.com/beautifier.js"></script>
	<!--<link rel="stylesheet" href="/CI/assets/css/loginPage.css"/> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- materialize script for sidebar navigation-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.rawgit.com/IronSummitMedia/startbootstrap-simple-sidebar/gh-pages/css/simple-sidebar.css">
	<link rel="stylesheet" href="assets/css/HomePage.css">
	<script src="assets/js/alertify.js"></script>
	<link rel="stylesheet" href="assets/js/css/alertify.css">
	<link rel="stylesheet" href="assets/js/css/themes/default.css">
	<script>
		$(document).ready(function() {			
			$("#login").click(function () {
				var logindata = {};
				logindata["username"] = $("input[name='username']").val();
				logindata["password"] = $("input[name='password']").val();
				$.get("Login/validate",{data:logindata}, function(data){
					var data_objects = eval("(" + data + ")");
					if (data_objects["data"] === "success") {
						$("#user-account").show();
						$("#login-form").hide();
					} else {
						alertify.alert("Notification","Invalid Credentials");
					}
				});
			});

			$("#logout").click(function () {
				$.post("Logout/signout","",function(data){
				});
				window.location="search";
			});
		});
	</script>
	<style>
		.container {
			position: relative;
			top:0%;
			width: 100%;
			height: 88%;
			
		}

		.sidebar-menu {
			box-shadow: 2px 1px 3px 2px rgba(0, 0, 0, 0.2);
		    position: relative;
		    top: 2%;
		    left: 2%;
		    width: 20%;
		    height: 88%;
		    background-color:#e7e7e7;
		}

		.sidebar-results {
		    position: absolute;
		    left: 23%;
		    top: 2%;
		    height: 88%;
		    width: 77%;
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
		      <li><a href="allbooks">Books by Categories</a></li>
		    </ul>
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
		<div class="sidebar-menu">
			<div id="sidebar-wrapper side-color">
	            <ul class="sidebar-nav">
	                <li class="sidebar-brand">
	                        <u>Category</u>
	                </li>
	                <li>
	                    <a href="#"><b>Accounting</b></a>
	                </li>
	                <li>
	                    <a href="#">Economics</a>
	                </li>
	                <li>
	                    <a href="#">Programming</a>
	                </li>
	                <li>
	                    <a href="#" data-toggle="collapse" data-target="#sub1">Natural Sciences<span class="glyphicon glyphicon-triangle-bottom"></span></a>
	                    <ul class="nav collapse" id="sub1">
	                    	<li>
	                    		<a href="#">dichik</a>
	                    	</li>
	                    </ul>
	                </li>
	                <li>
	                    <a href="#">Languages</a>
	                </li>
	            </ul>
	        </div>
		</div>
		<div class="sidebar-results">
		</div>
	</div>
</body>
</html>