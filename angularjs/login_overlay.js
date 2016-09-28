var ang = angular.module('login_overlay', []);

ang.controller('login_controller', ['$scope', function($scope) {
		$scope.text = {
			header : "Login to Blinkr",
			invalid : "",
			default_invalid : "An error occured!"
		}

		$scope.form = {
			username : "",
			password : "",
			defaults : {
				username : "Username",
				password : "Password"
			}
		};
		$scope.buttons = {
			register : "Register",
			submit : "Login"
		}

		$scope.complete = function(){
			$.post('Scripts/login.php', { 'username': $scope.form.username, 'password': $scope.form.password}).done(
				function(result) {
					alert(result);
					if(result.indexOf("SAFE:") === -1){
						$scope.text.invalid = $scope.text.default_invalid;
					}
					else{
						result = result.substring(result.indexOf("SAFE:"));
						alert(result);
						if(result === '1') //aka, continue with the login
							successful_login();
						else
							$scope.text.invalid = result;
					}
				}
			);
			return false;
		}
		function open_register_page(){
			window.location.href = "register_window.php";
		}


	}]);

ang.controller('register_controller', ['$scope', function($scope) {
		$scope.text = {
			header : "Register for Blinkr",
			invalid : "" //is default
		}

		$scope.user = {
			email : "",
			username : "",
			password : "",
			confirm_password : "",
			defaults : {
				email : "Email",
				username : "Username",
				password : "Password",
				confirm_password : "Confirm Password"
			}
		};

		$scope.buttons = {
			submit : "Register"
		}

		$scope.complete = function(){
			alert("i was registered!");
		}
	}]);
