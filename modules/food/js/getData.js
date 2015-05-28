app.service("getData",function( $http ) {
	$scope.result;
	function getScope() {
		$http.get("json/foods")
	    .success(function (response) {$scope.result = response.nodes;});
	}
	return $scope.result;
}