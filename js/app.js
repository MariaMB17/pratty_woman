/**
 * User: Maria Alvares
 * Date: 10/03/2016
 */
var app = angular.module("app", ['ui','ngRoute','ui.grid',
                                 'ui.bootstrap','ui.grid.pagination',
                                 'ui.grid.selection','ui.grid.cellNav']);

//damos configuración de ruteo a nuestro sistema de login
app.config(function($routeProvider){
    $routeProvider.when("/", {
        controller : "loginController",
        templateUrl : "templates/login.php"
    })
    .when("/menu", {
        controller : "menuController",
        templateUrl : "templates/menu.php"
    })
     .when("/estudiantes", { 
        controller : "estudiantesController",       
        templateUrl : "templates/estudiantes/formularioEstudiantes.php"
    })
     .when("/estudiantes/consultar_cursos", { 
        controller : "estudiantesController",       
        templateUrl : "templates/estudiantes/consultar_cursos.php"
    })
   .when("/estudiantes/modificar_datos", { 
        controller : "estudiantesController",       
        templateUrl : "templates/estudiantes/modificar_datos.php"
    })
   .when("/reservaciones",{
        controller : "estudiantesController",       
        templateUrl : "templates/estudiantes/formularioReservaciones.php"
   })
   .when("/estudiantes/reimprimir_recibos", { 
        controller : "estudiantesController",       
        templateUrl : "templates/estudiantes/reimprimir_recibo.php"
    })
   .when("/estudiantes/subir_bajarClases", { 
        controller : "estudiantesController",       
        templateUrl : "templates/estudiantes/reimprimir_recibo.php"
    })
   
   //.otherwise({ reditrectTo : "/" });    
});