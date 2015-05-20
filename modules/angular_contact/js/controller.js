var app = angular.module('myApp', []);
app.controller('formCtrl', function($scope, $http) {
    $scope.master = {name:"John", email:"username@example.com", subject:"Subject", message:"This is Message"};
    $scope.reset = function() {
        $scope.user = angular.copy($scope.master);
    };
    $scope.reset();
    $scope.processForm = function() {
    			$http({
			        method  : 'POST',
			        url     : 'http://drupal7.cms/result',
			        data    : $.param($scope.user),  // pass in data as string
			        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			    })
			        .success(function(data) {
			            console.log(data);
			            if (!data.success) {
			            	// if not successful, bind errors to error variables
			                //$scope.errorName = data.errors.name;
			                //$scope.errorSuperhero = data.errors.superheroAlias;
			                document.write("Gagal : " + data);
			            } else {
			            	// if successful, bind success message to message
			                //$scope.message = data.message;
                            //$scope.errorName = '';
			                //$scope.errorSuperhero = '';
			                document.write("Sukses");
			            }
			            
			        });
			};
});