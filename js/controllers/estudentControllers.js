//factoria para guardar y eliminar sesiones con sessionStorage
var urlEstudiantes= './index.php/estudiantes/';
var urlCursos_servicios = './index.php/cursos_servicios/';
var urlCronograma ='./index.php/cronograma_cursos/';
var urlCursos_cabecera = './index.php/cursos_cabecera/';
 
//factoria para loguear y desloguear usuarios en angularjs




app.factory("estudiantesFactoria", function($http, $location, sesionesControl, mensajesFlash){
    return {
        buscarEstudiante : function(cedula){
            return $http({
                url: urlEstudiantes+'estudianteCI/'+cedula,
                method: "GET",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                mensajesFlash.clear();
            }).error(function(data){
                mensajesFlash.clear();
                mensajesFlash.show("No esta registrado.");
                //$location.path("/")
            })
        },
        registroEstudiantes : function(estudent){
             return $http({
                url: urlEstudiantes+'guardarStudent',
                method: "POST",
                data :  "cedula="+estudent.cedula+
                        "&apellidos="+estudent.apellidos+
                        "&nombres="+estudent.nombres+
                        "&telefono="+estudent.telefono+
                        "&direccion="+estudent.direccion+
                        "&email="+estudent.correo+
                        "&cursos="+estudent.curso+
                        "&costo="+estudent.costo+
                        "&fecha="+estudent.fecha+
                        "&disponible="+estudent.disponibilidad+
                        "&condicion_pago="+estudent.condicion_pago+
                        "&bancos="+estudent.bancos+
                        "&transaccion="+estudent.transaccion+
                        "&numero="+estudent.numero+
                        "&monto="+estudent.monto+
                        "&fecha_pago="+(estudent.fecha_pago).toISOString()+
                        "&fecha_servicio="+(estudent.fecha_reservacion).toISOString()+
                        "&servicios="+(estudent.curso).substring(6,5)+
                        "&id_cronograma="+(estudent.horas).substring(0,5),
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
                window.location.href="./#/estudiantes";
            })

        },
        modificarEstudiantes : function(estudent){
             return $http({
                url: urlEstudiantes+'update',
                method: "POST",
                data :  "cedula="+estudent.cedula+
                        "&apellidos="+estudent.apellidos+
                        "&nombres="+estudent.nombres+
                        "&telefono="+estudent.telefono+
                        "&direccion="+estudent.direccion+
                        "&email="+estudent.correo,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).error(function(){
                mensajesFlash.clear();
                mensajesFlash.show("Ocurrio un error al Procesar los Datos");
                window.location.href="estudiantes#/estudiantes";
            })

        },
        modificar_curos : function(cursosModificar){
             return $http({
                url: urlEstudiantes+'modificar_cursos_estudiante',
                method: "POST",
                data :  "cedula="+cursosModificar.cedula+
                        "&numero_curso="+cursosModificar.numero+
                        "&curso="+cursosModificar.curso+
                        "&costo="+cursosModificar.costo+
                        "&cambiar_curso="+cursosModificar.curso_cambiar+
                        "&cambiar_servicio="+cursosModificar.servicio_cambiar+
                        "&costo_1="+cursosModificar.costo_1+
                        "&fecha_curso="+cursosModificar.fecha+
                        "&fecha_servicio="+(cursosModificar.fecha_reservacion).toISOString()+
                        "&disponible="+cursosModificar.disponibilidad+
                        "&hora="+cursosModificar.horas+
                        "&condicion_pago="+cursosModificar.condicion_pago+
                        "&bancos="+cursosModificar.bancos+
                        "&transaccion="+cursosModificar.transaccion+
                        "&numero_transaccion="+cursosModificar.numero_transaccion+
                        "&monto="+cursosModificar.monto+
                        "&fecha_pago="+(cursosModificar.fecha_pago).toISOString()+
                        "&id_curso="+cursosModificar.id_curso+
                        "&abono="+cursosModificar.abono+
                        "&id_detalles="+cursosModificar.id_detalles+
                        "&id_cronograma="+(cursosModificar.horas).substring(0,5),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){                   
                    //si todo ha ido bien limpiamos los mensajes flash
                    mensajesFlash.clear();
                    //creamos la sesión con el email del usuario
                    cacheSession(user.email);
                    //mandamos a la home
                    // window.location.href="/woman/menu"; 
                }else if(data.respuesta == "Formulario_incompleto"){
                    mensajesFlash.clear();
                    mensajesFlash.show("Todos los campos del formulario deben estar llenos");
                }else if(data.respuesta == "false"){
                    mensajesFlash.clear();
                    mensajesFlash.show("Los datos fueron actualizados con éxito.");
                }
            }).error(function(){
                mensajesFlash.clear();
                mensajesFlash.show("Ocurrio un error al Procesar los Datos");
                window.location.href="estudiantes#/estudiantes";
            })
        },
        curos_servicios : function(){
            return $http({
                url:urlCursos_servicios+'services_cursos',
                method:"POST",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                mensajesFlash.clear();
            }).error(function(){
                mensajesFlash.clear();
                mensajesFlash.show("Error al procesar la información");
                $location.path("/")
            })
        },
        disponibilidad_cursos : function (cursos_id){
            return $http({
                url: urlCronograma + 'cursos_cronograma/' + cursos_id,
                method:"POST",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                mensajesFlash.clear();
            }).error(function(){
                mensajesFlash.clear();
                mensajesFlash.show("No hay cupos disponibles para el curso seleccionado");
                $location.path("/")
            })
        },
        disponibilidad_cursos_horas : function (cursos_id,fecha,codigo_servicio){
            return $http({
                url: urlCronograma + 'cursos_cronograma_horas/' + cursos_id + '/' +fecha+'/'+codigo_servicio,
                method:"POST",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                mensajesFlash.clear();
            }).error(function(){
                mensajesFlash.clear();
                mensajesFlash.show("No hay cupos disponibles para el curso seleccionado");
                $location.path("/")
            })
        },
        buscar_cursos_estudiantes : function (cedula){
             return $http({
                url: urlCursos_servicios+ 'listado_estudiantes/' + cedula,
                method:"POST",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
        },
        buscar_recibos_ci : function (cedula){
             return $http({
                url: urlCursos_cabecera+ 'buscar_ci/' + cedula,
                method:"POST",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
        },
        bancos : function(){
            return $http({
                url: urlEstudiantes + 'listado_bancos',
                method:"POST",
                headers:{'Content-Type':'application/x-www-form-urlencoded'}
            }).success(function(data){
                mensajesFlash.clear();
            }).error(function(){
                mensajesFlash.clear();
                mensajesFlash.show("");
                $location.path("/")
            })
        },
        reimprimir_rcbo : function(cedula,recibo_n){
            return $http({
                url: urlEstudiantes + 'imprimir/' + cedula + '/' + recibo_n,
                method: "GET",
                headers:{'Content-Type': 'application/x-www-form-urlencoded'} 
            })

        }  
    }
})

app.controller("estudiantesController", function($scope, $location, sesionesControl,authUsers,estudiantesFactoria,mensajesFlash){
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
    
    estudiantesFactoria.bancos().success(function(data){
        
        $scope.listado_bancos=data;
    })    

    estudiantesFactoria.curos_servicios().success(function(data){
        //console.log(data.length);
        if(data.length > 0){
        $scope.listadoServices_cursos=data;
        //console.log($scope.listadoServices_cursos[0]['id']);
        }
    });
    
    $scope.modificar_estudiante = function (estudent){
      $scope.estudent=estudent;
     estudiantesFactoria.modificarEstudiantes($scope.estudent).success(function(data){
        if(data.respuesta == 1){
            mensajesFlash.clear();
            mensajesFlash.show("los datos fueron procesados con éxito");
            $scope.reset();
        }else if(data.respuesta == 2){
            mensajesFlash.clear();
            mensajesFlash.show("El formulario no puede estar incompleto");
        }else{
            mensajesFlash.clear();
            mensajesFlash.show("Ocurrio un error al procesar los datos, por favot vuelva a intentarlo");
            $scope.reset();
        }
            });   
    }
    $scope.selectEstuidante = function() {
        estudiantesFactoria.buscarEstudiante($scope.estudent.cedula).success(function(data){
            if(data.respuesta==1){
               $scope.cedula = $scope.estudent.cedula;
               $scope.reset();
               $scope.estudent.cedula = $scope.cedula;
               mensajesFlash.clear();
               mensajesFlash.show("No esta registrado debe llenar el formulario.");
            }else{
                $scope.estudiantes=data;
                $scope.estudent.apellidos=$scope.estudiantes[0]['apellidos'];
                $scope.estudent.nombres=$scope.estudiantes[0]['nombres'];
                $scope.estudent.telefono=$scope.estudiantes[0]['telefono'];
                $scope.estudent.direccion=$scope.estudiantes[0]['direccion'];
                $scope.estudent.correo=$scope.estudiantes[0]['correo'];
            }
        })
    };

    $scope.selectAction = function() {
    
    if($scope.estudent.curso!= null){
      $scope.estudent.costo=($scope.estudent.curso).substring(6);
      
      if(($scope.estudent.curso).substring(6,5)==1){
        $scope.estudent.fecha_reservacion = new Date();
      }
      estudiantesFactoria.disponibilidad_cursos(($scope.estudent.curso).substring(0,5)).success(function(data){       
        if(data.length==0){
          $scope.listado_cronograma="";
        }else{
        $scope.listado_cronograma=data;
        }              
      }); 

    }else if($scope.cursosModificar.curso!= null){
      if($scope.cursosModificar.codigo_curso_servicio==1){
        if($scope.cursosModificar.curso_cambiar!= null){
           $scope.cursosModificar.curso_1=$scope.cursosModificar.curso_cambiar;
        }else {
            $scope.cursosModificar.curso_1=$scope.cursosModificar.servicio_cambiar;
        }        
        $scope.cursosModificar.fecha_reservacion = new Date();
      }else{
        if($scope.cursosModificar.servicio_cambiar!= null){
            $scope.cursosModificar.curso_1=$scope.cursosModificar.servicio_cambiar;
        }else {
            $scope.cursosModificar.curso_1=$scope.cursosModificar.curso_cambiar;
        }
         
      }

      $scope.cursosModificar.costo_1=($scope.cursosModificar.curso_1).substring(6);
      estudiantesFactoria.disponibilidad_cursos(($scope.cursosModificar.curso_1).substring(0,5)).success(function(data){
        $scope.listado_cronograma=data;
      });
    }
       
    }
     
    $scope.selectDisponibilidad = function(){
        
        if($scope.estudent.curso!= null){
             $scope.curso_services = ($scope.estudent.curso).substring(0,5);
             $scope.codigo_servicio = ($scope.estudent.curso).substring(6,5);
             if($scope.codigo_servicio==2){
                $scope.fecha = (($scope.estudent.fecha_reservacion).toISOString()).substring(0,10);
             }else{
               $scope.fecha = $scope.estudent.fecha;
             }     
        }else if($scope.cursosModificar.curso!= null){
           
            
            if($scope.cursosModificar.codigo_curso_servicio==1){

              if($scope.cursosModificar.curso_cambiar!=null){
                $scope.codigo_servicio = $scope.cursosModificar.codigo_curso_servicio;
                $scope.cursosModificar.curso_1=$scope.cursosModificar.curso_cambiar; 
                $scope.fecha = $scope.cursosModificar.fecha;
              }else{
                 $scope.cursosModificar.curso_1=$scope.cursosModificar.servicio_cambiar;
                 $scope.cursosModificar.curso_cambiar=2;
                 $scope.codigo_servicio = 2;
                 $scope.fecha = (($scope.cursosModificar.fecha_reservacion).toISOString()).substring(0,10);
              }
               
              $scope.curso_services = ($scope.cursosModificar.curso_1).substring(0,5);
              
          }else{

            if($scope.cursosModificar.servicio_cambiar!=null){
                $scope.codigo_servicio = $scope.cursosModificar.codigo_curso_servicio;
                $scope.cursosModificar.curso_1=$scope.cursosModificar.servicio_cambiar;
                $scope.fecha = (($scope.cursosModificar.fecha_reservacion).toISOString()).substring(0,10);
              }else{
                 $scope.cursosModificar.curso_1=$scope.cursosModificar.curso_cambiar;
                 $scope.cursosModificar.servicio_cambiar=1;
                 $scope.codigo_servicio = 1 ;
                 $scope.fecha = $scope.cursosModificar.fecha;
              }
             
                $scope.curso_services = ($scope.cursosModificar.curso_1).substring(0,5);
          }
        }  

         

       estudiantesFactoria.disponibilidad_cursos_horas($scope.curso_services,$scope.fecha,$scope.codigo_servicio).success(function(data){  
                      
             if(data.length==0){
                $scope.horas_disponibles = "";
             }else{
                $scope.horas_disponibles = data;
             }    
          
        });
    }
        $scope.selectDisponibilidad_horas = function(){
            if($scope.estudent.curso!= null){
                $scope.codigo_servicio = ($scope.estudent.curso).substring(6,5);
                if($scope.estudent.horas!=null){
                   if($scope.codigo_servicio==2){
                    $scope.estudent.disponibilidad=99;
                   }else{
                    $scope.estudent.disponibilidad=($scope.estudent.horas).substring(13);
                   }
                }
            }else if($scope.cursosModificar.curso!= null){
                if($scope.cursosModificar.codigo_curso_servicio==1){
                  if($scope.cursosModificar.curso_cambiar!=null){
                    $scope.cursosModificar.curso_1=$scope.cursosModificar.curso_cambiar; 
                    $scope.cursosModificar.disponibilidad=($scope.cursosModificar.horas).substring(13); 
                  }else{
                    $scope.cursosModificar.curso_1=$scope.cursosModificar.servicio_cambiar;
                    $scope.cursosModificar.disponibilidad=99;
                  }
                                  
                }else{
                    if($scope.cursosModificar.servicio_cambiar!=null){
                        $scope.cursosModificar.curso_1=$scope.cursosModificar.servicio_cambiar;
                        $scope.cursosModificar.disponibilidad=($scope.cursosModificar.horas).substring(13);                          
                    }else{
                       $scope.cursosModificar.curso_1=$scope.cursosModificar.curso_cambiar; 
                       $scope.cursosModificar.disponibilidad=99;                        
                    }                 
                }
            }
        }
     /* if($scope.estudent.fecha!=null){
        
      } else if($scope.cursosModificar.fecha!=null){
        $scope.cursosModificar.disponibilidad=($scope.cursosModificar.fecha).substring(1);
      }*/
    

    $scope.seleccionarMonto = function(){
      if($scope.estudent.condicion_pago!=null){
        if($scope.estudent.condicion_pago=="Pago Total"){
            $scope.estudent.monto = $scope.estudent.costo;
        }else{
            $scope.estudent.monto = (($scope.estudent.costo)*30)/100;
        }
      }else if($scope.estudent.condicion_pago!=null){
        $scope.estudent.monto = $scope.estudent.costo-$scope.cursosModificar.abono;
      }
    }

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
            estudiantesFactoria.registroEstudiantes($scope.estudent).success(function(data){
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

    $scope.gridOptions = {
      columnDefs: [
        { field: 'numero', displayName:'N',width:'1%',visible:false},
        { field: 'id_c', displayName:'id_C',width:'1%',visible:false },
        { field: 'descripcion', displayName:'Curso/Servicios',width:'28%'},
        { field: 'id_cr', displayName:'Id cr',enableSorting: false,visible:false  },
        { field: 'fecha_del_curso', displayName:'Fecha Inicio',enableSorting: false },
        { field: 'hora_inicio', displayName:'Hora Inicio'},
        { field: 'costo', displayName:'Costo'},
        { field: 'Abono', displayName:'Abono'},
        { field: 'Faltante', displayName:'Faltante'},
        { field: 'codigo_curso_servicio',displayName:'Cod',width:'1%',visible:true},
        { field: 'id_cronograma', displayName:'cronograma',width:'1%',visible:false},
        { field: 'Accion', displayName:'Acción',cellTemplate:'<button class="accion" ng-click="grid.appScope.modificarAbono(row)">Modificar</button>' }
      ]
    };

    $scope.grid = function(cedula_1){
       estudiantesFactoria.buscar_cursos_estudiantes(cedula_1).success(function(data){         
        if(data.respuesta != 1){
            mensajesFlash.clear();
            $scope.myData= data;

            $scope.gridOptions = {};  
              $scope.gridOptions = {
                enableSorting: true,
                enableRowSelection: true,
                enableFullRowSelection: true,
                multiSelect: true,
                enableRowHeaderSelection: false,
                enableColumnMenus: false,
                enableFiltering: true,
                minRowsToShow: $scope.myData.length+1,
                enableScrollbars:true,

                columnDefs: [
                  { field: 'cedula', displayName:'N',width:'1%',visible:false},
                  { field: 'id_detalles', displayName:'N',width:'1%',visible:false},
                  { field: 'numero', displayName:'N',width:'1%',visible:false},
                  { field: 'id_c', displayName:'id_C',width:'1%',visible:false },
                  { field: 'descripcion', displayName:'Curso',width:'40%'},
                  { field: 'id_cr', displayName:'Id cr',enableSorting: false,visible:false  },
                  { field: 'fecha_del_curso', displayName:'Fecha Inicio',enableSorting: false },
                  { field: 'hora_inicio', displayName:'Hora Inicio'},
                  { field: 'costo', displayName:'Costo'},
                  { field: 'Abono', displayName:'Abono'},
                  { field: 'Faltante', displayName:'Faltante'},
                  { field: 'codigo_curso_servicio',displayName:'Cod',width:'1%',visible:false},
                  { field: 'id_cronograma',displayName:'cronograma',width:'1%',visible:false},
                  { field: 'Accion', displayName:'Acción',cellTemplate:'<button class="accion" ng-click="grid.appScope.modificarAbono(row)">Modificar</button>' }
                ],
    
              };
            $scope.gridOptions.data =$scope.myData;  
           
        }else{
            mensajesFlash.clear();
            mensajesFlash.show("No tiene cursos Inscritos."); 
        }
    });
  }
   $scope.buscar = function(){
    $scope.cursosModificar = {};
    $scope.mostrar = {show: false};
    $scope.mostrarFormulario = {show:false}; 
    $scope.cambiarCursos = {show:false}; 
    $scope.visible_curso = {show:false};
    $scope.visible_servicio = {show:false}; 
    $scope.mostrar_capa = {show:true} ;
    $scope.costo = {show:false};
    $scope.fecha_hora = {show:false};
    $scope.visible = {show:true};
    $scope.checkbox='checked';
    $scope.checkbox_cursos = 'checked';
    $scope.checkbox_servicios = 'checked';
  
      $scope.toggle = function () {
        $scope.visible.show = !$scope.visible.show;
        $scope.cambiarCursos.show = !$scope.cambiarCursos.show;
        $scope.visible_curso.show = $scope.visible_curso;
        $scope.visible_servicio.show = $scope.visible_servicio;
        $scope.mostrar_capa = {show:false} ;

        $scope.toggle_cursos = function (){
            
            $scope.checkbox_servicios = '';
            $scope.cursosMostrar = {show:true};
            $scope.serviciosMostrar = {show:false};
            $scope.cursosFechas = {show:true};
            $scope.cursosServicios = {show:false};
            $scope.disponibilidadMostrar = {show:true};
            $scope.mostrar_capa.show = $scope.mostrar_capa;
            $scope.costo.show = $scope.costo;
            $scope.fecha_hora.show = $scope.fecha_hora;
            $scope.checkbox='checked';
        }
        $scope.toggle_servicios = function (){
        
              $scope.checkbox_cursos = '';
              $scope.cursosMostrar = {show:false};
              $scope.serviciosMostrar = {show:true};
              $scope.cursosServicios = {show:true};
              $scope.cursosFechas = {show:false};
              $scope.disponibilidadMostrar = {show:false};
              $scope.mostrar_capa.show = $scope.mostrar_capa;
              $scope.costo.show = $scope.costo;
              $scope.fecha_hora.show = $scope.fecha_hora;
              $scope.checkbox='checked';
        }

        if($scope.servicio_curso==1){
          
        }else{
          
        }
        $scope.cursosModificar.curso_1="u";
        $scope.cursosModificar.costo_1="undefined";
        $scope.cursosModificar.disponibilidad="undefined";
      };

        estudiantesFactoria.buscarEstudiante($scope.estudent.cedula).success(function(data){
            if(data.respuesta==1){
               $scope.cedula = $scope.estudent.cedula;
               $scope.reset();
               $scope.estudent.cedula = $scope.cedula;
               mensajesFlash.clear();
               mensajesFlash.show("No tiene Cursos inscritos.");
            }else{
                $scope.estudiantes=data;
                $scope.estudent.apellidos=$scope.estudiantes[0]['apellidos'];
                $scope.estudent.nombres=$scope.estudiantes[0]['nombres'];
                $scope.estudent.telefono=$scope.estudiantes[0]['telefono'];
                $scope.estudent.direccion=$scope.estudiantes[0]['direccion'];
                $scope.estudent.correo=$scope.estudiantes[0]['correo'];
            }
        })

       
//Funcion para modificar el monto abonado por el estudiante. (Click sobre el grid)        
        $scope.modificarAbono = function(row){
          if(row.entity.Faltante <= 0){
              $scope.mostrarFormulario = {show:false}; 
              $scope.mostrar.show = !$scope.mostrar.show;
              $scope.mensaje="El curso ya fue Cancelado.";
          }else {
          $scope.cursosModificar = {};
          $scope.mostrar = {show: false};
          $scope.mostrarFormulario.show = !$scope.mostrarFormulario.show;          
          $scope.cursosModificar.cedula = row.entity.cedula;
          $scope.cursosModificar.numero = row.entity.numero; 
          $scope.cursosModificar.id_curso = row.entity.id_c; 
          $scope.cursosModificar.curso = row.entity.descripcion;
          $scope.cursosModificar.costo = row.entity.costo;
          $scope.cursosModificar.fecha = row.entity.id_cr;
          $scope.cursosModificar.monto = row.entity.Faltante;
          $scope.cursosModificar.faltante = row.entity.Faltante;
          $scope.cursosModificar.abono = row.entity.Abono;
          $scope.cursosModificar.id_detalles = row.entity.id_detalles;
          $scope.cursosModificar.codigo_curso_servicio = row.entity.codigo_curso_servicio;
          $scope.cursosModificar.codigo_cronograma = row.entity.id_cronograma;
          }
        }; 

//Monstrar datos del estudiante en el grid.

    $scope.grid($scope.estudent.cedula);

// modificar abonos de los cursos en la base de datos

  $scope.cursos_abono = function(cursosModificar) {
  
    if($scope.cursosModificar.horas==null){
        $scope.cursosModificar.horas=$scope.cursosModificar.codigo_cronograma;
    } 
   
    if(($scope.cursosModificar.monto == $scope.cursosModificar.faltante) && cursosModificar.condicion_pago == "Abonar"){
      $scope.mensaje_monto = "Por favor cambie el Monto a pagar si va Abonar";
    }else if($scope.cursosModificar.monto > $scope.cursosModificar.faltante){
      $scope.mensaje_monto = "El monto a pagar no debe ser mayor a (" + $scope.cursosModificar.faltante + ")";
    }else{
      $scope.cursosModificar.fecha_reservacion=new Date();
      $scope.cursosModificar=cursosModificar;
        estudiantesFactoria.modificar_curos($scope.cursosModificar).success(function(data){
        $scope.grid($scope.cursosModificar.cedula);
        $scope.mensaje_monto = "Los datos fuerón procesados con éxito.";
        $scope.reset();      
      });
    }
  }

}

// BUSCAR RECIBOS PARA REIMPRIMIRLOS ..................

    $scope.gridReimprimir_recibos = {
        columnDefs: [                    
            { field: 'id', displayName:'N'},
            { field: 'fecha', displayName:'Fecha'},
            { field: 'total', displayName:'Total'},
            { field: 'status', displayName:'Estado'},
            { field: 'Accion', displayName:'Acción',cellTemplate:'<button class="accion" ng-click="grid.appScope.reimprimir(row)">Imprimir</button>' }
        ]
    };
    
    $scope.gridRecibos = function (cedula_1){
            
        estudiantesFactoria.buscar_recibos_ci($scope.estudent.cedula).success(function(data){            
            if(data!=0){
                mensajesFlash.clear();
                $scope.dataRecibos= data;
                $scope.gridReimprimir_recibos = {};
                
                $scope.dataRecibos.apellidos=$scope.dataRecibos[0]['apellidos'];
                $scope.dataRecibos.nombres=$scope.dataRecibos[0]['nombres'];
                $scope.dataRecibos.telefono=$scope.dataRecibos[0]['telefono'];
                $scope.dataRecibos.direccion=$scope.dataRecibos[0]['direccion'];
                $scope.dataRecibos.correo=$scope.dataRecibos[0]['correo'];

                $scope.gridReimprimir_recibos = {
                    enableSorting: true,
                    enableRowSelection: true,
                    enableFullRowSelection: true,
                    multiSelect: true,
                    enableRowHeaderSelection: false,
                    enableColumnMenus: false,
                    enableFiltering: true,
                    minRowsToShow: $scope.dataRecibos.length+1,
                    enableScrollbars:false,
                    columnDefs: [
                        { field: 'id', displayName:'N'},
                        { field: 'fecha', displayName:'Fecha'},
                        { field: 'total', displayName:'Total'},
                        { field: 'status', displayName:'Estado'},
                        { field: 'Accion', displayName:'Acción',cellTemplate:'<button class="accion" ng-click="grid.appScope.reimprimir(row)">Imprimir</button>' }
                    ],
                };                    
            $scope.gridReimprimir_recibos.data =$scope.dataRecibos;     

            }else {
                $scope.dataRecibos="";
                $scope.gridReimprimir_recibos.data=$scope.dataRecibos;
                mensajesFlash.clear();
                mensajesFlash.show("No tiene recibos para consultar");
                      
            }
        })
    }

    $scope.buscar_recibos_ci = function (){        
        $scope.gridRecibos($scope.estudent.cedula);        
         //$scope.gridRecibos($scope.estudent.cedula);
    }
 
   $scope.reimprimir = function (row){
        estudiantesFactoria.reimprimir_rcbo($scope.estudent.cedula,row.entity.id).success(function(data){
            mensajesFlash.clear();
            mensajesFlash.show("El recibo fue enviado a su correo:");

        })
        
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


