angular.module('myApp').factory('getData', function ($http) {
  return $http({
          url: "json/article",
          method: "GET",
          headers: {
            "Content-type": "application/json"
          }
        });
});