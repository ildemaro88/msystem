var agendaQuirofano = angular.module("AppAgendaQuirofano",[], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

//agenda.constant('API_URL','htpp://localhost/MedicSystem/public/admin');