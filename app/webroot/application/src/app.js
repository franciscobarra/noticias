'use strict';

angular.module('app', [
    'app.controllers',
    'app.services',
    'mm.foundation',
    'ngRoute',
    'ngCookies'
])

/* -----------------------------------------------------------------------
 * REST URL SERVICES
 * -----------------------------------------------------------------------
 */

.service('servicesUrl', function($location){
    this.getBaseUrl = function() {
        return 'http://localhost:8080/beta_master/'
    }
    
    return this
})