var app = angular.module('myapp',[]);

app.controller('ctrl',function($scope) {
   $scope.name = "Aman";
});

app.controller('theme_ctrl',function ($scope) {
    $scope.theme = "dark";
    $scope.change = function () {
        $scope.theme = "light";

    };
});