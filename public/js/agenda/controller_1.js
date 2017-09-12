agenda.controller('autoCompleteController', function autoCompleteController ($timeout, $q, $log) {
            var self = this;
            self.simulateQuery = false;
            self.isDisabled    = false;
            
            // list of states to be displayed
            self.states        = loadStates();
            self.querySearch   = querySearch;
            self.selectedItemChange = selectedItemChange;
            self.searchTextChange   = searchTextChange;
            self.newState = newState;
            
            function newState(state) {
               alert("This functionality is yet to be implemented!");
            }
            
            function querySearch (query) {
               var results = query ? self.states.filter( createFilterFor(query) ) :
                  self.states, deferred;
                  
               if (self.simulateQuery) {
                  deferred = $q.defer();
                     
                  $timeout(function () { 
                     deferred.resolve( results ); 
                  }, 
                  Math.random() * 1000, false);
                  return deferred.promise;
               } else {

                  return results;
               }
            }
            
            function searchTextChange(text) {
               $log.info('Text changed to ' + text);
            }
            
            function selectedItemChange(item) {
               $log.info('Item changed to ' + JSON.stringify(item));
            }
            
            //build list of states as map of key-value pairs
            function loadStates() {
               var allStates = 'Alabama, Alaska, Arizona, Arkansas, California, Colorado, Connecticut, Delaware,\
                  Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Iowa, Kansas, Kentucky, Louisiana,\
                  Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana,\
                  Nebraska, Nevada, New Hampshire, New Jersey, New Mexico, New York, North Carolina,\
                  North Dakota, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina,\
                  South Dakota, Tennessee, Texas, Utah, Vermont, Virginia, Washington, West Virginia,\
                  Wisconsin, Wyoming';
                  
               return allStates.split(/, +/g).map( function (state) {
                  return {
                     value: state.toLowerCase(),
                     display: state
                  };
               });
            }
            
            //filter function for search query
            function createFilterFor(query) {
               var lowercaseQuery = angular.lowercase(query);
               return function filterFn(state) {
                  return (state.value.indexOf(lowercaseQuery) === 0);
               };
            }
         } 
         );

