var app = angular.module('hideApp', []);
app.controller('hideShowCtrl', function($scope) {
    $scope.hideShow = false;
    $scope.toggle = function() {
        $scope.hideShow = !$scope.hideShow;
    }
});