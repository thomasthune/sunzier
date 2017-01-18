Number.prototype.padLeft = function (n,str){
  return Array(n-String(this).length+1).join(str||'0')+this;
}

var sunzierApp = angular.module('sunzierApp', ['ui.bootstrap']);

sunzierApp.controller('sunzierController', function sunzierController($scope, $http) {
  $scope.cities = [
    'Kolding',
    'København'
  ];

  $scope.loading = false;

  $scope.dates = [];

  $scope.popup = {
    opened: false
  };

  $scope.dateOptions = {
    maxDate: new Date(2020, 5, 22),
    minDate: new Date(),
  };

  $scope.fetch = function() {
    var url = '/app/ajax.php?city=' + $scope.city;

    if ($scope.dt) {
      var datetime = $scope.dt.getFullYear() + '-' +($scope.dt.getMonth() +1 ).padLeft(2)  + '-' + $scope.dt.getDate();
      url += '&date=' + datetime;
    }

    $scope.loading = true;

    $http.get(url).then(function(response) {
      $scope.dates = response.data;
      $scope.loading = false;
    });
  }

  $scope.openPopup = function() {
    $scope.popup.opened = true;
  }
});
