angular.module('myApp').factory('tokenAPI', function ($http) {
  return $http({
          url: "service/user/token",
          method: "POST",
          headers: {
            "Content-type": "application/json"
          }
        });
});