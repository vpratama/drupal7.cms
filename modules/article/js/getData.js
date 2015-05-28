angular.module('myApp').factory('tokenAPI', function ($http) {
  return $http.get('services/session/token', { cache: true });
});