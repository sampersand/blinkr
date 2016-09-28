var ang = angular.module('login_overlay', []);

ang.controller('login_controller', ['$scope', function($scope) {
		$scope.header_text = "Login to Blinkr";
		$scope.invalid_credentials = "Invalid username or password!"; //is default


		$scope.user = {
			username = "";
			password = "";
		}
		$scope.user_defaults = {
			username = "Username";
			password = "Password";
		}
		$scope.register_link_text = "Register";
		$scope.confirm_button_text = "Login";

		$scope.register = function(){
			alert("i was registered!");
		}
	}]);

ang.controller('register_controller', ['$scope', function($scope) {
		$scope.header_text = "Register for Blinkr";
		$scope.invalid_credentials = ""; //has no default

		$scope.user = {
			email = "";
			username = "";
			password = "";
			confirm_password = "";
		}
		$scope.defaults_user = {
			email = "user@example.com";
			username = "Username";
			password = "Password";
			confirm_password = "Confirm Password";			
		}
		$scope.confirm_button_text = "Sign up";
	}]);
