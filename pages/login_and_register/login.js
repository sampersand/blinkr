function successful_login(){
	window.location.href = "./pages/main.php";

}
function invalid_login(){
	// $( "#login-form > input" ).addClass( "invalid" );
	$( "#cred-error" ).css({display: 'block'});
}
function attemptToLogin(event) {
	event.preventDefault();
    if (event.preventDefault)
    	event.preventDefault();
	var eles = document.getElementById('login-form').elements;
	$.post('./Scripts/login.php', { 'username': eles[0].value, 'password': eles[1].value}).done(
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
	window.location.href = "./pages/login_and_register/register_login_framework.php?register=1";
	// alert("register here");
}
