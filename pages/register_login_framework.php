<?
	$isregistering = FALSE;
?>
<!DOCTYPE html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Stylesheets/index.css" media="screen" />

	<title><?php echo $isregistering ? "Register for Blinkr" : "Log in to Blinkr"?></title>
	<script>
		function successful_login(){
			window.location.href = "pages/main.php";

		}
		function invalid_login(){
			// $( "#login-form > input" ).addClass( "invalid" );
			$( "#login-invalid-credentials" ).css({display: 'block'});
		}
		function attemptToLogin(event) {
			event.preventDefault();
		    if (event.preventDefault)
		    	event.preventDefault();
			var eles = document.getElementById('login-form').elements;
			$.post('Scripts/login.php', { 'username': eles[0].value, 'password': eles[1].value}).done(
				function(result) {
					if(result == 1){ //aka, continue with the login
						successful_login();
					} else {
						invalid_login();
					}
			});
			return false;
		}
		function open_register_page(){
			alert("register here");
		}


	</script>
</head>


<body >
	<?php include_once("./pages/navbar.php"); ?>
	<div id=login-container >
		<span id=login-text>Log in to Blinkr</span>
		<span id=login-invalid-credentials class=invalid>Invalid username or password!</span>
		<form id=login-form>
			<input type=username id=login-form-username placeholder="Username"/>
			<input type=password id=login-form-password placeholder="Password"/>
			<div id=login-form-login-buttons>
				<a href="javascript:void(0);" id=login-form-register-link onclick="open_register_page();">Register</a>
				<!-- <input type=button id=login-form-register-button onclick="open_register_page();" value="Register"> -->
				<input type=submit id=login-form-login-button value="Log in" >
				<!-- <input type=submit id=login-form-login-button value="Log in" > -->
			</div>
		</form>
		<script>
			var form = document.getElementById('login-form');
			if (form.attachEvent)
			    form.attachEvent("submit", attemptToLogin);
			else 
				form.addEventListener("submit", attemptToLogin);
		</script>
	</div>
</div>
</body>








