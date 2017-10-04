agenda.controller("AppAgendaQuirofanoMedico", function ($scope, $http, $window, $timeout, $q, $interval) {

    /*
     * Inicializacion
     */

    $scope.init = function () {
        /*variables del formulario*/
        $scope.config = {
            defaultDate: $scope.fecha,
            defaultView: 'agendaWeek'
        };

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
//            dayClick: function (date, jsEvent, view) {
//                if (view.type == "month") {
//                    console.log("dssdsd");
//                    $('#calendar').fullCalendar("changeView", "agendaWeek");
//                    $('#calendar').fullCalendar('gotoDate', date);
//                } else {
//                    var element = jsEvent.target.outerHTML;
//                    element = element.substring(0, 3);
//                    console.log(element)
//                    var now = moment();
//                    if (date.isAfter(now) || date.format('DD/MM/YYYY HH:mm') > now.format('DD/MM/YYYY HH:mm')) {
//                        $scope.cita.fecha = date.format('DD/MM/YYYY');
//                        $scope.formCreate($scope.cita.fecha, date.format('HH:mm a'));
//                    }
//                }
//            },
            editable: true,
            eventLimit: true,
            aspectRatio: 2,
            nowIndicator: true,
            slotDuration: '00:15:00',
            titleFormat: 'MMMM D YYYY',
            columnFormat: 'dddd',
            eventOverlap: false,
            events: {
                url: URL_BASE + "medico/agenda/cirugia/events"
            },
            eventRender: function (event, element) {

                element.click(function () {
                    $scope.showCita(event);
                });
            },
            eventResize: function (event, delta, revertFunc) {
                revertFunc();
            },
            eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {
                revertFunc();
            }
        });
    };
    $scope.init();

    $scope.previewCita = function () {
        $("#agenda-list-citas").show();
        $("#panel-show-event").hide();

        $scope.startDateEdit = "";
        $scope.detailsCitas = "";
        $scope.detailsCitas = "";
        $scope.aesthesiologist = "";
        $scope.resident = "";
        $scope.salle = "";
        $scope.descripcion = "";
        $scope.process = "";
        try {
            $scope.$apply();
        } catch (err) {
            console.log(err);
        }
    };

    /*Modificar cuando el evento se mueve de fecho o se hala la hora*/

    $scope.showCita = function (cita) {
        $("#agenda-list-citas").hide();
        $("#panel-show-event").show();
        $scope.startDateEdit = cita.start.format('DD/MM/YYYY, H:mm');
        $scope.endDateEdit = cita.end.format('DD/MM/YYYY, H:mm');
        $scope.detailsCitas = cita.title;
        $scope.anesthesiologist = cita.anesteciologo.nombre + " " + cita.anesteciologo.apellido;
        $scope.resident = cita.residente.nombre + " " + cita.residente.apellido;
        $scope.salle = cita.quirofano.name;
        $scope.descripcion = cita.detalle_cita;
        $scope.process = cita.process;

        try {
            $scope.$apply();
        } catch (err) {
            console.log(err);
        }
    };
    /*cierre de modificar cuando el evento se mueve de fecho o se hala la hora*/

  $scope.reloadCalendarAutomatic = function () {
      //alert("JHJJ")
        $("#calendar").fullCalendar("refetchEvents");
    };

    //recargar calendario cada 2 minutos
    $interval(function () {
        $scope.reloadCalendarAutomatic();
    }, 20 * 1000);
});




