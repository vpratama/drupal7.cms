var app = angular.module('myApp', []);
app.controller('customersCtrl', 
  function($scope, $http) {
  	$scope.hidden = function() {
        $scope.hideShow = !$scope.hideShow;
    }
    $http.get("json/foods")
    .success(function (response) {$scope.result = response.nodes;});

    $scope.submit = function() {
      tokenAPI.then(function(tokens){
        console.log(tokens.data);
         $http({
          url: "service/system/connect",
          method: "POST",
          headers: {
            "Content-type": "application/json",
            "X-CSRF-Token": tokens.data.token
          }
        })
        .success(function (user) { 
          console.log(user.session_name+'='+user.sessid);
          
          $http({
            url: "service/node/",
            method: "POST",
            headers: {
              'Content-type': 'application/json',
              'xhrFields': {
                'withCredentials': 'true'
              },
              'Cookie': user.session_name+'='+user.sessid,
              'X-CSRF-Token' : tokens.data.token
            },
            data: $scope.article
            /*
            data: {
              "type" : "article",
              "title" : "testing sukses gan tapi ada security errornya ahahahaha",
              "body" : {
                "und": { 
                        "0": {  
                            "value":"loren ipsum dolor sit amet",
                            "format": "filtered_html"
                        }
                    }
                }
            }
            */
          })
          .success(function (data) {
            console.log(data);
            $scope.hideShow = true;
            //$location.absUrl(data.uri);
          });
          
        }).error(function (error) { 
          console.log(error);
        });
     });     
    }
    
  }
);