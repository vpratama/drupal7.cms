var app = angular.module('myApp', []);
app.controller('customersCtrl', 
  function($scope, $http, tokenAPI) {
    
    $scope.hidden = function() {
        $scope.hideShow = !$scope.hideShow;
    }
    $http.get("json/article")
    .success(function (response) {$scope.result = response.nodes;});

    /*
    function readCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
      }
      return null;
    }
    */
    
    $scope.submit = function() {
      tokenAPI.then(function(tokens){
        //var token = "jRXIbjdBbNjJ0vFtarkV9grdUNi-sLbIMzIvCkullAk";
        //var token = tokens.data;
         console.log(tokens.data);
         $http({
          url: "service/system/connect",
          method: "POST",
          headers: {
            "Content-type": "application/json",
            "X-CSRF-Token": tokens.data.token
          }
          /*
          data: {
            "username":"admin",
            "password":"admin"
          }*/
        })
        .success(function (user) { 
          //document.cookie = "drupal_session_name="+user.session_name+";";
          //document.cookie = "drupal_session_id="+user.sessid+";";
          //console.log(document.cookie);
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
            $scope.apply();
          });
          
        }).error(function (error) { 
          console.log(error);
        });
     });     
    }

    //reLogin();
    
    /*
    $scope.submit = function() {
    $http({
      url: "http://drupal7.cms/service/node/",
      method: "POST",
      headers: {
        'Content-type': 'application/json',
        'Cookie': 'SESS1181d23a1b5fd2dfd5dea69e58e1cf65=UU21sgdoq-PDmdr-fHV1fRuhQ1gYOe7VbgrrqT7SLR4',
        'X-CSRF-Token' : getToken()
      },
      data: $scope.article
    })
    .success(function (response) {$scope.post = response;});
   }
   */
  }
);