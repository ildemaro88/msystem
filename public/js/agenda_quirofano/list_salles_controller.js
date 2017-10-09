agenda.controller("CtrlAppSalles", function ($scope, $http, $window, $timeout, $q, getElements) {

    $scope.listSalles = function (id) {
        var url = URL_BASE + "quirofano/agenda/get/salles";
        getElements.getQuery(url).then(function (data) {

            if (data.length > 0) {
                $scope.salles = data;
            } else {
                $scope.salles = [];
            }
        });
    }
    $scope.listSalles();
    /*
     * Cancelar la cita
     */
    $scope.deleteSalle = function (id) {
        swal({
            title: "Estás seguro ?",
            text: "No podrá recuperar estos datos de registro!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            closeOnConfirm: false
        }, function () {
            $http({
                url: URL_BASE + "quirofano/delete/" + id,
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (data) {
                if (data.data) {
                    swal({
                        title: "Correcto!",
                        text: 'Realizado con éxito!',
                        type: "success",
                        timer: 400,
                        showConfirmButton: true,
                        closeOnConfirm: true
                    }, function () {
                        $scope.listSalles();
                    });
                } else {
                    swal("Error!", "Error en la transacción!", "error");
                }
            });
        });

    };

});




