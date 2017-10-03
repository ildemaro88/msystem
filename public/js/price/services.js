price.service('getElements', function($http){
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
