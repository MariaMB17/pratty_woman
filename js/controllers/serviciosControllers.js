//factoria para guardar y eliminar sesiones con sessionStorage
var urlEstudiantes= './index.php/estudiantes/';
var urlCursos_servicios = './index.php/cursos_servicios/';
var urlCronograma ='./index.php/cronograma_cursos/';
var urlCursos_cabecera = './index.php/cursos_cabecera/';
 
//factoria para loguear y desloguear usuarios en angularjs




app.factory("serviciosFactoria", function($http, $location, sesionesControl, mensajesFlash){
    return {      
        registroClientes : function(estudent){
             return $http({
                url: urlEstudiantes+'guardarStudent',
                method: "POST",
                data :  "cedula="+estudent.cedula+
                        "&apellidos="+estudent.apellidos+
                        "&nombres="+estudent.nombres+
                        "&telefono="+estudent.telefono+
                        "&direccion="+estudent.direccion+
                        "&email="+estudent.correo,
                        /*"&cursos="+estudent.curso+
                        "&costo="+estudent.costo+
                        "&fecha="+estudent.fecha+
                        "&disponible="+estudent.disponibilidad+
                        "&condicion_pago="+estudent.condicion_pago+
                        "&bancos="+estudent.bancos+
                        "&transaccion="+estudent.transaccion+
                        "&numero="+estudent.numero+
                        "&monto="+estudent.monto+
                        "&fecha_pago="+(estudent.fecha_pago).toISOString(),*/
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){                   
                    //si todo ha ido bien limpiamos los mensajes flash
                    mensajesFlash.clear();
                    //creamos la sesión con el email del usuario
                    cacheSession(user.email);
                    //mandamos a la home
                    // window.location.href="/woman/menu"; 
                }else if(data.respuesta == "incomplete_form"){
                    mensajesFlash.clear();
                    mensajesFlash.show("Todos los campos del formulario deben estar llenos");
                }else if(data.respuesta == "Exists"){
                    mensajesFlash.clear();
                    mensajesFlash.show("El email introducido ya existe en la bd.");
                }
            }).error(function(){
                mensajesFlash.clear();
                mensajesFlash.show("Ocurrio un error al Procesar los Datos");
                window.location.href="estudiantes#/estudiantes";
            })

        },         
    }
})

app.controller("serviciosController", function($scope, $location, sesionesControl,authUsers,serviciosFactoria,mensajesFlash){
    $scope.estudent = {};
    $scope.email = sesionesControl.get("email");
    
    
    
    $scope.atras = function(){
       window.location.href="./#/estudiantes";
    }
    $scope.modificar_datos = function(){
      window.location.href=("./#/estudiantes/modificar_datos");
    }

    $scope.reimrpimir_recibo = function() {
      window.location.href=("./#/estudiantes/reimprimir_recibos");
    }
    $scope.volver_inicio = function (){
      window.location.href="./#";
    }

    $scope.dateOptions = {        
        dateDisabled: disabled,        
        maxDate: new Date(2020, 5, 22),
        minDate: new Date(),
        startingDay: 1
    };
    //Para Cursos
    $scope.open2 = function() {
    $scope.popup2.opened = true;
    };
    $scope.popup2 = {
    opened: false
    };

    // para las reservaciones
    $scope.openReservacion = function() {
    $scope.popupReservacion.opened = true;
    };
    $scope.popupReservacion = {
    opened: false
    
    };
  // Disable weekend selection
    function disabled(data) {
        var date = data.date,
        mode = data.mode;
        return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
    }
    
    serviciosFactoria.bancos().success(function(data){
        $scope.listado_bancos=data;
    }) 

    $scope.guardar = function(estudent){
        $scope.estudent=estudent;
        if($scope.estudent==''){
           mensajesFlash.clear();
           mensajesFlash.show("Debe llenar todos los campos del formulario.");
        }else if($scope.estudent.monto == 0){
            mensajesFlash.clear();
            mensajesFlash.show("Debe cancelar la totalidad del curso o abonar.");
        }else{
        //alert('Form submitted with' + JSON.stringify(estudent));           
            serviciosFactoria.registroEstudiantes($scope.estudent).success(function(data){
                if(data.respuesta=="success"){
                  mensajesFlash.clear();
                  mensajesFlash.show("Los datos fueron Porcesados con éxito."); 
                  $scope.reset();
                }else if(data.respuesta=="existe"){
                  mensajesFlash.clear();
                  mensajesFlash.show("Su solicitud no puede ser procesada porque ya tiene inscrito el curso.");
                  $scope.reset();
                }else if(data.respuesta == "incomplete_form"){
                    mensajesFlash.clear();
                    mensajesFlash.show("Todos los campos del formulario deben estar llenos");
                }
            });  
        }
    }

   
  $scope.consultarCursos = function (){       
    $location.path("/estudiantes/consultar_cursos");
   }  
    $scope.reset = function(form) {
      $scope.estudent = {};
      $scope.cursosModificar = {};
      if (form) {
        form.$setPristine();
        form.$setUntouched();
      }
    }
    $scope.logout = function(){
        authUsers.logout();
    }
})


