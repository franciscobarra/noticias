'use strict';

angular.module('app.services', [])

/*  -----------------------------------------------------------------------
 *  PAIS API SERVICE    
 *  -----------------------------------------------------------------------
 */

.factory('paisApiService', function($http, servicesUrl){
    var paisApi = {}
    var url = servicesUrl.getBaseUrl() + 'pais.json'
    
    paisApi.getPaises = function() {
        return $http({
            method: 'GET',
            url: url
        })
    }
    
    return paisApi
})

/*  -----------------------------------------------------------------------
 *  ROL API SERVICE    
 *  -----------------------------------------------------------------------
 */

.factory('rolApiService', function($http, servicesUrl) {
    var rolApi = {}
    var url = servicesUrl.getBaseUrl() + 'roles.json'
    
    rolApi.getRoles = function() {
        return $http({
            method: 'GET',
            url: url
        })
    }
    
    return rolApi
})

/*  -----------------------------------------------------------------------
 *  USUARIOS API SERVICE    
 *  -----------------------------------------------------------------------
 */

.factory('usuariosApiService', function($http, servicesUrl){
    var usuarioApi = {}
    
    usuarioApi.getUsuarios = function() {
        var url = servicesUrl.getBaseUrl() + 'users.json'
        
        return $http({
            method: 'GET',
            url: url
        })
    }
    
    usuarioApi.getUsuario = function(id) {
        var url = servicesUrl.getBaseUrl() + 'users/' + id + '.json'
        
        return $http({
            method: 'GET',
            url: url
        })
    }
    
    usuarioApi.saveUsuario = function(data) {
        var url = servicesUrl.getBaseUrl() + 'users.json'
        
        return $http.post(url, data)
    }
    
    return usuarioApi
})



/* -----------------------------------------------------------------------
 * AUTHENTIFICATION SERVICE                                                          
 * -----------------------------------------------------------------------
 */

.constant('USER_ROLES', {
    all : '*',
    admin : 'admin',
    editor : 'editor',
    registrado : 'registrado',
    periodista : 'periodista'
})

.constant('AUTH_EVENTS', {
    loginSuccess : 'auth-login-success',
    loginFailed : 'auth-login-failed',
    logoutSuccess : 'auth-logout-success',
    sessionTimeout : 'auth-session-timeout',
    notAuthenticated : 'auth-not-authenticated',
    notAuthorized : 'auth-not-authorized'
})

.service('Session', function($cookieStore) {
    var session = {}
    session.user = null
    
    session.create = function(user) {
        session.user = user
        if(session.user == null) $cookieStore.remove('user')
        else $cookieStore.put('user', session.user)
    }
    
    session.destroy = function() {
        session.user = null
        $cookieStore.remove('user')
    }
    
    session.isAuth = function() {
        if(session.user == null) session.user = $cookieStore.get('user')
        
        return (session.user != null)
    }
    
    return session
})

.factory('AuthService', function($http, Session, servicesUrl, Base64) {
    var authService = {}
    
    authService.login = function(credentials) {
        var url = servicesUrl.getBaseUrl() + 'users/login.json'
        var username = credentials.username
        var password = credentials.password
        var user = {}
        
        $http
         .defaults
         .headers
         .common['Authorization'] 
         = 'Basic ' + Base64.encode(username + ':' + password)
    
        return $http
                .post(url)
                .then(function(response) {
                    user = {
                        id : response.data.user.id,
                        nombre : response.data.user.nombre,
                        apellido_pat : response.data.user.apellido_pat,
                        apellido_mat : response.data.user.apellido_mat,
                        fecha_ingreso : response.data.user.fecha_ingreso,
                        fecha_nacimiento : response.data.user.fecha_nacimiento,
                        rut : response.data.user.rut,
                        username : response.data.user.username,
                        pais : response.data.user.Pais.nombre,
                        rol : response.data.user.Roles.nombre
                    }
                
                    Session.create(user)
                })
    }
    
    authService.logout = function() {
        var url = servicesUrl.getBaseUrl() + 'users/logout.json'
        return $http
                .post(url)
                .then(function(response) {
                    $http.defaults.headers.common['Authorization'] = null
                    Session.destroy()
                }) 
        
    }
    
    authService.isAuthorized = function(authRoles) {
        if(!angular.isArray(authRoles)) {
            authRoles = [authRoles]
        }
        
        return (authService.isAuthenticated() &&
                authRoles.indexOf(Session.user.rol) !== -1)
    }
   
   return authService
}) 


/**
 * ---------------------------------------------------------------------
 * BASE64 ENCODER FACTORY
 * ---------------------------------------------------------------------
 */

.factory('Base64', function() {
    var keyStr = 'ABCDEFGHIJKLMNOP' +
            'QRSTUVWXYZabcdef' +
            'ghijklmnopqrstuv' +
            'wxyz0123456789+/' +
            '=';
    return {
        encode: function (input) {
            var output = "";
            var chr1, chr2, chr3 = "";
            var enc1, enc2, enc3, enc4 = "";
            var i = 0;

            do {
                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);

                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;

                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }

                output = output +
                        keyStr.charAt(enc1) +
                        keyStr.charAt(enc2) +
                        keyStr.charAt(enc3) +
                        keyStr.charAt(enc4);
                chr1 = chr2 = chr3 = "";
                enc1 = enc2 = enc3 = enc4 = "";
            } while (i < input.length);

            return output;
        },

        decode: function (input) {
            var output = "";
            var chr1, chr2, chr3 = "";
            var enc1, enc2, enc3, enc4 = "";
            var i = 0;

            // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
            var base64test = /[^A-Za-z0-9\+\/\=]/g;
            if (base64test.exec(input)) {
                alert("There were invalid base64 characters in the input text.\n" +
                        "Valid base64 characters are A-Z, a-z, 0-9, '+', '/',and '='\n" +
                        "Expect errors in decoding.");
            }
            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

            do {
                enc1 = keyStr.indexOf(input.charAt(i++));
                enc2 = keyStr.indexOf(input.charAt(i++));
                enc3 = keyStr.indexOf(input.charAt(i++));
                enc4 = keyStr.indexOf(input.charAt(i++));

                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;

                output = output + String.fromCharCode(chr1);

                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }

                chr1 = chr2 = chr3 = "";
                enc1 = enc2 = enc3 = enc4 = "";

            } while (i < input.length);

            return output;
        }
    };
})