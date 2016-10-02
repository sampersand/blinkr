<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="/angularjs/navbar.js"></script>
<link rel="stylesheet" type="text/css" href="/stylesheets/navbar.css" media="screen" />

<!-- <body ng-app=main_module> -->
	<div id=navbar ng-controller=navbar_controller>
		<span id=navbar-blinkr-name>Blinkr</span>
		<button ng-click="login_button_pressed()" ng-if=text.login>{{ text.login }}</button>
	</div>
<!-- </body> -->
