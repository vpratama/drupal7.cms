(function(angular) {
  var app = angular.module("contact", []);

  app.controller("contactForm", ['$scope', '$http', function($scope, $http) {
    $scope.success = false;
    $scope.error = false;

    $scope.sendMessage = function( input ) {
      input.submit = true;
      $http({
          method: 'POST',
          url: 'processForm.php',
          data: angular.element.param(input),
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
      })
      .success( function(data) {
        if ( data.success ) {
          $scope.success = true;
        } else {
          $scope.error = true;
        }
      } );
    }
  }]);
})(angular);