agenda.service('searchAutocomplet', function($http){
         
    /*busar pacientes y seleccionarlo*/
        this.search = function (urlSearch) {
            var url = urlSearch;
            return $http({
                url: url,
                method: 'GET',
                //data: data,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function success(response) {
                  return response.data.response;
               // this.returnResults(this.searchResult);
            });

        }
     this.returnResults = function (results) {
      return  this.searchResult;
     }
    /*cierre busar pacientes y seleccionarlo*/
});