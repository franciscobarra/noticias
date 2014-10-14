'use strict';

angular.module('app.controllers', [
    'ngRoute'
])

.config(['$routeProvider', function($routeProvider) {
    $routeProvider
    .when('/test-logout', { templateUrl : 'src/view/test/test_logout.html', controller : 'testLogout' })
    .when('/test-session', { templateUrl: 'src/view/test/test_session.html', controller : 'testSession' })
    .when('/test-var-session', { templateUrl: 'src/view/test/test_session.html', controller : 'testVarSession'})
}])

.controller('testLogout', function($scope, AuthService) {
    AuthService.logout()
})

.controller('testSession', function($scope, AuthService, Session) {
    var credentials = { username : 'andres', password : '12345' }
    
    AuthService.login(credentials)
    
})

.controller('testVarSession', function($scope, Session) {
    if(Session.isAuth()) {
        $scope.currentUser = {
            id : Session.user.id,
            name : Session.user.name,
            apellido_pat : Session.user.apellido_pat,
            apellido_mat : Session.user.apellido_mat
        }
    }
})