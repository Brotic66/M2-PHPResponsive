/**
 * Created by brice on 09/12/15.
 */
'use strict';

angular.module('myApp')
    .controller('mainCtrl', function ($scope, $http, $location) {

        $scope.submit = function () {

            $scope.ajaxLoader = true;

          $http
              .get('http://localhost:8000/' + $scope.terme)
              .success(function (data) {
                 $scope.rcv =  data;
                  $scope.ajaxLoader = false;
                  $(document).ready( function () {
                     $('body').find('#tableEntrants').DataTable();
                  });
              })
              .error(function (data) {
                  $scope.rcv = data;
                  $scope.ajaxLoader = false;
              });
        };
    });