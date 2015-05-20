/**
 * @file
 * Code for the ngApp module.
 */

// Global variable for the Angular module.
var $drupalApp;

(function() {
  'use strict';

  var drupalUser = ['$q', function($q) {
    return $q(function(resolve, reject) {
      resolve(Drupal.settings.ngApp.factory.drupalUser);
    });
  }];

  var drupalLocalStorage = ['$window', '$http', function($window, $http) {
    var factory = {
      flushing: false
    };

    factory.get = function(key) {
      return $window.localStorage.getItem(key);
    };

    factory.set = function(key, data) {
      var result = null;

      if (data) {
        result = $window.localStorage.setItem(key, data);
      }
      else {
        result = $window.localStorage.removeItem(key);
      }

      if (!factory.flushing) {
        if (Drupal.settings.ngApp.factory.drupalLocalStorage.save == true) {
          var storage = angular.toJson($window.localStorage);
          $http.post('ngapp/factory', storage);
        }
      }

      return result;
    };

    var init = function() {
      for (var p in Drupal.settings.ngApp.factory) {
        var value = factory.get(p);
        if (!value) {
          value = {};

          // Set the client-side UTC flush baseline to compare server-side
          // "cache last flushed" UTC to.
          if (p == 'drupalLocalStorage') {
            value.flush = new Date().getTime();
          }

          factory.set(p, JSON.stringify(value));
        }
      }
    };

    var checkFlush = function() {
      var storage = JSON.parse(factory.get('drupalLocalStorage'));

      if (Drupal.settings.ngApp.factory.drupalLocalStorage.flush) {
        var utc_server = parseInt(Drupal.settings.ngApp.factory.drupalLocalStorage.flush);
        var utc_client = parseInt(storage.flush);

        if (utc_server >= utc_client) {
          // Clear all client local storage.
          factory.flushing = true;
          for (var p in $window.localStorage) {
            factory.set(p, null);
          }

          // Re-initialize factory vars in local storage.
          init();
          factory.flushing = false;
        }
      }
    };

    init();
    checkFlush();

    return factory;
  }];

  var drupalInterceptor = function() {
    this.$get = ['$q', function($q) {
      var provider = {};

      // This will happen on all HTTP requests (see module config below).
      provider.request = function(config) {
        return config;
      };

      // Forces Angular to stop processing if it received bad HTTP response.
      provider.responseError = function(response) {
        return $q.reject(response);
      };

      return provider;
    }];
  };

  var drupalServices = ['$http', '$q', function($http, $q) {
    var factory = {};
    if (!Drupal.settings.ngApp.services) {
      return factory;
    }

    // Set magic methods for each exposed Services resource.
    // @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Function/bind
    var stub = {
      obj: null,
      get: function(arg) {
        var meta = this.obj;

        var path = [
          meta.path,
          arg
        ];

        path = path.join('/');

        var headers = {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        };

        if (Drupal.settings.ngApp.services.tokens[meta.source]) {
          headers['X-CSRF-Token'] = Drupal.settings.ngApp.services.tokens[meta.source];
        }

        return $http({
            method: 'GET',
            headers: headers,
            url: path
          })
          .then(function(result) {
            // Note: output of path is only for demo purposes; the request for
            // JSON is set via request header, not through the ".json"
            // extension. But for the endpoint path to work as a basic link
            // in the browser we're doing this:
            if (meta.source == 'restws') {
              path = path.replace('/', '.json');
            }

            return {
              path: path,
              data: result.data
            };
          });
      }
    };

    for (var key in Drupal.settings.ngApp.services.resources.GET) {
      factory[key] = stub.get.bind({
        obj: Drupal.settings.ngApp.services.resources.GET[key]
      });
    }

    factory.help = function() {
      return stub.get.bind({
        obj: {
          path: 'ngapp/help',
          source: 'ngapp'
        }
      })()
      .then(function(result) {
        return result.data.services;
      });
    };

    factory.context = function() {
      return stub.get.bind({
        obj: {
          path: 'ngapp/context?path=' + document.location.pathname,
          source: 'ngapp'
        }
      })()
      .then(function(result) {
        return result.data;
      });
    };

    return factory;
  }];

  // Initialize the global Angular module.
  $drupalApp = angular
    .module(Drupal.settings.ngApp.name, [
      'ngAnimate',
      'ngSanitize'
    ])
    .constant('drupalAppPath', Drupal.settings.ngApp.path)
    .provider('drupalInterceptor', drupalInterceptor)
    .config(['$httpProvider', '$compileProvider', function($httpProvider, $compileProvider) {
      $httpProvider
        .interceptors
        .push('drupalInterceptor');

      // Apply some performance boosts to versions gte 1.3.
      // @see https://keyholesoftware.com/2014/11/17/new-features-in-angularjs-1-3
      if (angular.version.major == 1 && angular.version.minor >= 3) {
        $httpProvider
          .useApplyAsync(true);

        $compileProvider
          .debugInfoEnabled(false);
      }
    }])
    .factory('drupalUser', drupalUser)
    .factory('drupalLocalStorage', drupalLocalStorage)
    .factory('drupalServices', drupalServices);
}());
