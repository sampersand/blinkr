<!DOCTYPE html>
<head>

	<link rel="stylesheet" type="text/css" href="/stylesheets/login.css" media="screen" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script src="/angularjs/login.js"></script>

	<?php
		$controller_type = array_key_exists('login', $_GET) && !$_GET['login'] ? 'register' : 'login';
		$controller_type .= "_controller";
	?>
</head>

<body ng-app=main_module>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/pages/navbar.php'; ?>
<?php echo $controller_type ?>
<!-- <?php echo "<div id=login-container ng-controller=$controller_type> "; ?> -->
	<div id=login-container ng-controller=login_controller >
		<title>{{ text.header }}</title>
		<span>{{ text.header }}</span>
		<span class="invalid" ng-if="text.invalid">{{ text.invalid }}</span>
		<form id=login-form ng-submit="complete()">
			<input type=username ng-model="form.username" placeholder="{{ form.defaults.username }}"/>
			<input type=email ng-model="form.email" placeholder="{{ form.defaults.email }}" ng-if="form.defaults.email" />
			<input type=password ng-model="form.password" placeholder="{{ form.defaults.password }}"/>
			<input type=password ng-model="form.confirm_password" placeholder="{{ form.defaults.confirm_password }}" ng-if="form.defaults.confirm_password" />
			<div id=login-buttons>
				<a href="javascript:void(0);" ng-click="register()">{{ buttons.register }}</a>
				<input type=submit value="{{ buttons.submit }}" >
			</div>
		</form>
	</div>
</body>