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
                    $scope.formData.priceClass[key] = "btn-warning";
                    //console.log($scope.formData.priceEdit[key]);
                    //console.log($scope.formData.priceExamen[key]);
                });
            }
        });
    }

    //Como inician los campos
    $scope.mesElements = function () {
        var url = URL_BASE + "examenes/price/elements"
        getElements.getQuery(url).then(function (data) {
            if (data.length > 0) {
                $scope.elements = data;
            }
        });
    }

    $scope.init = function ()
    {
        $scope.idEmpresa = idEmpresa;
        $scope.elements = {};
        $scope.formData = {
            priceExamen: {},
            priceEdit: {},
            priceClass: {}
        };
        $scope.pricesBusiness($scope.idEmpresa);
        $scope.mesElements();
    };

    //Ejecuto la funcion anterior init()

    $scope.init();


    /*Envio del formulario */
    $scope.submitForm = function (e, formData, idExamen, idEmpresa) {
        console.log(formData.priceExamen[idExamen]);
        console.log(formData.priceEdit[idExamen]);

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
            title: "Procesando",
            text: 'Espere...',
            showConfirmButton: false
        });

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
                    timer: 400,
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
    };
    /*cierre del envio del formulario*/
    //By the way, you can still create your own method in here... :)
    $scope.checkedElement = function (value) {
        console.log(value);
        if (value) {
            console.log(value);
            return true;
        } else {
            return false;
        }
    }
});
