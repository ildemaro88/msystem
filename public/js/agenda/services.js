agenda.service('searchAutocomplet', function($http){
         
    /*busar pacientes y seleccionarlo*/
        this.search = function (url) {
            return $http({
                url: url,
                method: 'GET',
                //data: data,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function success(response) {
                  return response.data.response;
            });

        }
});

agenda.service('getElements', function($http){
        this.getQuery = function (url) {
            return $http({
                url: url,
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function success(response) {
                  return response.data.response;
            });

        }
});

agenda.directive('mySlider', function () {
        return {
            restrict: 'E',
            template: '<rzslider rz-slider-model="model" rz-slider-options="sliderOptions"></rzslider>',
            scope: {},
            controller: MySliderCtrl,
            controllerAs: 'vm',
            bindToController: {
                model: '=myModel',
                onChange: '&onChange'
            }
        }
    })