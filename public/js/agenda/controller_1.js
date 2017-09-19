agenda.controller("CtrlApp", function ($scope, $http, $window, $timeout, $q) {
    /*variables de inicializacion*/
$scope.availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    
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
        console.log(event.paciente);
        $scope.formCita = true;

        $("#agenda-list-citas").hide();
        $scope.time = false;
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
        panelModificar.url = URL_BASE + "medico/agenda/update/" + event.id;
        $scope.cita_id = event.id;
        //$("#select-paciente").val(event.paciente_id).trigger("change");

        $scope.searchText = event.paciente.cedula + " - " + event.paciente.nombre + " " + event.paciente.apellido;
        $scope.descripcion = event.detalle_cita;
        $scope.idpaciente = event.paciente_id;
        $scope.searchTextAgreement = event.convenio.id_convenio;

        if ($scope.searchTextAgreement > 1) {
            $scope.tipo_convenio = true;
            $scope.fecha_autorizacion = moment(event.convenio.fecha_autorizacion, "YYYY-MM-DD").format("DD/MM/YYYY");
            $scope.autorizacion = event.convenio.autorizacion;
            $scope.fecha_vence = moment(event.convenio.fecha_vence, "YYYY-MM-DD").format("DD/MM/YYYY");
//            $("#convenio").val($scope.searchTextAgreement).attr('selected', true);
            $("#convenio").val($scope.searchTextAgreement).trigger("change");
        } else {
            $scope.tipo_convenio = false;
            $scope.fecha_autorizacion = "";
            $scope.autorizacion = "";
            $scope.fecha_vence = "";
            $("#convenio").val($scope.searchTextAgreement).trigger("change");
//            $("#convenio").val($scope.searchTextAgreement).attr('selected', true);

        }
        //cambio de botones
        $scope.modificar = true;
        $scope.agendar = false;
        $scope.panel = panelModificar;
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
                translate: function (value) {
                    return  value + ' minutos';
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
        $scope.convenios = [];
        $scope.urlCitas = "";
        $scope.formCita = false;
        $scope.time = false;
        $scope.dateSelect = "";
        $scope.hourSelect = "";
        $scope.hourEnd = "";
//        $scope.horaInicio = "";
//        $scope.horaFin = "";
        $scope.start = "";
        $scope.end = "";
        $scope.idpaciente = "";
        $scope.tipo_convenio = false;
        // $scope.patients = OPTIONS_PACIENTE;
        $scope.config = {
            defaultDate: $scope.fecha,
            defaultView: 'agendaWeek'
        };
        $scope.sel_convenio = "";
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
        $scope.showDrop = false;
        $scope.startDateEdit = "";
        $scope.endDateEdit = "";
        $scope.detailsCitas = "";
        $scope.idCita = "";
        $scope.newPatient = false;
        $scope.autorizacion_required = false;
        $scope.fullCalendar = function (data) {
            $scope.agenda = data.agenda;
            $scope.medico = data.medico;
            $scope.convenios = data.convenios;
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
                    console.log(view);
                    if (view.type == "month") {
                        $('#calendar').fullCalendar("changeView", "agendaWeek");
                        $('#calendar').fullCalendar('gotoDate', date);
                    } else {
                        var element = jsEvent.target.outerHTML;
                        element = element.substring(0, 3);
                        var now = moment().format("DD/MM/YYYY HH:mm");

                        if (date.format('DD/MM/YYYY HH:mm') > now) {
                            if (element == "<td") {
                                $scope.cita.fecha = date.format('DD/MM/YYYY');
                                $scope.showFormAppointment($scope.cita.fecha, date.format('HH:mm a'));
                            }
                        }
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
                    var now = moment().format("DD/MM/YYYY HH:mm");
                    if (event.start.format('DD/MM/YYYY HH:mm') < now) {
                        revertFunc();
                    } else {
                        $scope.dropModCita(event);
                    }
                },
                eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {
                    var now = moment().format("DD/MM/YYYY HH:mm");
                    if (event.start.format('DD/MM/YYYY HH:mm') < now) {
                        revertFunc();
                    } else {
                        $scope.dropModCita(event);
                    }
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
        var inicio = moment($scope.hourSelect.toString(), 'H:mm a');
        $scope.hourEnd = moment(inicio).add($scope.slider.value, 'm');
        $scope.hourEnd = moment($scope.end.toString(), 'H:mm a');
        var fin = moment($scope.hourEnd.toString(), 'H:mm a');
        verified = !inicio.isAfter(fin);
        return verified;
    };
    $scope.init(); //inicializar
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
        $scope.horaInicio = "";
        $scope.searchTextAgreement = "";
        $scope.searchText = "";
        $scope.descripcion = "";
        $scope.horaFin = "";
        // $scope.cita={fecha : $scope.cita.fecha};
        $scope.resetAutorizacion();
        $scope.panel = new $scope.panel_default();
        /*$scope.$watch('panel',function(){
         $scope.panel = $scope.panel_default;
         });*/
    };
    /*
     * Recarga la página actual
     */
    $scope.reloadRoute = function () {
        $window.location.reload();
    };

    $scope.dropModCita = function (cita) {
        $("#agenda-list-citas").hide();
        $("#panel-edit-drop").show();
        $scope.showDrop = true;
        $scope.startDateEdit = cita.start.format('DD/MM/YYYY, H:mm');
        $scope.endDateEdit = cita.end.format('DD/MM/YYYY, H:mm');
        $scope.detailsCitas = cita.title;
        $scope.idCita = cita.id;
        try {
            $scope.$apply();
        } catch (err) {
            console.log(err);
        }
    };

    $scope.updateDropCita = function (idCita) {

        var url = URL_BASE + "medico/agenda/uptade/" + idCita;
        var start = moment($scope.startDateEdit, 'DD/MM/YYYY,H:mm').format();
        var end = moment($scope.endDateEdit, 'DD/MM/YYYY,H:mm').format();
        var data = {start: start, end: end, color: "#E9C341"};
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
                        method: "PUT",
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
                            }, function () {
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
                });
    }
    ;
    /*
     * -->
     */
    /*
     * Recarga la página actual
     */
    $scope.reloadCalendar = function () {
        $("#form-save-cita").hide();
        $("#panel-edit-drop").hide();
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
        console.log(this.formCitaSend.$dirty);
        var panelCreate = new $scope.panel_default();
        $("#agenda-list-citas").hide();
        $("#form-save-cita").show();
        //cambio de botones
        $scope.formCita = true;
        $scope.time = true;
        $scope.modificar = false;
        $scope.agendar = true;
        $scope.panel = panelCreate;
        $scope.dateSelect = dateSelect;
        $scope.hourSelect = hourInit;
        var hora_inicio = $scope.hourSelect.split(" "); //obtener solo la hora
        //convertir a tipo aceptado por el calendario uniendo fecha y hora
        var start = moment($scope.cita.fecha + "," + hora_inicio[0], 'DD/MM/YYYY,H:mm').format();
        $scope.hourEnd = moment(start).add($scope.slider.value, 'm');
        $scope.hourEnd = moment($scope.hourEnd).format('HH:mm a');
        $scope.searchTextAgreement = 1;
        
//        $("#convenio").trigger();
        $("#convenio").val($scope.searchTextAgreement).trigger("change");
        try {
            $scope.$apply();
        } catch (e) {

        }
    };

    $scope.previewCita = function () {
        if (this.formCitaSend.$dirty) {
            console.log(this.formCitaSend.$dirty);
            this.formCitaSend.$dirty = false;
            console.log(this.formCitaSend.$dirty);
        }
        $("#agenda-list-citas").show();
        $("#form-save-cita").hide();
        $("#panel-edit-drop").hide();
        $scope.init(); //inicializar
        $scope.reloadCalendar();
        $scope.resetPanelCita();


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
        if ($scope.time)
        {
            $scope.setDateTime();
        }
        var fd = $("#form-cita"),
                url = fd.attr("action"),
                data = fd.serialize();
//        console.log(data);
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
                    $scope.resetPanelCita();
                    $scope.init(); //inicializar
                });
            } else if (data.status == 500) {
                swal("Error!", "Contacte al administrador!", "error");
            } else {
                swal("Error!", "Error en la transacción!", "error");
            }
        });
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
    $scope.complete=function(){
        $scope.idpaciente = "";
        var url = URL_BASE + "medico/agenda/get/patient/" + $scope.searchText;
        $http({
            url: url,
            method: 'GET',
            //data: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then(function success(response) {
            if (response.data.response) {
                console.log(response.data.response);
                $scope.searchResult = response.data.response;
                

            } else {
                $scope.searchResult = {}
                $scope.newPatient = true;
            }
        });
        
    } 
    $scope.searchPatients = function (keyEvent) {
        
         if(keyEvent.which != 38 && keyEvent.which !=40){
            $scope.idpaciente = "";
        var url = URL_BASE + "medico/agenda/get/patient/" + $scope.searchText;
        $http({
            url: url,
            method: 'GET',
            //data: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then(function success(response) {
            if (response.data.response) {
                console.log(response.data.response.patients);
                $scope.searchResult = response.data.response.patients;


            } else {
                $scope.searchResult = {}
                $scope.newPatient = true;
            }
        });

        }
        
    }
    /*
     * Validar id paciente seleccionado
     */
    $scope.valideIdPatient = function () {
        $("#agenda-list-citas").hide();
        if ($scope.idpaciente == "") {
            $scope.searchText = "";
        }
    };

    // Set value to search box
    $scope.setValue = function (index) {
        $scope.searchText = $scope.searchResult[index].ci + " - " + $scope.searchResult[index].name +" "+$scope.searchResult[index].apellido;
        $scope.idpaciente = $scope.searchResult[index].id;
        $scope.searchResult = {};
    }

    // Set value to search box
    $scope.setValueAgreement = function (){
        if ($scope.searchTextAgreement > 1) {
            $scope.tipo_convenio = true;
            $scope.autorizacion_required = true;
        } else {
            $scope.tipo_convenio = false;
            $scope.autorizacion_required = false;
            $scope.autorizacion = "";
            $scope.fecha_autorizacion = "";
            $scope.fecha_vence = "";
        }
    }
});