agenda.controller("CtrlApp", function ($scope, $http, $window, $timeout, $q) {
    /*variables de inicializacion*/

    $scope.panel_default = function () {
        this.title_panel = "Agendar nueva Cita";
        this.class_heading = "panel-primary";
        this.url = URL_MEDICO_CITA_SAVE;
        this.method_form = "post";
        this.buttons = {
            agendar: true,
            trash: false,
            cancelar: false,
            modificar: false
        }
    };
    $scope.panel_modify = function () {
        this.title_panel = "Modificar Cita";
        this.class_heading = "carrot";
        this.style_body = "background-color:white";
        this.url = URL_MEDICO_CITA;
        this.method_form = "put";
        this.method = {
            name: "_method",
            value: "PATCH"
        };
        this.class_text_title = "white-header";
        this.buttons = {
            agendar: false,
            trash: true,
            cancelar: true,
            modificar: true
        }
    };
    // Borra los campos del ingreso de datos de actualizacion
    $scope.resetAutorizacion = function () {


        $scope.autorizacion = "";
        $scope.fecha_autorizacion = HOY;
        $scope.fecha_vence = HOY;


    };
    /*
     * Panel de modificacion de la cita
     * */
    $scope.panelModCita = function (event) {
        $scope.formCita = true;
        $("#agenda-list-citas").hide();
        $("#form-save-cita").show();
        /*
         * Preparar el panel para modificar una cita
         * */
        $scope.config = {
            defaultDate: moment(event.start).format('YYYY-MM-DD'),
            defaultView: 'agendaDay'
        };
        var panelModificar = new $scope.panel_modify();
        $("#calendar").fullCalendar('gotoDate', moment(event.start).format('YYYY-MM-DD'));
        panelModificar.url = URL_MEDICO_CITA + "/" + event.id;
        $scope.cita_id = event.id;
        //$("#select-paciente").val(event.paciente_id).trigger("change");
        $scope.searchText = event.paciente_id;
        $scope.cita = {
            descripcion: event.detalle_cita,
            fecha: moment(event.start).format('DD/MM/YYYY'),
            hour: moment(event.start).format('H:mm')
        };
       /* $scope.dateSelect = moment(event.start).format('DD/MM/YYYY');
        $scope.hourSelect = moment(event.start).format('H:mm a');
        $scope.searchTextAgreement = event.sel_convenio;
        $scope.fecha_autorizacion = moment(event.convenio.fecha_autorizacion, "YYYY-MM-DD").format("DD/MM/YYYY");
        $scope.autorizacion = event.convenio.autorizacion;
        $scope.fecha_vence= moment(event.convenio.fecha_vence, "YYYY-MM-DD").format("DD/MM/YYYY");*/
        //$scope.horaInicio = moment(event.start).format('H:mm a');
       // $scope.horaFin = moment(event.end).format('H:mm a');
        //$scope.start = moment(event.start, 'YYYY/MM/DD,H:mm').format();
        //$scope.end = moment(event.end, 'YYYY/MM/DD,H:mm').format();
        //convenio assign
       // $scope.sel_convenio = event.sel_convenio;
       // $("#sel_convenio").trigger("change");
        if ($scope.sel_convenio == "I.E.S.S.") {
            $scope.tipo_convenio = true;
            try {
                $scope.autorizacion = event.convenio.autorizacion;
                $scope.fecha_autorizacion = moment(event.convenio.fecha_autorizacion, "YYYY-MM-DD").format("DD/MM/YYYY");
                $scope.fecha_vence = moment(event.convenio.fecha_vence, "YYYY-MM-DD").format("DD/MM/YYYY");
            } catch (e) {
                console.log(e);
            }
        } else {
            $scope.resetAutorizacion();
        }
        //cambio de botones
        $scope.modificar = true;
        $scope.agendar = false;
        $scope.panel = panelModificar;
        /*$scope.$watch('panel',function(){
         $scope.panel = $scope.panel_modify;
         });*/
        try {
            $scope.$apply();
        } catch (e) {

        }
    };
    /*
     * Inicializacion
     */

    $scope.init = function () {

        $scope.slider = {
            value: 15,
            options: {
                floor: 15,
                ceil: 45,
                step: 15,
                translate: function(value) {
      return  value + ' minutos' ;
    }
            }
            
        };
        $http.get(URL_GET_DATA_JSON)
                .then(function success(response) {
                    $scope.response = response.data.response;                    
                    $scope.fullCalendar($scope.response);
                }, function errorCallback(response) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
        $scope.agendaId = [];  
        $scope.medico = [];
        $scope.urlCitas = "";
        $scope.formCita = false;
        $scope.dateSelect = "";
        $scope.hourSelect = "";
        $scope.hourEnd = "";
        $scope.horaInicio = "";
        $scope.horaFin = "";
        $scope.start = "";
        $scope.end = "";
        $scope.idpaciente = "";
        $scope.tipo_convenio = true;
        // $scope.patients = OPTIONS_PACIENTE;
        $scope.config = {
            defaultDate: $scope.fecha,
            defaultView: 'agendaWeek'
        };
        $scope.sel_convenio = "";
//        $scope.options_convenio = [
//            "I.E.S.S.",
//            "PARTICULAR"
//        ];
        $(".select2").select2();
        $('#fecha, .datepicker').datepicker({
            language: 'es',
            autoclose: true,
            "setDate": new Date(),
            format: 'dd/mm/yyyy',
            defaultDate: new Date()
        }).datepicker('setStartDate', new Date());
        $('#fecha, .datepicker').datepicker("setDate", "0");
        $('#fecha, .datepicker').trigger('chosen:updated');

        $scope.fullCalendar = function (data) {
            $scope.agenda = data.agenda;
            $scope.medico = data.medico;
            $scope.urlCitas = URL_BASE + 'medico/cita/' + $scope.medico.id;
            $('#calendar').fullCalendar({
                allDaySlot: false,
                header: {
                    left: 'prev,next, today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: $scope.config.defaultDate,
                height: 460, //alto del calendario
                defaultView: $scope.config.defaultView,
                locale: 'es', // tomado de locale
                buttonIcons: true,
                selectHelper: true,
                navLinks: false,
                weekends: true,
                dayClick: function (date, jsEvent, view) {
                    var element = jsEvent.target.outerHTML;
                    element = element.substring(0, 3)
                    if (element == "<td") {
                        $scope.cita.fecha = date.format('DD/MM/YYYY');
                        $scope.showFormAppointment($scope.cita.fecha, date.format('H:mm'));
                    }

                },

                businessHours: data.horario_medico,
                //eventConstraint:'businessHours',
                editable: true,
                eventLimit: true,
                //businessHours:true,
                minTime: "7:00:00",
                maxTime: "20:00:00",
                aspectRatio: 2,
                nowIndicator: true,
                slotDuration: '00:15:00',
                titleFormat: 'MMMM D YYYY',
                columnFormat: 'dddd',
                eventOverlap: false, // sobreponer eventos
                //fixedWeekCount:true,
                //weekNumbers: true,
                timeFormat: 'H:mm',
                //dayBreakTime: "07:00",
                events: {
                    url: $scope.urlCitas
                },
                eventResizeStop: function () {
                    $scope.verify_time();
                },
                eventRender: function (event, element) {
                    element.click(function () {
                        $scope.panelModCita(event);
                    });
                },
                eventResize: function (event, delta, revertFunc) {
                    console.log("fff")
                    // $scope.panelModCita(event);
                },
                eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {
                    //console.log(view.options.businessHours);
                    //$scope.panelModCita(event);
                    $scope.verify_time();
                }
            });
        };
        /*
         *  Inicializar paneles
         * */
        if (CITA.id == "") {
            $scope.panel = new $scope.panel_default();
        } else {
            $scope.panelModCita(CITA);
        }
    };

    $scope.verify_date = function () {
        if (typeof $scope.cita.hoy == 'undefined') {
            $scope.cita.hoy = HOY;
        }
        var verified = false, equal = false, hoy = $scope.cita.hoy.toString(), fecha = $scope.cita.fecha.toString();
        verified = !moment($scope.cita.hoy, 'DD/MM/YYYY').isAfter($scope.cita.fecha);
        equal = moment(hoy).isSame(fecha);
        return verified == true || equal;
    };
    $scope.verify_time = function () {
        var verified = false;
        var       inicio = moment($scope.hourSelect.toString(), 'H:mm a');
        $scope.hourEnd = moment( inicio).add($scope.slider.value, 'm');
        $scope.hourEnd = moment($scope.end.toString(), 'H:mm a');
        var     fin = moment($scope.hourEnd.toString(), 'H:mm a');
        verified = !inicio.isAfter(fin);
        return verified;
    };
    $scope.init(); //inicializar
    
//       $scope.getCitas = function () {
//        var url = URL_BASE + 'medico/cita/' + $scope.medico.id;
//        $http({
//            url: url,
//            method: 'GET',
//            //data: data,
//            headers: {
//                'Content-Type': 'application/x-www-form-urlencoded'
//            }
//        }).then(function success(response) {
//            $scope.searchResult = response.data;
//        });
//    }
//    $scope.validate_hourMedic = function () {
//        var businessHours = HORARIO_TRABAJO;
//        var inicio = moment($scope.horaInicio.toString(), 'H:mm a'),
//                fin = moment($scope.horaFin.toString(), 'H:mm a'),
//                fecha = moment($scope.cita.fecha, 'DD/MM/YYYY').format('dddd');
//        var verified = false;
//        // recorrer dias y horas
//        angular.forEach(businessHours, function (key, value) {
//            var day_selected = fecha, // martes
//                    day_business = $scope.map_day(parseInt(key.dow[0])); // martes
//            if (day_selected == day_business) {
//                // comparar horas
//                var hour_business_start = moment(key.start, 'H:mm a');
//                var hour_business_end = moment(key.end, 'H:mm a');
//                // console.log(hour_business_start)
//                var val1 = inicio.isBetween(hour_business_start, hour_business_end);
//                // console.log("val1"+val1)
//                var val2 = fin.isBetween(hour_business_start, hour_business_end);
//                // console.log("val2"+val2)
//
//                var val3 = inicio.isSame(hour_business_start);
//                // console.log("val3"+val3)
//
//                var val4 = fin.isSame(hour_business_end);
//                // console.log("val4"+val4)
//
//                if ((val1 == false && val2 == false && val3 == true && val4 == true) || (val1 == true && val2 == true && val3 == false && val4 == false) || (val1 == false && val2 == true && val3 == true && val4 == false)) {
//                    verified = true;
//                    console.log('s')
//                    return
//                } else {//if ((val1 == false && val2 == false && val3 == false && val4 == true) || (val1 == false && val2 == false && val3 == true && val4 == false)) {
//                    verified = true;
//                    console.log('a')
//                    return
//                }
//            }
//        });
//        return verified;
//    };

    $scope.validHours = function () {
        //debugger;
        var inicio = moment($scope.horaInicio.toString(), 'H:mm a');
        fecha = moment($scope.cita.fecha.toString(), 'DD/MM/YYYY');
        var compareDate = moment(fecha.format("DD/MM/YYYY")).isSame(moment().format("DD/MM/YYYY")); //la fecha de la cita es igual a la fecha actual?
        var result = true;
        if (compareDate) {
            if (parseInt(inicio.format('H')) > parseInt(moment().format("H")) + 1) { //la hora de inicio elegida para la cita es mayor que la fecha actual + 1 ?
                result = true;
            } else {
                result = true;
            }
        }
        console.log(result)
        return result;
    }

    $scope.map_day = function (day) {
        var result = "";
        switch (day) {
            case 1:
                result = "lunes";
                break;
            case 2:
                result = "martes";
                break;
            case 3:
                result = "miércoles";
                break;
            case 4:
                result = "jueves";
                break;
            case 5:
                result = "viernes";
                break;
            case 6:
                result = "sábado";
                break;
            case 7:
                result = "domingo";
                break;

        }
        return result;
    };

    /*
     * muestra los datos para ingresar fechas de autorizacion de convenio particular o iess
     * */
//    $scope.eval_convenio = function () {
//        console.log($scope.sel_convenio)
//        if ($scope.sel_convenio != 'PARTICULAR') {
//            $scope.tipo_convenio = true;
//        } else {
//            $scope.tipo_convenio = false;
//
//        }
//    };
    $scope.eliminarCita = function () {
        swal({
            title: '¿Mover a la papelera?',
            type: 'error',
            text: "El tiempo se liberará para aceptar nuevas citas!",
            showCancelButton: true,
            allowOutsideClick: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: false
        }, function () {
            $http({
                url: URL_MEDICO_CITA + '/' + $scope.cita_id,
                method: 'POST',
                data: {"_method": "DELETE"},
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (data) {
                if (data.data.response == true) {
                    //swal("Correcto!", "Cita movida correctamente!", "success");
                    swal({
                        title: "Correcto!",
                        type: "success",
                        text: "Cita movida correctamente!",
                        timer: 400,
                        closeOnConfirm: true
                    }, function () {
                        $scope.reloadCalendar();
                        $scope.resetPanelCita();
                        $scope.init(); //inicializar
                    });
                } else {
                    swal("Error!", "No se pudo borrar la cita!", "error");
                }
            });
        });
    };
    $scope.resetPanelCita = function () {
        $scope.cita = {descripcion: ""};
        $scope.horaInicio = "";
        $scope.searchTextAgreement = "";
        $scope.searchText = "";

        $scope.horaFin = "";
        // $scope.cita={fecha : $scope.cita.fecha};
        $scope.resetAutorizacion();
        $scope.panel = new $scope.panel_default();
        /*$scope.$watch('panel',function(){
         $scope.panel = $scope.panel_default;
         });*/
        try {
            $scope.$apply();
        } catch (err) {
            console.log(err);
        }
    };
    /*
     * Recarga la página actual
     */
    $scope.reloadRoute = function () {
        $window.location.reload();
    };
    /*
     * -->
     */
    /*
     * Recarga la página actual
     */
    $scope.reloadCalendar = function () {
        $("#agenda-list-citas").show();
        $("#calendar").fullCalendar("refetchEvents");
    };
    /*
     * -->
     */
    /*
     * Cancelar la cita
     */
    $scope.cancelarCita = function () {
        $scope.setDateTime();
        swal({
            title: "¿Desea cancelar la cita?",
            text: 'El tiempo no será liberado!',
            type: "warning",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: "Aceptar",
            closeOnConfirm: false
        }, function () {
            $http({
                url: URL_MEDICO_AGENDA,
                method: 'POST',
                data: {cita_id: $scope.cita_id, color: "#7f8c8d"},
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (data) {
                if (data.data.response) {
                    swal({
                        title: "Correcto!",
                        text: 'Realizado con éxito!',
                        type: "success",
                        timer: 400,
                        showConfirmButton: true,
                        closeOnConfirm: true
                    }, function () {
                        $scope.reloadCalendar();
                        $scope.resetPanelCita();
                        $scope.init(); //inicializar
                    });
                } else {
                    swal("Error!", "Error en la transacción!", "error");
                }
            });
        });

    };
    /*
     * -->
     */
    $scope.showFormAppointment = function (dateSelect, hourInit) {
        
        
        var panelCreate = new $scope.panel_default();
        $("#agenda-list-citas").hide();
        $("#form-save-cita").show();
        //cambio de botones
        $scope.formCita = true;
        $scope.modificar = false;
        $scope.agendar = true;
        $scope.panel = panelCreate;
        $scope.dateSelect = dateSelect;
        $scope.hourSelect = hourInit;
        try {
            $scope.$apply();
        } catch (e) {

        }
    };

    $scope.previewCita = function () {
        $("#agenda-list-citas").show();
        $("#form-save-cita").hide();
    };
    $scope.setDateTime = function () {
        /*
         *  Agregar datos de tiempo a los input para ser enviados con submit
         * */
        var hora_inicio = $scope.hourSelect.split(" "); //obtener solo la hora
        //convertir a tipo aceptado por el calendario uniendo fecha y hora
        $scope.start = moment($scope.cita.fecha + "," + hora_inicio[0], 'DD/MM/YYYY,H:mm').format();
        $scope.end = moment($scope.start).add($scope.slider.value, 'm');
        $scope.end = moment($scope.end, 'DD/MM/YYYY,H:mm').format();
        $("#start").remove();
        $("#end").remove();
        $("#form-cita").append('<input id="start" ng-model="start" type="hidden" name="start" value="' + $scope.start + '">' +
                '<input id="end" ng-model="end" type="hidden" name="end" value="' + $scope.end + '"> ');
    };
    /*
     *  Sincronizar agenda
     * */
    $scope.agendaWorker = {
        load: function () {
            $("#calendar").fullCalendar("refetchEvents");
        }
    };
    /*
     * -->
     *
     * */
    $scope.submit = function (e) {




        e.preventDefault();
       
        //if ($scope.verify_date()) {
            $scope.setDateTime();
            var fd = $("#form-cita"),
                    url = fd.attr("action"),
                    data = fd.serialize();
            swal({
                title: "Procesando",
                text: 'Espere...',
                showConfirmButton: false
            });
            $http({
                url: url,
                method: fd.attr("method"),
                data: data,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function (data) {
                if (data.data.response) {
                    swal({
                        title: "Correcto!",
                        text: 'Realizado con éxito!',
                        timer: 400,
                        type: "success",
                        showConfirmButton: true,
                        closeOnConfirm: true
                    }, function () {
                        $scope.reloadCalendar();
                               
                                $scope.reloadCalendar();
                                $scope.resetPanelCita();
                                $scope.init(); //inicializar
                    });
                } else if (data.status == 500) {
                    swal("Error!", "Contacte al administrador!", "error");
                } else {
                    swal("Error!", "Error en la transacción!", "error");
                }
            });
//        } else {
//            swal({
//                type: "error",
//                title: "Error!",
//                html: true,
//                text: "<h3>Corrija los siguientes errores:</h3><br> <ol class='validate_hours'><li>Que la hora de inicio sea mayor o igual que la de fin.</li><li>Que los campos de horario no estén vacíos. </li><li>Que la cita esté dentro del horario de trabajo del médico seleccionado.</li></ul>"
//            });
//        }
    };
    // cambiar formato de fecha 01/11/2017 a 2017-01-11 // not used
    $scope.formatDate = function (date) {
        var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;
        return [year, month, day].join('-');
    };

    $scope.searchPatients = function () {
        var url = URL_BASE + "medico/agenda/get/patient/" + $scope.searchText;
        $http({
            url: url,
            method: 'GET',
            //data: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then(function success(response) {
            $scope.searchResult = response.data.response.patients;
        });
    }

    // Set value to search box
    $scope.setValue = function (index) {
        $scope.searchText = $scope.searchResult[index].ci + " - " + $scope.searchResult[index].name;
        $scope.idpaciente = $scope.searchResult[index].id;
        $scope.searchResult = {};
    }

    $scope.searchAgreements = function () {
        var url = URL_BASE + "medico/agenda/get/agreement/" + $scope.searchTextAgreement;
        $http({
            url: url,
            method: 'GET',
            //data: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then(function success(response) {
            $scope.searchResultAgreement = response.data.response.agreements;
        });
    }

    // Set value to search box
    $scope.setValueAgreement = function (index) {
        $scope.searchTextAgreement = $scope.searchResultAgreement[index].name;
        $scope.searchResultAgreement = {};
        $scope.sel_convenio = $scope.searchTextAgreement;
        if ($scope.searchTextAgreement != 'PARTICULAR') {
            $scope.tipo_convenio = true;
        } else {
            $scope.tipo_convenio = false;

        }
    }
});


 




