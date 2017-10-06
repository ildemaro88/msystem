price.controller("ControllerPrice", function ($scope, $http, getElements)
{
    $scope.pricesBusiness = function (idEmpresa) {
        var url = URL_BASE + "examenes/price/business/" + idEmpresa
        getElements.getQuery(url).then(function (data) {
            if (data) {
                $scope.prices = data;
                angular.forEach($scope.prices, function (value, key) {
                    //console.log($scope.formData.priceEdit[key])
                    $scope.formData.priceExamen[key] = value;
                    $scope.formData.priceEdit[key] = true;
                    //console.log($scope.formData.priceEdit[key]);
                    //console.log($scope.formData.priceExamen[key]);
                });
            }
        });
    }
    $scope.getPricesSpecialties = function (idEmpresa) {
        var url = URL_BASE + "examenes/price/specialties/" + idEmpresa
        getElements.getQuery(url).then(function (data) {
            if (data) {
                $scope.pricesSpecialties = data;
                angular.forEach($scope.pricesSpecialties, function (value, key) {
                    $scope.formDataSpecialty.priceSpecialty[key] = value;
                    $scope.formDataSpecialty.priceEdit[key] = true;
                });
            }
        });
    }
    //Elementos examenes
    $scope.mesElements = function () {
        var url = URL_BASE + "examenes/price/elements"
        getElements.getQuery(url).then(function (data) {
            if (data.length > 0) {
                $scope.elements = data;
            }
        });
    }

    //Especialidades
    $scope.mesSpecialties = function () {
        var url = URL_BASE + "examenes/price/specialties"
        getElements.getQuery(url).then(function (data) {
            if (data.length > 0) {
                $scope.specialties = data;
            }
        });
    }

    $scope.init = function ()
    {
        $scope.idEmpresa = idEmpresa;
        $scope.elements = [];
        $scope.specialties = [];
        $scope.showSearch = {};
        $scope.showSearchSpecialty = true;
        $scope.formData = {
            priceExamen: {},
            priceEdit: {}
        };
        $scope.formDataSpecialty = {
            priceSpecialty: {},
            priceEdit: {}
        };
        $scope.searchExamen = {};
        $scope.pricesBusiness($scope.idEmpresa);
        $scope.getPricesSpecialties($scope.idEmpresa);
        $scope.mesElements();
        $scope.mesSpecialties();
    };

    //Ejecuto la funcion anterior init()

    $scope.init();


    /*Envio del formulario */
    $scope.submitForm = function (e, formData, idExamen, idEmpresa) {

        if (formData.priceEdit[idExamen]) {
            var url = URL_BASE + "examenes/price/send/udate/" + idEmpresa
            var method = "PUT";
        } else {
            var method = "POST";
            var url = URL_BASE + "examenes/price/add/save/" + idEmpresa
        }
        var data = {"idExamen": idExamen, "price": formData.priceExamen[idExamen]}
        e.preventDefault();
        swal({
            html: true,
            title: "Espere...",
            text: '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>',
            showConfirmButton: false,
            timer: 1000,
        },
                function () {

                    $http({
                        url: url,
                        method: method,
                        data: data,
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(function (data) {
                        if (data.data) {
                            swal({
                                title: "Correcto!",
                                text: 'Realizado con éxito!',
                                type: "success",
                                showConfirmButton: true,
                                closeOnConfirm: true
                            });
                        } else if (data.status == 500) {
                            swal("Error!", "Contacte al administrador!", "error");
                        } else {
                            swal("Error!", "Error en la transacción!", "error");
                        }
                    });
                });
    };
    /*cierre del envio del formulario*/

    /*Envio del formulario Specialty*/
    $scope.submitFormSpecialty = function (e, formDataSpecialty, idSpecialty, idEmpresa) {

        if (formDataSpecialty.priceEdit[idSpecialty]) {
            var url = URL_BASE + "specialty/price/send/udate/" + idEmpresa
            var method = "PUT";
        } else {
            var method = "POST";
            var url = URL_BASE + "specialty/price/add/save/" + idEmpresa
        }
        var data = {"idSpecialty": idSpecialty, "price": formDataSpecialty.priceSpecialty[idSpecialty]}
        e.preventDefault();
        swal({
            html: true,
            title: "Espere...",
            text: '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>',
            showConfirmButton: false,
            timer: 1000,
        },
                function () {
                    $http({
                        url: url,
                        method: method,
                        data: data,
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(function (data) {
                        if (data.data) {
                            swal({
                                title: "Correcto!",
                                text: 'Realizado con éxito!',
                                type: "success",
                                showConfirmButton: true,
                                closeOnConfirm: true
                            });
                        } else if (data.status == 500) {
                            swal("Error!", "Contacte al administrador!", "error");
                        } else {
                            swal("Error!", "Error en la transacción!", "error");
                        }
                    });
                });
    };
    /*cierre del envio del formulario*/
    $scope.activeSearch = function (idCategory) {

        if ($scope.showSearch[idCategory]) {
            $scope.showSearch[idCategory] = false;
            $("#filter_" + idCategory).hide();
            $scope.searchExamen[idCategory] = "";
        } else {
            $scope.showSearch[idCategory] = true;
            $("#filter_" + idCategory).show();
        }
    };
    
    $scope.activeSearchSpecialty = function () {
        if ($scope.showSearchSpecialty) {
            $scope.showSearchSpecialty = false;
            $("#filter_specialty").hide();
            $scope.searchSpecialty = "";
        } else {
            $scope.showSearchSpecialty = true;
            $("#filter_specialty").show();
        }
    };
});
