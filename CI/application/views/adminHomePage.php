<html>
<head>
	<title>Admin HomePage</title>
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

	<style>
		@import url('//netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap-combined.min.css');
		#myCarousel {
			position: absolute;
		    margin-top: 40px;
		    width: 50%;
		    top: 20%;
		    box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.2);
		    height: 60%;
		    left: 25%;
		}

		.carousel-linked-nav,
		.item img {
		  display: block; 
		  margin: 0 auto;
		}

		.carousel-linked-nav {
		  width: 120px;
		  margin-bottom: 20px;   
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

	<script>
		$(document).ready(function() {
			$( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
			$(".carousel-control").css("top","50%");
			$(".carousel-control").fadeOut();
			$('#myCarousel').carousel({
			  interval: 3000
			});
			if (sessionStorage.getItem("username") === null) {
				$("#add").hide();
			} else {
				$("#id").text("welcome admin");
				$("#login-form").hide();
			}
			$("#login").click(function () {
				var logindata = {};
				logindata["username"] = $("input[name='username']").val();
				logindata["password"] = $("input[name='password']").val();
				if (logindata["username"] == "admin" && logindata["password"] === "admin") {
					$("#user-account").show();
					$("#login-form").hide();
					$("#id").text("welcome " + logindata["username"]);
					sessionStorage.setItem("username","admin");
					$("#add").show();
				} else {
					alertify.alert("Notification","Invalid Credentials");
				}
			});

			$("#logout").click(function() {
				sessionStorage.removeItem("username");
				window.location="home";
			});

			$("#myCarousel").hover(function(){
				$(".carousel-control").fadeToggle();
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
	      <li><a href="home">Home</a></li>
	      <li id="add"><a href="addbook">Add Book(s)</a></li>
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
	        <a href="#" class="dropdown-toggle" id="id" data-toggle="dropdown"></a>
	        <ul class="dropdown-menu">
	          <li id="logout"><a href="javascript:void(0)">Logout</a></li>
	        </ul>
	      </li>
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</nav>
	<div class="alert-box success">Demo on Adding a book and finding</div>
	<div class="container">
		<div id="myCarousel" class="carousel slide">
		  <!-- Carousel items -->
		  <div class="carousel-inner">
		    <div class="active item">
		        <img src="images/libqualwordle.jpg" style="width:100%;height:100%" />
		    </div>
		    <div class="item">
		        <img src="images/library-reading-poster-designed-your-school-kindergarten-children-53067145.jpg" style="width:100%;height:100%;" />
		    </div>
		    <div class="item">
		        <img src="images/events-lake-county-public-library-indiana.png" style="width:100%;height:100%" />
		    </div>
		  </div>
		  <!-- Carousel nav -->
		  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
	</div>
</body>
</html>