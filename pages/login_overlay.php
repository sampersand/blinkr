<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheets/login_overlay.css" media="screen" />
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script src="angularjs/login_overlay.js"></script>
	<script>
		// angular
		// end angular
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
			window.location.href = "register_window.php";
		}
	</script>
</head>

<body ng-app="login_overlay">
	<div id=login-container ng-controller="login_controller as this">
	<!-- <div id=login-container ng-controller="register_controller"> -->
		<span>{{ header_text }}</span>
		<span class="invalid">{{ invalid_credentials }}</span>
		<form id=login-form>
			<input type=username ng-model="user.username_input" placeholder="{{ this.user_defaults.username }}"/>
			<input type=password ng-model="password_input" placeholder="{{ default_password }}"/>
			<input type=password ng-model="password_confirm_input" placeholder="{{ default_confirm_password }}" ng-if="default_confirm_password" />
			<div id=login-buttons>
				<a href="javascript:void(0);" onclick="open_register_page();">{{ register_link_text }}</a>
				<input type=submit value="{{ confirm_button_text }}" >
			</div>
		</form>
	</div>
<!-- 	<script>
		var form = document.getElementById('login-form');
		if (form.attachEvent)
			form.attachEvent("submit", attemptToLogin);
		else 
			form.addEventListener("submit", attemptToLogin);
	</script> -->
</body>






