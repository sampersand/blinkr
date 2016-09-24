<?php
	$isregistering = (bool)$_GET['register'];
	echo 1;
	$type = $isregistering ? 'register' : 'login';
	$instruction_text = $isregistering ? "Register for Blinkr" : "Log in to Blinkr";
	$error = "Invalid username or password!";
?>
<!DOCTYPE html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./Stylesheets/index.css" media="screen" />

	<title><?php echo $instruction_text;?></title>
	<script><?php echo include "./pages/login_and_register/$type.js";?></script>

</head>

<body >
	<?php include_once("./pages/navbar.php"); ?>

	<div id=cred-container>
		<span id=cred-text><?php echo $instruction_text?></span>
		<span id=cred-error class=error><?php echo $error;?></span>
		<form id=<?php echo $type;?>-form class=cred-form>
			<input type=username id=cred-username placeholder="Username"/>
			<input type=password id=cred-password placeholder="Password"/>
			<?php
				if($isregistering)
					echo "<input type=password id=cred-confirm-password placeholder=\"Retype Password\"/>";
			?>
			<div id=cred-submit-buttons>
				<?php
				if(!$isregistering)
					echo "<a href=\"javascript:void(0);\" id=cred-register onclick=\"open_register_page();\">Register</a>";
				?>
				<input type=submit id=cred-submit-button value=<?php echo ucwords($type);?> />
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








