'use strict';

angular.module('app', [
    'app.controllers',
    'app.services',
    'mm.foundation',
    'ngRoute',
    'ngCookies'
])

.controller('applicationController', function($scope, 
                                              USER_ROLES,
                                              AuthService) {
    
    $scope.currentUser = null
    $scope.userRoles = USER_ROLES
    $scope.isAuthorized = AuthService.isAuthorized
    
    $scope.setCurrentUser = function(user) {
        $scope.currentUser = user
    }
    
})

/* ------------------------------------------------------------------------
 * SERVICES URL 
 * ------------------------------------------------------------------------
 */

.service('servicesUrl', function($location){
    this.getBaseUrl = function() {
        return 'http://localhost:8080/beta_master/'
    }
    
    return this
})



