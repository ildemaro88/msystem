agenda.controller("AppAgendaQuirofano", function ($scope, $http, $window, $timeout, $q, searchAutocomplet) {

    /*
     * Inicializacion
     */

    $scope.init = function () {
        /*variables del formulario*/
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
        $scope.formCita = false;
        $scope.config = {
            defaultDate: $scope.fecha,
            defaultView: 'agendaWeek'
        };
        $scope.idDoctor = "";
        $scope.idPatient = "";
        $scope.newPatient = false;
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
                console.log(view.type)
                if (view.type == "month") {
                    console.log("dssdsd");
                    $('#calendar').fullCalendar("changeView", "agendaWeek");
                    $('#calendar').fullCalendar('gotoDate', date);
                } else {
                    var element = jsEvent.target.outerHTML;
                    element = element.substring(0, 3);
                    console.log(element)
                    var now = moment().format("DD/MM/YYYY HH:mm");

                    if (date.format('DD/MM/YYYY HH:mm') > now) {
                        if (element == "<td") {
                            $scope.cita.fecha = date.format('DD/MM/YYYY');
                            $scope.formCreate($scope.cita.fecha, date.format('HH:mm a'));
                        }
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
                url: ""
            },
            eventRender: function (event, element) {
                console.log("dssdsd");
//                element.click(function () {
//                    $scope.panelModCita(event);
//                });
            },
            eventResize: function (event, delta, revertFunc) {
                console.log("dssdsd");
//                var now = moment().format("DD/MM/YYYY HH:mm");
//                if (event.start.format('DD/MM/YYYY HH:mm') < now) {
//                    revertFunc();
//                } else {
//                    $scope.dropModCita(event);
//                }
            },
            eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {
                console.log("dssdsd");
//                var now = moment().format("DD/MM/YYYY HH:mm");
//                if (event.start.format('DD/MM/YYYY HH:mm') < now) {
//                    revertFunc();
//                } else {
//                    $scope.dropModCita(event);
//                }
            }
        });
    };
    $scope.init();

    $scope.panelDefault = function () {
        this.title_panel = "Agendar nueva Cita";
        this.class_heading = "panel-primary";
        this.url = "";
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
        this.url = "";
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
        $scope.panel = panelCreate;
        $scope.dateSelect = dateSelect;
        $scope.hourSelect = hourInit;
        var hora_inicio = $scope.hourSelect.split(" "); //obtener solo la hora
        //convertir a tipo aceptado por el calendario uniendo fecha y hora
        var start = moment($scope.cita.fecha + "," + hora_inicio[0], 'DD/MM/YYYY,H:mm').format();
        $scope.hourEnd = moment(start).add($scope.slider.value, 'm');
        $scope.hourEnd = moment($scope.hourEnd).format('HH:mm a');

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
        $("#form-save-cita").hide();
        $("#panel-edit-drop").hide();
        $("#agenda-list-citas").show();
        $("#calendar").fullCalendar("refetchEvents");
    };

    $scope.resetPanelCita = function () {
        $scope.panel = new $scope.panelDefault();

    };

    /*busar elementos y seleccionarlos*/
    $scope.searchElement = function (keyEvent, url, element,text) {
        var url = URL_BASE + url + text;
        if (keyEvent.which != 38 && keyEvent.which != 40) {
            searchAutocomplet.search(url).then(function (data) {
                
                if (data.length > 0) {
                    switch (element) {
                        case 1:
                            $scope.doctors = data;
                            $scope.newDoctor = false;
                            break;
                        case 2:
                            $scope.patients = data;
                            $scope.newPatient = false;
                            break;
                        case 3:
                            $scope.doctors = data;
                            $scope.newDoctor = false;
                            break;
                        case 4:
                            $scope.patients = data;
                            $scope.newPatient = false;
                            break;
                        case 5:
                            $scope.patients = data;
                            $scope.newPatient = false;
                            break;
                    }
                    
                } else {
                      switch (element) {
                     case 1:
                            $scope.doctors = [];
                            $scope.newDoctor = true;
                            break;
                        case 2:
                            $scope.patients = [];
                            $scope.newPatient = true;
                            break;
                        case 3:
                            $scope.doctors = [];
                            $scope.newDoctor = true;
                            break;
                        case 4:
                            $scope.patients = [];
                            $scope.newPatient = true;
                            break;
                    }
                }
            });

        }
    }
    /*cierre busar elementos y seleccionarlos*/

    /*
     * Validar id paciente seleccionado
     */
    $scope.valideIdPatient = function () {
        $("#agenda-list-citas").hide();
        if ($scope.idPatient == "") {
            $scope.searchText = "";
        }
    };

    // Set value to search box
    $scope.setPatient = function (index) {

        $scope.searchText = $scope.patients[index].ci + " - " + $scope.patients[index].name + " " + $scope.patients[index].apellido;
        $scope.idPatient = $scope.patients[index].id;
        $scope.idEmpresa = $scope.patients[index].empresa;
        $scope.patients = {}
    }


    // Set value to search box
    $scope.setDoctor = function (index) {

        $scope.searchTextDoctor =  $scope.doctors[index].name + " " + $scope.doctors[index].apellido;
        $scope.idDoctor = $scope.doctors[index].id;
        $scope.doctors = {}
    }
        /*
     * Validar id del doctor seleccionado
     */
    $scope.valideIdDoctor = function () {

        if ($scope.idDoctor == "") {
            $scope.searchTextDoctor = "";
        }
    };

});




