<?php
	$this->load->library('session');
	$this->load->library('encrypt');
?>
<html>
	<html>
		<title>Details</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!--<link rel="stylesheet" href="/CI/assets/css/loginPage.css"/> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function() {
				$( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
				var username = <?php echo "'".$this->session->userdata("username")."'"; ?>;
				if (username.length > 0) {
					$("#user-account").show();
					$("#login-form").hide();
				} else {
					$("#user-account").hide();
					$("#login-form").show();
				}

				
				//var dict = JSON.parse(sessionStorage.getItem(<?php echo $this->session->userdata("id"); ?>));
				if(username.length === 0 || dict["status"] === "N/A") {
					$("input[name='borrow'").prop("disabled","true");
				} else {
					$("input[name='borrow'").prop("disabled","false");
				}
				if ($("input[name='borrow'").prop("disabled")) {

				}
				$("#title").html("<h1><?php echo $title; ?></h1>");
				$("#author").html("<h4> - <?php echo $author;?></h4>");
				$("#isbn").html("<h5>ISBN :<?php echo $isbn; ?><h5>");
				$("#edition").html("<h5>Edition : <?php echo $edition; ?></h5>");
				$("#pages").html("<h5>Pages : <?php echo $pages; ?></h5>");
				$(".book_image").html("<img src='<?php echo $image_url; ?>' style='width:100%;height:100%;'>")
				$("input[name='borrow']").attr("id",<?php echo $id; ?>);
			});
		</script>
		<style>
			.book_image {
			    position: absolute;
			    width: 20%;
			    height: 50%;
			    left: 5%;
			}

			.book_description {
				position: absolute;
			    left: 30%;
			    width: 69%;
			    height: 80%;
			}

			.alert-box {
				padding: 15px;
			    margin-bottom: 20px;
			    border: 1px solid;
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
	</html>
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
		        <a href="#" class="dropdown-toggle" id="id" data-toggle="dropdown"><?php echo "Welcome ".$this->session->userdata("username"); ?></a>
		        <ul class="dropdown-menu">
		          <li><a href="myAccount">MyAccount</a></li>
		          <li class="divider"></li>
		          <li id="logout"><a href="javascript:void(0)">Logout</a></li>
		        </ul>
		      </li>
		    </ul>
		  </div><!-- /.navbar-collapse -->
		  <div class="alert-box success">BookDetails Page</div>
		</nav>
		<div class="container">
			<div class="book_image">
			</div>
			<div class="book_description">
				<span id="title"></span>
				<span id="author"></span><br>
				<span id="details">
					<ul><h4><strong><u>Details</u></strong></h4>
						<li><p id="isbn"></p></li>
						<li><p id="edition"></p></li>
						<li><p id="pages"></p></li>
					</ul>
				</span><br> 
				<input type="button" id="borrow" class="btn btn-default" name="borrow" value="borrow"/>
			</div>
		</div>
	</body>
</html>