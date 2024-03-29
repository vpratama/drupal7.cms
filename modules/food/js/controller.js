var app = angular.module('myApp', []);
app.controller('customersCtrl', 
  function($scope, $http, tokenAPI, getData) {
    $scope.hidden = function() {
        $scope.hideShow = !$scope.hideShow;
    }

    getData.then(function(jsonData){
      $scope.result =jsonData.data.nodes;
    });

    $scope.updatedData = function(node) {
      $http.get("service/node/"+node)
      .success(function(updatedData) {
        console.log(updatedData);
        $scope.datas = updatedData;
      }).error(function(error) {
        console.log(error);
      });
    }

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
          
          var fd = new FormData();
          fd.append("file", $scope.files);

          console.log($scope.files);

          $http({
            url: "service/node/",
            method: "POST",
            headers: {
              'Content-type': 'multipart/form-data',
              'xhrFields': {
                'withCredentials': 'true'
              },
              'Cookie': user.session_name+'='+user.sessid,
              'X-CSRF-Token' : tokens.data.token
            },
            //data: $scope.food,
            transformRequest: angular.identity,
            
            data: {
              "type" : $scope.food.type,
              "title" : $scope.food.title,  
              "field_image":{  
                  "und":{ 
                        "0": {
                          //"filename":"dessert.jpg",
                          "uri": $scope.files,
                          "filemime":"image/jpeg"
                      }
                  }
              },
              "field_price":{  
                  "und": {  
                      "0": {  
                          "value": $scope.food.field_price.und[0].value
                      }
                  }
              }  
            }
            
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


    $scope.update = function(node) {
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
            url: "service/node/"+node,
            method: "PUT",
            headers: {
              'Content-type': 'application/json',
              'xhrFields': {
                'withCredentials': 'true'
              },
              'Cookie': user.session_name+'='+user.sessid,
              'X-CSRF-Token' : tokens.data.token
            },
            data: {
              "type" : $scope.datas.type,
              "title" : $scope.datas.title,
              "body" : {
                "und": { 
                        "0": {  
                            "value": $scope.datas.body.und[0].value,
                            "format": $scope.datas.body.und[0].format
                        }
                    }
                }
            }
          })
          .success(function (data) {
            console.log(data);
          });
          
        }).error(function (error) { 
          console.log(error);
        });
     });     
    }


    $scope.delete = function(node) {
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
            url: "service/node/"+node,
            method: "DELETE",
            headers: {
              'Content-type': 'application/json',
              'xhrFields': {
                'withCredentials': 'true'
              },
              'Cookie': user.session_name+'='+user.sessid,
              'X-CSRF-Token' : tokens.data.token
            },
          })
          .success(function (data) {
            console.log(data);
          });
          
        }).error(function (error) { 
          console.log(error);
        });
     });     
    }

  }
);