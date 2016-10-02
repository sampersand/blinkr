
var ang = angular.module('main_module', []);

ang.controller('navbar_controller', ['$scope', function($scope) {
		$scope.text = {
			login: "Login to Blinkr",
			user: "Me!"
		}
		$scope.login_button_pressed = function(){
			window.location.href = "/pages/login.php";
		}

	}]);

// angular.bootstrap($("#navbar"), ['navbar_module']);