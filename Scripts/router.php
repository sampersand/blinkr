<!-- Note this is not being used atm -->
<?php
function should_goto($uri){
	// return is_file('.' . $uri) and $uri != $_SERVER['PHP_SELF'];
}
$requested_uri = $_SERVER['REQUEST_URI'];
$default_page = 'login.html';

if(should_goto($requested_uri))
	return require $requested_uri;
return require $default_page;

?>