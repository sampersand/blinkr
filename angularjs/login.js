var ang = angular.module('main_module', []);

ang.controller('login_controller', ['$scope', function($scope) {
		$scope.text = {
			header: "Login to Blinkr",
			invalid: "",
			defaults: {
				default: "An error occured!",
				invalid_creds : "Invalid Username or Password!"
			}
		}

		$scope.form = {
			username: "",
			password: "",
			defaults: {
				username: "Username",
				password: "Password"
			}
		};
		$scope.buttons = {
			register: "Register",
			submit: "Login"
		}
		$scope.successful_login = function(){
			window.location.href = "pages/main.php";
		}
		$scope.complete = function(){
			$.post('scripts/login.php', { 'username': $scope.form.username, 'password': $scope.form.password}).done(
				function(result) {
					if(result === "1")
						$scope.successful_login();
					else if(result in $scope.text.defaults)
						$scope.text.invalid = $scope.text.defaults[result];
					else
						$scope.text.invalid = $scope.text.defaults.default;
				}
			);
			return false;
		}
		$scope.register = function(){
			window.location.href = window.location.href.split('?')[0] + '?' + $.param({'login':0});
		}

	}]);

ang.controller('register_controller', ['$scope', function($scope) {
		$scope.text = {
			header: "Register for Blinkr",
			invalid: "", //is default
			defaults: {
				default: "An error occured!",
				required_fields: "Fields are missing!",
				password_mismatch: "Passwords do not match!",
				username_taken: "Username already in use!",
				email_taken: "Email already in use!",
				invalid_email: "Invalid email!",
				appending: " Please try again."
			}
		}

		$scope.form = {
			username: "",
			email: "",
			password: "",
			confirm_password: "",
			defaults: {
				username: "Username",
				email: "Email",
				password: "Password",
				confirm_password: "Confirm Password"
			}
		};

		$scope.buttons = {
			submit: "Register"
		}

		function check_for_fields(){
			// if($scope.form.username.length )
		}
		$scope.successful_login = function(){
			window.location.href = window.location.href.split('?')[0] + '?' + $.param({'login':1});
		}
		$scope.complete = function(){
			//check for just length issues
			if(check_for_fields()){
				$scope.text.invalid = $scope.text.defaults.required_fields;
				return false;
			}

			$.post('scripts/register.php',
				   {'username': $scope.form.username,
					'email': $scope.form.email,
					'password': $scope.form.password,
					'confirm_password': $scope.form.confirm_password}).done(
				function(result) {
					if(result === "1")
						$scope.successful_login();
					else if(result in $scope.text.defaults)
						$scope.text.invalid = $scope.text.defaults[result];
					else
						$scope.text.invalid = $scope.text.defaults.default;
				}
			);
			return false;
		}
	}]);
