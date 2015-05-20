var app = angular.module('myApp', []);
app.controller('customersCtrl', 
  function($scope, $http) {
  	$scope.hideShow = false;
    $scope.toggle = function() {
        $scope.hideShow = !$scope.hideShow;
    }
    $http.get("json/foods")
    .success(function (response) {$scope.result = response.nodes;});
  }
);