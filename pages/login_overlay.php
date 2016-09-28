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
	</script>
</head>

<body ng-app="login_overlay">
	<div id=login-container ng-controller="login_controller">
	<!-- <div id=login-container ng-controller="register_controller"> -->
		<span>{{ text.header }}</span>
		<span class="invalid" ng-if="text.invalid">{{ text.invalid }}</span>
		<form id=login-form ng-submit="complete()">
			<input type=email ng-model="form.email" placeholder="{{ form.defaults.email }}" ng-if="form.defaults.email" />
			<input type=username ng-model="form.username" placeholder="{{ form.defaults.username }}"/>
			<input type=password ng-model="form.password" placeholder="{{ form.defaults.password }}"/>
			<input type=password ng-model="form.confirm_password" placeholder="{{ form.defaults.confirm_password }}" ng-if="form.defaults.confirm_password" />
			<div id=login-buttons>
				<a href="javascript:void(0);" onclick="open_register_page();">{{ buttons.register }}</a>
				<input type=submit value="{{ buttons.submit }}" >
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






