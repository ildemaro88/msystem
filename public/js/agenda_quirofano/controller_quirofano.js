agenda.controller("AppAgendaQuirofano", function ($scope, $http, $window, $timeout, $q, searchAutocomplet) {

    /*
     * Inicializacion
     */

    $scope.init = function () {
        $scope.idSalleValue = idSalle;
        $scope.citaId = "";
        $scope.formData = {};
        $scope.formData.idSalle = $scope.idSalleValue;
        $scope.hourEnd = "";
        /*variables del formulario*/
        $scope.slider = {
            value: 1,
            options: {
                floor: 1,
                ceil: 10,
                step: 1,
                onChange: function () {
                    $scope.setDateTime();
                },
                // onChange : $scope.setDateTime(),
                translate: function (value) {
                    if (value > 1) {
                        return  value + ' horas';
                    } else {
                        return  value + ' hora';
                    }
                }
            }

        };
        $scope.formCita = false;
        $scope.config = {
            defaultDate: $scope.fecha,
            defaultView: 'agendaWeek'
        };
        $scope.newPatient = false;
        $scope.newDoctor = false;
        $scope.newAnesthesiologist = false;
        $scope.newResident = false;
        $scope.newSalle = false;
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
            timeFormat: 'hh:mm a',
            slotLabelFormat: "hh:mm a",
            dayClick: function (date, jsEvent, view) {
                if (view.type == "month") {
                    console.log("dssdsd");
                    $('#calendar').fullCalendar("changeView", "agendaWeek");
                    $('#calendar').fullCalendar('gotoDate', date);
                } else {
                    var element = jsEvent.target.outerHTML;
                    element = element.substring(0, 3);
                    console.log(element)
                    var now = moment();
                    if (date.isAfter(now) || date.format('DD/MM/YYYY HH:mm') > now.format('DD/MM/YYYY HH:mm')) {
                        $scope.cita.fecha = date.format('DD/MM/YYYY');
                        $scope.formCreate($scope.cita.fecha, date.format('HH:mm a'));
                    }
                }
            },
            editable: true,
            eventLimit: true,
            aspectRatio: 2,
            nowIndicator: true,
            slotDuration: '00:15:00',
            titleFormat: 'MMMM D YYYY',
            columnFormat: 'dddd',
            eventOverlap: false,
            events: {
                url: URL_BASE + "quirofano/agenda/events/" + $scope.idSalleValue
            },
            eventRender: function (event, element) {

                element.click(function () {
                    console.log(event);
                    $scope.formEdit(event);
                });
            },
            eventResize: function (event, delta, revertFunc) {
                var now = moment();
                if (event.start.isAfter(now) || event.start.format('DD/MM/YYYY HH:mm') > now.format('DD/MM/YYYY HH:mm')) {
                    $scope.dropModCita(event);
                } else {
                    revertFunc();
                }
            },
            eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {

                var now = moment();
                if (event.start.isAfter(now) || event.start.format('DD/MM/YYYY HH:mm') > now.format('DD/MM/YYYY HH:mm')) {
                    $scope.dropModCita(event);
                } else {
                    revertFunc();
                }
            }
        });
    };
    $scope.init();

    $scope.panelDefault = function () {
        this.title_panel = "Agendar nueva Cita";
        this.class_heading = "panel-primary";
        this.url = URL_BASE + "quirofano/agenda/save";
        this.method_form = "post";
        this.buttons = {
            agendar: true,
            trash: false,
            cancelar: false,
            modificar: false
        }
    };

    $scope.panelModify = function () {
        this.title_panel = "Modificar Cita";
        this.class_heading = "carrot";
        this.style_body = "background-color:white";
        this.url = URL_BASE + "quirofano/agenda/update/" + $scope.citaId;
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

    $scope.formCreate = function (dateSelect, hourInit) {
        $("#agenda-list-citas").hide();
        $("#form-cita").show();
        var panelCreate = new $scope.panelDefault();
        //cambio de botones
        $scope.time = true;
        $scope.modificar = false;
        $scope.agendar = true;
        $scope.dateSelect = dateSelect;
        $scope.hourSelect = hourInit;
        $scope.formData.color = '#E9C341';
        var hora_inicio = $scope.hourSelect.split(" "); //obtener solo la hora
        $scope.setDateTime();
        $scope.panel = panelCreate;
        try {
            $scope.$apply();
        } catch (e) {

        }
    };
    /*
     * Panel de modificacion de la cita
     * */
    $scope.formEdit = function (event) {

        $("#agenda-list-citas").hide();
        $scope.time = false;
        $("#agenda-list-citas").hide();
        $("#form-cita").show();
        /*
         * Preparar el panel para modificar una cita
         * */

        $scope.config = {
            defaultDate: moment(event.start).format('YYYY-MM-DD'),
            defaultView: 'agendaDay'
        };
        $scope.citaId = event.id;
        $scope.formData.color = event.color;
        var panelModificar = new $scope.panelModify();
        $scope.panel = panelModificar;
        $("#calendar").fullCalendar('gotoDate', moment(event.start).format('YYYY-MM-DD'));
        // panelModificar.url = URL_BASE + "medico/agenda/update/" + event.id;
        $scope.cita_id = event.id;
        //$("#select-paciente").val(event.paciente_id).trigger("change");
        $scope.searchTextDoctor = event.medico.nombre + " " + event.medico.apellido;
        $scope.searchTextAnesthesiologist = event.anesteciologo.nombre + " " + event.anesteciologo.apellido;
        $scope.searchTextResident = event.residente.nombre + " " + event.residente.apellido;
        $scope.searchTextPatient = event.paciente.cedula + " - " + event.paciente.nombre + " " + event.paciente.apellido;
        $scope.searchTextSalle = event.quirofano.name;
        $scope.formData.descripcion = event.detalle_cita;
        $scope.formData.process = event.process;
        $scope.formData.idPatient = event.id_paciente;
        $scope.formData.idDoctor = event.id_medico;
        $scope.formData.idAnesthesiologist = event.id_anesteciologo;
        $scope.formData.idResident = event.id_residente;
        //cambio de botones
        $scope.modificar = true;
        $scope.agendar = false;

        try {
            $scope.$apply();
        } catch (e) {

        }
    };

    $scope.previewCita = function () {
        $("#agenda-list-citas").show();
        $("#form-cita").hide();
        if (this.formCitaSend.$dirty) {
            this.formCitaSend.$dirty = false;
        }
        $scope.init(); //inicializar
        $scope.reloadCalendar();
        $scope.resetPanelCita();
    };
    /*
     * Recarga la página actual
     */
    $scope.reloadCalendar = function () {
        $("#panel-edit-drop").hide();
        $("#form-cita").hide();
        $("#agenda-list-citas").show();
        $("#calendar").fullCalendar("refetchEvents");
    };

    $scope.resetPanelCita = function () {
        $scope.panel = new $scope.panelDefault();
        $scope.searchTextDoctor = "";
        $scope.searchTextAnesthesiologist = "";
        $scope.searchTextResident = "";
        $scope.searchTextPatient = "";
        $scope.searchTextSalle = "";
        $scope.formData.descripcion = "";

    };

    /*busar elementos y seleccionarlos*/
    $scope.searchElement = function (keyEvent, url, element, text) {
        if (element == 2 || element == 3) {
            if (element == 2) {
                var url = URL_BASE + url + text + "/" + 1;
            } else {
                var url = URL_BASE + url + text + "/" + 2;
                ;
            }
        } else {
            var url = URL_BASE + url + text;
        }
        if (keyEvent.which != 38 && keyEvent.which != 40) {
            searchAutocomplet.search(url).then(function (data) {

                if (data.length > 0) {
                    switch (element) {
                        case 1:
                            $scope.doctors = data;
                            $scope.newDoctor = false;
                            break;
                        case 2:
                            $scope.anesthesiologists = data;
                            $scope.newAnesthesiologist = false;
                            break;
                        case 3:
                            $scope.residents = data;
                            $scope.newResident = false;
                            break;
                        case 4:
                            $scope.patients = data;
                            $scope.newPatient = false;
                            break;
                        case 5:
                            $scope.salles = data;
                            $scope.newSalle = false;
                            break;
                    }

                } else {
                    switch (element) {
                        case 1:
                            $scope.doctors = [];
                            $scope.newDoctor = true;
                            break;
                        case 2:
                            $scope.anesthesiologists = [];
                            $scope.newAnesthesiologist = true;
                            break;
                        case 3:
                            $scope.residents = [];
                            $scope.newResident = true;
                            break;
                        case 4:
                            $scope.patients = [];
                            $scope.newPatient = true;
                            break;
                        case 5:
                            $scope.salles = [];
                            $scope.newSalle = true;
                            break;
                    }
                }
            });

        }
    }

    // Set value to search box
    $scope.setDoctor = function (index) {

        $scope.searchTextDoctor = $scope.doctors[index].name + " " + $scope.doctors[index].apellido;
        $scope.formData.idDoctor = $scope.doctors[index].id;
        $scope.doctors = [];
    }
    /*
     * Validar id del doctor seleccionado
     */
    $scope.valideIdDoctor = function () {

        if ($scope.formData.idDoctor == "") {
            $scope.searchTextDoctor = "";
        }
    };

    /*
     * Validar id paciente seleccionado
     */
    $scope.valideIdAnesthesiologist = function () {
        if ($scope.formData.idAnesthesiologist == "") {
            $scope.searchTextAnesthesiologist = "";
        }
    };

    // Set value to search box
    $scope.setAnesthesiologist = function (index) {

        $scope.searchTextAnesthesiologist = $scope.anesthesiologists[index].name + " " + $scope.anesthesiologists[index].apellido;
        $scope.formData.idAnesthesiologist = $scope.anesthesiologists[index].id;
        $scope.anesthesiologists = [];
    }


    /*
     * Validar id paciente seleccionado
     */
    $scope.valideIdResident = function () {
        if ($scope.formData.idResident == "") {
            $scope.searchTextResident = "";
        }
    };

    // Set value to search box
    $scope.setResident = function (index) {

        $scope.searchTextResident = $scope.residents[index].name + " " + $scope.residents[index].apellido;
        $scope.formData.idResident = $scope.residents[index].id;
        $scope.residents = [];
    }

    /*
     * Validar id paciente seleccionado
     */
    $scope.valideIdPatient = function () {
        if ($scope.formData.idPatient == "") {
            $scope.searchTextPatient = "";
        }
    };

    // Set value to search box
    $scope.setPatient = function (index) {

        $scope.searchTextPatient = $scope.patients[index].ci + " - " + $scope.patients[index].name + " " + $scope.patients[index].apellido;
        $scope.formData.idPatient = $scope.patients[index].id;
        //$scope.idEmpresa = $scope.patients[index].empresa;
        $scope.patients = [];
    }
    /*cierre busar elementos y seleccionarlos*/
    /*Envio del formulario */
    $scope.submitForm = function (e, formData) {

        e.preventDefault();
        var url = $scope.panel.url;
        swal({
            title: "Procesando",
            text: 'Espere...',
            showConfirmButton: false
        });
        $http({
            url: url,
            method: $scope.panel.method_form,
            data: formData,
            headers: {
                'Content-Type': 'application/json'
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
/*cierre del envio del formulario*/

/*setear la hora final de la operacion*/
    $scope.setDateTime = function () {
        /*
         *  Agregar datos de tiempo a los input para ser enviados con submit
         * */
        var hora_inicio = $scope.hourSelect.split(" "); //obtener solo la hora
        //convertir a tipo aceptado por el calendario uniendo fecha y hora
        $scope.formData.start = moment($scope.cita.fecha + "," + hora_inicio[0], 'DD/MM/YYYY,H:mm').format();
        $scope.formData.end = moment($scope.formData.start).add($scope.slider.value, 'hours');
        $scope.hourEnd = moment($scope.formData.end).format('HH:mm a');
        $scope.formData.end = moment($scope.formData.end, 'DD/MM/YYYY,H:mm').format();
        
        
    };
    /*cierre del seteo la hora final de la operacion*/

/*Modificar cuando el evento se mueve de fecho o se hala la hora*/

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
/*cierre de modificar cuando el evento se mueve de fecho o se hala la hora*/

/*enviar el evento cuando se modificó por medio de un drop*/
    $scope.updateDropCita = function (idCita) {
        var url = URL_BASE + "quirofano/agenda/uptade/" + idCita;
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
    };
    /*cierre del enviar el evento cuando se modificó por medio de un drop*/

    /*
     * -->
     */
    /*
     * Cancelar la cita
     */
    $scope.cancelarCita = function () {

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
                url: URL_BASE + 'quirofano/agenda/delete/' + $scope.cita_id,
                method: 'POST',
                data: {"_method": "DELETE"},
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (data) {
                if (data.data.response == true) {
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
    /*cierre de cancelar la cita*/
});



