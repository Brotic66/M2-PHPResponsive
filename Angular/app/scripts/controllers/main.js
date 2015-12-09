/**
 * Created by brice on 09/12/15.
 */
'use strict';

angular.module('myApp')
    .controller('mainCtrl', function ($scope, $http, $location) {

        $scope.submit = function () {

          $http
              .post('http://localhost:8000/', $scope.terme)
              .success(function (data) {
                 $scope.rcv =  data;
              })
              .error(function (data) {
                  $scope.rcv = data;
              });
        };
    });