var app = angular.module('e-shop', []);

app.config(['$httpProvider', '$interpolateProvider', function ($httpProvider, $interpolateProvider) {

    $interpolateProvider.startSymbol('<%').endSymbol('%>');

    $httpProvider.defaults.headers.common['Accept'] = "application/json";
    $httpProvider.defaults.headers.common['Content-Type'] = "application/json";
    $httpProvider.defaults.useXDomain = true;
    $httpProvider.interceptors.push('httpInterceptor');

}]);

app.factory('httpInterceptor', ['$q', '$rootScope',
    function ($q, $rootScope) {
        var loadingCount = 0;

        return {
            request: function (config) {
                if (++loadingCount === 1) {
                    Pace.restart();
                    $rootScope.$broadcast('loading:progress');
                }
                return config || $q.when(config);
            },

            response: function (response) {
                if (--loadingCount === 0) $rootScope.$broadcast('loading:finish');
                return response || $q.when(response);
            },

            responseError: function (response) {
                if (--loadingCount === 0) $rootScope.$broadcast('loading:finish');
                return $q.reject(response);
            }
        };
    }
]);

window.addEventListener('unload', function (event) {
    var subscriptionId = localStorage.getItem('push_subscription') || '';
    $.ajax({
        type: "POST",
        url: '/notifications/subscribe',
        data: { 'subscriptionId': subscriptionId }
    });
});