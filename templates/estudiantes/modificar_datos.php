

<div id="cuadro-estudiantes">
    <div class="container-fluid">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3 id="h3">Bienvenido (a):  {{ email }}</h3>           
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
        				            <button ng-click="modificar_estudiante(estudent)" class="button_1" >Modificar</button>
                            <button ng-click="reset(form)" class="button_1">Limpiar</button>
                            <div ng-show="flash">
                              <div data-alert class="alert-box alert round">{{ flash }} jjjjjjjj</div>
                            </div>
                        </div>
                </fieldset>                 
            </form>           
        </div>               
    </div>
</div>


