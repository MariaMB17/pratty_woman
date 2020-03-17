

<div id="cuadro-estudiantes">
  <div class="container-fluid">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3 id="h3">Bienvenido (a):  {{ email }}</h3>
      <div ng-show="flash">
        <div data-alert class="alert-box alert round">{{ flash }}</div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="menu">
      <ul>
        <li class="nivel1"><img src="css/images/icono_menu.png" alt="belleza">
          <!--[if lte IE 6]><a href="#" class="nivel1ie"><table class="falsa"><tr><td><![endif]-->
          <ul>
            <li><a class="primera" ng-click="modificar_datos()">Modificar datos Personales</a></li>
            <li><a ng-click="consultarCursos()">Consultar Cursos Inscritos</a></li>
            <li><a ng-click="reimrpimir_recibo()">Reimprimir Recibo Pago</a></li>
            <li><a ng-click="atras()">Atras</a></li>
            <li><a ng-click="volver_inicio()">Volver al Inicio</a></li>
            <li><a ng-click="logout()">Cerrar Sesion</a></li>
          </ul>
          <!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li>
      </ul>
    </div>
  </div>
 
  <div class="cuadro-cursosM wow fadeIn">
    <div class="container-fluid" style="padding:0%;">
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" >
        <label>Cédula</label>
        <input type="text" id="caja_texto" 
          name="cedula_1" placeholder="Introduzca la cédula"
          ng-model="estudent.cedula"
          ng-required="true">
      </div>                            
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" ><br>
        <button id="modificar_cursos" ng-click="buscar()">buscar</button>
      </div>      
    </div>
    <div class="container-fluid" style="padding:0%;">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
        <label>{{estudent.apellidos}}</label>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
        <label>{{estudent.nombres}}</label>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
        <label>{{estudent.telefono}}</label>
      </div>
    </div> <br>
    <div class="container-fluid" style="padding:0%;">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
        <label>{{estudent.telefono}}</label>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
        <label>{{estudent.correo}}</label>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" >
        <label>{{estudent.direccion}}</label>
      </div>
    </div> <br>
    <!-- <pre>Selected date is: <em>{{gridOptions}}</em></pre> -->
   <div class="container-fluid" style="padding:0%;">
      <div class="mensaje" ng-show="mostrar.show">
        <p>{{mensaje}}</p>
      </div>
      <form id="formulario-cursos" name="formulario_cursos" ng-show="mostrarFormulario.show" novalidate >
        <fieldset>
          <legend>Procesar Pago definitivo o cambiar Curso</legend>
            <div class="row">
              <pre>Selected date is: <em>{{cursosModificar | date:'fullDate' }}</em></pre>
              <div class="container-fluid" style="padding:0%;">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" >
                  <label>Seleccione si desea Cambiar de Curso o Servicio
                    <input id="cheq" type="checkbox" ng-model="checkbox" ng-change="toggle()">
                  </label>
                </div>
              </div>

              
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" ng-show="visible_curso.show">
                  <label>Curso
                  <input id="cheq_curso" type="checkbox" ng-model="checkbox_cursos" ng-change="toggle_cursos()">
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" ng-show="visible_servicio.show">
                  <label>Servicio
                  <input id="cheq_Servicio" type="checkbox" ng-model="checkbox_servicios" ng-change="toggle_servicios()">
                </div>
                
              <div class="container-fluid" style="padding:0%;" ng-show="visible.show">              
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                  <label>Número</label>
                    <input type="text" id="caja_texto" name="numero_curso" placeholder="Cédula" 
                      ng-model="cursosModificar.numero"
                      ng-disabled="true">
                </div>                
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" >
                  <label>Curso</label>
                    <input type="text" id="caja_texto" 
                     name="curso" ng-model="cursosModificar.curso" required>                              
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                  <label>Costo</label>
                    <input type="text" id="caja_texto" 
                    name="costo" ng-model="cursosModificar.costo" required>
                </div>                  
              </div>
              
              <div class="container-fluid" style="padding:0%;" ng-show="cambiarCursos.show"> 
              <div class="container-fluid" style="padding:0%;"> 
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" >
                  <div ng-show="cursosMostrar.show">
                    <label>Curso</label>
                    <select id ="caja_select"
                     name ="cursos"
                     ng-change="selectAction()"
                     ng-model="cursosModificar.curso_cambiar" 
                     ng-options="cursos.id+cursos.codigo+cursos.precio as cursos.descripcion for cursos in listadoServices_cursos | filter: {status: '1'} | filter: {codigo: '1'} " required
                     ng-class="{ error: formulario_estudiante.cursos.$error.required && !formulario_estudiante.$pristine, 
                     warning: formulario_estudiante.cursos.$error.direccion }">
                    </select> 
                    </div> 
                  <div ng-show="serviciosMostrar.show">
                    <label>Servicios</label>
                    <select id ="caja_select"
                     name ="cursos"
                     ng-change="selectAction()"
                     ng-model="cursosModificar.servicio_cambiar" 
                     ng-options="cursos.id+cursos.codigo+cursos.precio as cursos.descripcion for cursos in listadoServices_cursos | filter: {status: '1'} | filter: {codigo: '2'} " required
                     ng-class="{ error: formulario_estudiante.cursos.$error.required && !formulario_estudiante.$pristine, 
                     warning: formulario_estudiante.cursos.$error.direccion }">
                    </select> 
                  </div>                               
                </div>             
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" ng-show="costo.show">
                  <label>Costo</label>
                    <input type="text" id="caja_texto" 
                    name="costo_1" ng-model="cursosModificar.costo_1" required>
                </div> 
              </div>
              <div class="container-fluid" style="padding:0%;" ng-show="fecha_hora.show">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                  <label>Fechas disponibles</label>
                   <div ng-show="cursosFechas.show">
                    <select id="caja_select_1" 
                    name="fecha_cursos"
                    ng-change="selectDisponibilidad()"
                    ng-model="cursosModificar.fecha" 
                    ng-options="cronograma.fecha_inicio as cronograma.fecha_inicio for cronograma in listado_cronograma" required
                    ng-class="{ error: formulario_estudiante.fecha.$error.required && !formulario_estudiante.$pristine, 
                    warning: formulario_estudiante.fecha.$error.fecha }">
                    </select>
                  </div>
                  <div ng-show="cursosServicios.show">
                     <p class="input-group">
                        <input type="text" id="caja_texto" 
                        class="form-control" uib-datepicker-popup
                        ng-model="cursosModificar.fecha_reservacion" 
                        ng-change="selectDisponibilidad()"
                        is-open="popupReservacion.opened" datepicker-options="dateOptions" 
                        ng-required="true" close-text="Close"
                        alt-input-formats="altInputFormats"/>
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-default" ng-click="openReservacion()">
                          <i class="glyphicon glyphicon-calendar"></i>
                        </button>
                        </span>
                      </p>
                  </div>
                </div> 
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                    <label>Hora</label>
                    <select id="caja_select_1" 
                    name="horas"
                    ng-change="selectDisponibilidad_horas()"
                    ng-model="cursosModificar.horas" 
                    ng-options="horas.codigo+horas.hora_inicio+horas.disponibilidad as horas.hora_inicio for horas in horas_disponibles" required
                    ng-class="{ error: formulario_estudiante.fecha.$error.required && !formulario_estudiante.$pristine, 
                    warning: formulario_estudiante.fecha.$error.fecha }">
                    </select>
                    <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.fecha.$error.required">Falta colocar costo.</span>
                </div> 
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ng-show="disponibilidadMostrar.show">
                  <label>Cupos disponibles</label>
                    <input type="text" id="caja_texto" 
                    name="disponible" 
                    ng-disabled=true
                    ng-model="cursosModificar.disponibilidad" 
                    required>
                </div>                
               </div>   
              </div>

            <div ng-show="mostrar_capa.show">
              <div class="container-fluid" style="padding:0%;">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                  <label>Status de Pago</label>
                    <select id="caja_select_1" 
                    name="condicion_pago"
                    ng-change="seleccionarMonto()"
                    ng-model="cursosModificar.condicion_pago" required>                                                                       
                    <option vlaue="1">Abonar</option>
                    <option vlaue="2">Pago Total</option>
                    </select>
                </div> 
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" >
                  <label>Bancos</label>
                  <select id="caja_select_1" 
                    name="bancos"
                    ng-model="cursosModificar.bancos" 
                    ng-options="bancos.id_banco as bancos.descripcion for bancos in listado_bancos" 
                    require>
                  </select>                                
                </div>   
              </div>
              <div class="container-fluid" style="padding:0%;">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                  <label>Transacción</label>
                    <select id="caja_select_1" 
                    name="transaccion"
                    ng-model="cursosModificar.transaccion" required>
                      <option vlaue="T">Transferencia</option>
                      <option vlaue="D">Depósito</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                  <label>Número</label>
                    <input type="number" id="caja_texto" name="numero_transaccion" ng-model="cursosModificar.numero_transaccion" required>
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                  <label>Monto</label>
                  <input type="text" id="caja_texto" name="monto" ng-model="cursosModificar.monto" required>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="date">
                  <label>Fecha Pag.</label>
                    <p class="input-group">
                      <input type="text" id="caja_texto" 
                      class="form-control" uib-datepicker-popup
                      ng-model="cursosModificar.fecha_pago" 
                      is-open="popup2.opened" datepicker-options="dateOptions" 
                      ng-required="true" close-text="Close"
                      alt-input-formats="altInputFormats"/>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default" ng-click="open2()">
                          <i class="glyphicon glyphicon-calendar"></i>
                        </button>
                      </span>
                    </p>
                </div>
              </div>
            </div>
              <div class="container-fluid" style="padding:0%;">
                 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <input type="hidden" id="caja_texto" 
                     name="id_curso" ng-model="cursosModificar.id_curso">                              
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <input type="hidden" id="caja_texto" 
                     name="abono" ng-model="cursosModificar.abono">                              
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <input type="hidden" id="caja_texto" 
                     name="id_detalles" ng-model="cursosModificar.id_detalles">                              
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                  <input type="hidden" id="caja_texto" 
                  name="cedula" ng-model="cursosModificar.cedula">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                  <input type="hidden" id="caja_texto" 
                  name="faltante" ng-model="cursosModificar.faltante">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                  <input type="hidden" id="caja_texto" 
                  name="faltante" ng-model="cursosModificar.codigo_curso_servicio">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                  <input type="hidden" id="caja_texto" 
                  name="cronograma" ng-model="cursosModificar.codigo_cronograma">
                </div> 
              </div>
              <div class="mensaje">
                 <p>{{mensaje_monto}}</p>
              </div>
              <div class="container-fluid" style="padding:0%;">
                <button ng-click="cursos_abono(cursosModificar)" class="button_1" >Procesar pago Inscripción</button>
                <button ng-click="reset(form)" class="button_1">Limpiar campos del Formulario</button>
              </div>
            </div>
        </fieldset>
      </form>
    </div>
    

  <div class="container-fluid" style="padding:1%;">
    <div id="tntGridServices" ui-grid="gridOptions" ui-grid-selection class="grid"></div>
  </div> 
  </div>
</div>



