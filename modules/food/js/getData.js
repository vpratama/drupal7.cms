angular.module('myApp').factory('getData', function ($http) {
  return $http({
          url: "json/foods",
          method: "GET",
          headers: {
            "Content-type": "application/json"
          }
        });
});