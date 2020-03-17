


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
                <button id="modificar_cursos" ng-click="buscar_recibos_ci()">buscar</button>
            </div>      
        </div><br>
        <div class="container-fluid" style="padding:0%;">
		    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
		        <label>{{dataRecibos.apellidos}}</label>
		    </div>
		    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
		        <label>{{dataRecibos.nombres}}</label>
		    </div>
		    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
		        <label>{{dataRecibos.telefono}}</label>
		    </div>
        </div> <br>
        <div class="container-fluid" style="padding:0%;">		   
	        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
	            <label>{{dataRecibos.correo}}</label>
	        </div>
	        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" >
	        </div>
	        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" >
	            <label>{{dataRecibos.direccion}}</label>
	        </div>
        </div> <br>
        <div class="container-fluid" style="padding:1%;">
            <div id="tntGridServices" ui-grid="gridReimprimir_recibos" ui-grid-selection class="grid"></div>
        </div> 
    </div>
</div>