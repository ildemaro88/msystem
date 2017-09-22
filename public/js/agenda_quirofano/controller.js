agendaQuirofano.controller("CtrlApp", function ($scope, $http, $window, $timeout, $q) {

    /*
     * Inicializacion
     */

    $scope.init = function () {
//        $http.get(URL_GET_DATA_JSON)
//                .then(function success(response) {
//                    $scope.response = response.data.response;
//                    $scope.fullCalendar($scope.response);
//                }, function errorCallback(response) {
//                    // called asynchronously if an error occurs
//                    // or server returns response with an error status.
//                });

        $scope.config = {
            defaultDate: $scope.fecha,
            defaultView: 'agendaWeek'
        };

//            $scope.agenda = data.agenda;
//            $scope.medico = data.medico;
//            $scope.urlCitas = URL_BASE + 'medico/cita/' + $scope.medico.id;
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
            slotLabelFormat:"hh:mm a",
            dayClick: function (date, jsEvent, view) {
                console.log("dssdsd");
//                if (view.type == "month") {
//                    $('#calendar').fullCalendar("changeView", "agendaWeek");
//                    $('#calendar').fullCalendar('gotoDate', date);
//                } else {
//                    var element = jsEvent.target.outerHTML;
//                    element = element.substring(0, 3);
//                    var now = moment().format("DD/MM/YYYY HH:mm");
//
//                    if (date.format('DD/MM/YYYY HH:mm') > now) {
//                        if (element == "<td") {
//                            $scope.cita.fecha = date.format('DD/MM/YYYY');
//                            $scope.showFormAppointment($scope.cita.fecha, date.format('HH:mm a'));
//                        }
//                    }
//                }
            },
            //businessHours: data.horario_medico,
            //eventConstraint:'businessHours',
            editable: true,
            eventLimit: true,
            //businessHours:true,
//            minTime: "0:00:00",
//            maxTime: "06:00:00",
           // axisFormat: 'h(:mm)a',
//            timeFormat: {
//                agenda: 'hh:mm{ - hh:mm}'
//            },
            aspectRatio: 2,
            nowIndicator: true,
            slotDuration: '00:15:00',
            titleFormat: 'MMMM D YYYY',
            columnFormat: 'dddd',
            eventOverlap: false, // sobreponer eventos
            //fixedWeekCount:true,
            //weekNumbers: true,
           // timeFormat: 'HH:mm',
           // timeFormat: 'h(:mm)',
           
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
});




