var price = angular.module('MyAppPrice', [], function ($interpolateProvider)
{
 $interpolateProvider.startSymbol('[[');
 $interpolateProvider.endSymbol(']]');
});
