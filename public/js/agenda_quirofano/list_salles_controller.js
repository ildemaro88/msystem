agenda.controller("CtrlAppSalles", function ($scope, $http, $window, $timeout, $q, getElements) {

    var url = URL_BASE + "quirofano/agenda/get/salles";
    getElements.getQuery(url).then(function (data) {

        if (data.length > 0) {
            $scope.salles = data;
        } else {
            $scope.salles = [];
        }
    });

});




