price.controller("ControllerPrice", function ($scope, $http, getElements)
{

    //Como inician los campos

    $scope.init = function ()
    {
        $scope.elements = [];
        $scope.formData = [];
    };

    //Ejecuto la funcion anterior init()

    $scope.init();
    $scope.mesElements = function () {
        var url = URL_BASE + "examenes/price/elements"
        getElements.getQuery(url).then(function (data) {
            if (data.length > 0) {
                $scope.elements = data;
            }
        });
    }
    $scope.mesElements();
    /*Envio del formulario */
    $scope.submitForm = function (e, formData, idExamen) {
        console.log(idExamen)
        console.log(formData.priceExamen[idExamen]);
        //$scope.formData = [];
       // $scope.mesElements();
        e.preventDefault();
        //  var url = $scope.panel.url;
//        swal({
//            title: "Procesando",
//            text: 'Espere...',
//            showConfirmButton: false
//        });
//        $http({
//            url: url,
//            method: $scope.panel.method_form,
//            data: formData,
//            headers: {
//                'Content-Type': 'application/json'
//            }
//        }).then(function (data) {
//            if (data.data.response) {
//                swal({
//                    title: "Correcto!",
//                    text: 'Realizado con éxito!',
//                    timer: 400,
//                    type: "success",
//                    showConfirmButton: true,
//                    closeOnConfirm: true
//                }, function () {
//                    $scope.reloadCalendar();
//                    $scope.resetPanelCita();
//                    $scope.init(); //inicializar
//                });
//            } else if (data.status == 500) {
//                swal("Error!", "Contacte al administrador!", "error");
//            } else {
//                swal("Error!", "Error en la transacción!", "error");
//            }
//        });
    };
    /*cierre del envio del formulario*/
});
