<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheets/login_overlay.css" media="screen" />
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
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
<script>
		ang.module('login_overlay_app', [])
			.controller('login_controller', ['$scope', function($scope) {
				$scope.login_text = "hai";
				$scope.invalid_credentials = "";
				$scope.username_input = "";
				}]);
</script>
<body ng-app="login_overlay_app">
	<div id=login-container ng-controller="login_controller">
		<span> {{ login_text }}</span>
		<span class="invalid" ng-if="invalid_credentials"> {{ invalid_credentials }}</span>
		<form id=login-form>
			<input type=username ng-model="username_input" placeholder="Username"/>
			<input type=password ng-model="password_input" placeholder="Password"/>
			<div id=login-buttons>
				<a href="javascript:void(0);" id=login-register onclick="open_register_page();">Register</a>
				<input type=submit id=login-button value="Log in" >
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
</body>