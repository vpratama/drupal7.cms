var app = angular.module('myApp', []);
app.controller('customersCtrl', 
  function($scope, $http) {
    $http.get("http://drupal7.cms/json/article")
    .success(function (response) {$scope.result = response.nodes;});
  }
);