<html>
	<head>
		<title>Form Page</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<script type="text/javascript">
			$(document).ready(function () {
				$("#inputPassword3").focusout(function () {
					var password = $(this).val();
					var msg = [];
					if (password.length < 8) {
						msg.push("your password must contain atleast 8 characters");
					}
					if (password.search(/[0-9]/) < 0) {
						msg.push("your password must contain number");
					}
					if (password.search(/[a-z]/) < 0) {
						msg.push("your password must contain alphabet");
					}
					if (msg.length > 0) {
						$(this).css("border-color","red");
						var messg = msg.join("\n");
						alertmsg(messg);						
						$(this).focus();
					} else {
						$(this).css("border-color","");
					}

				});

				function alertmsg(messg) {
					$("#snoAlertBox").text(messg);
					$("#snoAlertBox").fadeIn();
					$("#snoAlertBox").fadeOut(3000)
				}
			});
		</script>

		<style>
			#snoAlertBox{
			    position:absolute;
			    z-index:1400;
			   	top:2%;
			    right:4%;
			    margin:0px auto;
				text-align:center;
			    display:none;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<!-- alert message -->
			<?php if (strlen($msg) > 0) { echo '<div id="snoAlertBox" class="alert alert-success" data-alert="alert">'.$msg.'</div>';} else { echo '<div id="snoAlertBox" class="alert alert-success" data-alert="alert"></div>'; } ?> 

			<form class="form-horizontal" method="post" action="BookController/CreateUser">
			  <div class="form-group">
			    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" name="uname" id="inputUsername" placeholder="UserName">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-3">
			      <input type="password" class="form-control" name="pass" id="inputPassword3" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputfname" class="col-sm-2 control-label">first name</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" name="fname" id="inputfname" placeholder="first name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputlname" class="col-sm-2 control-label">last name</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" name="lname" id="inputlname" placeholder="last name">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Sign Up</button>
			    </div>
			  </div>
			</form>
		</div>
	</body>
</html>