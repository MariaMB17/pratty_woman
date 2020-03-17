

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
                <li><a ng-click="volver_inicio()">Volver al Inicio</a></li>
                <li><a ng-click="logout()">Cerrar Sesion</a></li>
              </ul>
              <!--[if lte IE 6]></td></tr></table></a><![endif]-->
            </li>
          </ul>
        </div>
    </div>       
    <div class="cuadro-estudiantes wow fadeIn" >
        <div class="container-fluid">
            <form id="formulario-estudiante" name="formulario_estudiante" novalidate >
                <fieldset >
                    <legend>Inscripción</legend>
                        <div class="row">
                          <pre>Selected date is: <em>{{estudent | date:'fullDate' }}</em></pre>
                            <div ng-show="flash">
                                <div data-alert class="alert-box alert round">{{ flash }}</div>
                            </div>
                            <div class="container-fluid" style="padding:0%;">
    				            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
    				                <label>Cédula</label>
    				                <input type="text" id="caja_texto" name="cedula" placeholder="Cédula" 
                                     ng-model="estudent.cedula" ng-focus="metodo()"
                                     ui-event="{blur : 'selectEstuidante()'}"
                                     ng-required="true">
                                     <span ng-show="formulario_estudiante.cedula.$invalid">NIF no válido.</span>
                        </div>                            
    				            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
    				                <label>Apellidos</label>
    				                <input type="text" id="caja_texto" placeholder="Apellidos" name="apellidos" 
                                     ng-model="estudent.apellidos" required  
                                     ng-class="{ error: formulario_estudiante.apellidos.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.apellidos.$error.apellidos }">
                                      <span ng-show="formulario_estudiante.apellidos.$error.required">Falta introducir apellidos.</span>
    				            </div>
                            </div>
                            <div class="container-fluid" style="padding:0%;">
    				            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
    				                <label>Nombres</label>
    				                <input type="text" id="caja_texto" placeholder="Nombres" name="nombres"
                                     ng-model="estudent.nombres" required 
                                     ng-class="{ error: formulario_estudiante.nombres.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.nombres.$error.nombres }">
                                     <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.nombres.$error.required">Falta introducir Nombres.</span>
    				            </div>
    				            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
    				                <label>Teléfono</label>
    				                <input type="text" id="caja_texto" placeholder="teléfono" name="telefono" 
                                    ng-model="estudent.telefono" required 
                                    ng-class="{ error: formulario_estudiante.telefono.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.telefono.$error.telefono }">
                                     <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.telefono.$error.required">Falta introducir teléfono.</span>
    				            </div>
                            </div>
                            <div class="container-fluid" style="padding:0%;">
          				            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
          				                <label>Dirección</label>
          				                <textarea id="caja_texto" placeholder="Direccion" name="direccion" ng-model="estudent.direccion" required 
                                          ng-class="{ error: formulario_estudiante.direccion.$error.required && !formulario_estudiante.$pristine, 
                                                      warning: formulario_estudiante.direccion.$error.direccion }"></textarea>
                                           <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.direccion.$error.required">Falta introducir dirección.</span>
                                          
          				            </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                  <label>Correo eléctronico</label>
                                      <input type="email" id="caja_texto" placeholder="correo" name="email" 
                                          ng-model="estudent.correo" required 
                                          ng-class="{ error: formulario_estudiante.correo.$error.required && !formulario_estudiante.$pristine, 
                                                      warning: formulario_estudiante.correo.$error.telefono }">
                                           <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.correo.$error.required">
                                            Falta introducir teléfono.</span>
                              </div>
                            </div>
                            <div class="container-fluid" style="padding:0%;">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                    <label>Sevicios</label>
                                     <select id ="caja_select"
                                      name ="cursos"
                                      ng-change="selectAction()"
                                      ng-model="estudent.curso" 
                                      ng-options="cursos.id+cursos.codigo+cursos.precio as cursos.descripcion for cursos in listadoServices_cursos | filter: {status: '1'} | filter: {codigo: '2'} " required
                                      ng-class="{ error: formulario_estudiante.cursos.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.cursos.$error.direccion }">
                                  </select>
                                  <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.cursos.$error.required">Falta seleccionar el curso.</span>
                                </div>
                            </div>
                            <div class="container-fluid" style="padding:0%;">
                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" >
                                    <label>Costo</label>
                                    <input type="text" id="caja_texto" 
                                     name="costo" ng-model="estudent.costo" required
                                     ng-class="{ error: formulario_estudiante.costo.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.costo.$error.costo }">
                                     <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.costo.$error.required">Falta colocar costo.</span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                    <label>Fecha cita.</label>
                                      <p class="input-group">
                                        <input type="text" id="caja_texto" 
                                        class="form-control" uib-datepicker-popup
                                        ng-model="estudent.fecha_reservacion" 
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
                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" >
                                    <label>Hora</label>
                                    <select id="caja_select_1" 
                                      name="horas"
                                      ng-change="selectDisponibilidad_horas()"
                                      ng-model="estudent.horas" 
                                      ng-options="horas.codigo+horas.hora_inicio+horas.disponibilidad as horas.hora_inicio for horas in horas_disponibles" required
                                      ng-class="{ error: formulario_estudiante.fecha.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.fecha.$error.fecha }">
                                    </select>
                                    <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.fecha.$error.required">Falta colocar costo.</span>
                                </div> 
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                    <label>Status de Pago</label>
                                    <select id="caja_select_1" 
                                      name="condicion_pago"
                                      ng-change="seleccionarMonto()"
                                      ng-model="estudent.condicion_pago" required
                                      ng-class="{ error: formulario_estudiante.condicion_pago.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.condicion_pago.$error.condicion_pago}">                                                                       
                                      <option vlaue="1">Abonar</option>
                                      <option vlaue="2">Pago Total</option>
                                    </select>
                                    <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.condicion_pago.$error.required">Falta por seleccionar.</span>
                                </div>
                                 <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" >
                                    <input type="hidden" id="caja_texto" 
                                    name="disponibile" 
                                    ng-disabled=true
                                    ng-model="estudent.disponibilidad" required
                                    ng-class="{ error: formulario_estudiante.disponibilidad.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.disponibilidad.$error.disonibilidad }">
                                     <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.disponibilidad.$error.required">Falta colocar costo.</span>
                                </div>                                
                            </div>
                            <div class="container-fluid" >
                                <p class="textos_cuentas">Los despositos o Transferencias deberan realizarse a nombre de: C.E PRETTY WOMAN,
                              cuenta N:111-2222-5555-5555</p>
                            </div> 
                            <div class="container-fluid" style="padding:0%;">
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                    <label>Bancos</label>
                                    <select id="caja_select_1" 
                                      name="bancos"
                                      ng-model="estudent.bancos" 
                                      ng-options="bancos.id_banco as bancos.descripcion for bancos in listado_bancos" required
                                      ng-class="{ error: formulario_estudiante.bancos.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.bancos.$error.bancos}">
                                  </select>
                                  <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.bancos.$error.required">Falta seleccionar el Banco.</span>
                                </div>   
                            </div> 
                            <div class="container-fluid" style="padding:0%;">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                    <label>Transacción</label>
                                    <select id="caja_select_1" 
                                      name="transaccion"
                                      ng-model="estudent.transaccion" required
                                      ng-class="{ error: formulario_estudiante.transaccion.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.transaccion.$error.transaccion}">
                                      <option vlaue="T">Transferencia</option>
                                      <option vlaue="D">Depósito</option>
                                    </select>
                                     <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.transaccion.$error.required">Falta seleccionar el tipo de transacción.</span>
                                </div> 
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                    <label>Número</label>
                                    <input type="number" id="caja_texto" name="numero" ng-model="estudent.numero" required
                                    ng-class="{ error: formulario_estudiante.numero.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.numero.$error.numero }">
                                     <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.numero.$error.required">Falta colocar N de Transacción.</span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                    <label>Monto</label>
                                    <input type="text" id="caja_texto" name="monto" ng-model="estudent.monto" required
                                    ng-class="{ error: formulario_estudiante.monto.$error.required && !formulario_estudiante.$pristine, 
                                                warning: formulario_estudiante.monto.$error.monto }">
                                     <span ng-show="!formulario_estudiante.$pristine && formulario_estudiante.monto.$error.required">Falta colocar monto.</span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="date">
                                    <label>Fecha Pago.</label>
                                      <p class="input-group">
                                        <input type="text" id="caja_texto" 
                                        class="form-control" uib-datepicker-popup
                                        ng-model="estudent.fecha_pago" 
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
				            <button ng-click="guardar(estudent)" class="button_1" >Procesar pago Inscripción</button>
                    <button ng-click="reset(form)" class="button_1">Limpiar campos del Formulario</button>
                        </div>
                </fieldset>                 
            </form>           
        </div>               
    </div>
</div>


