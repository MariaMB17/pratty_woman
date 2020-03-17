


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
    	<form enctype="multipart/form-data">
	    	<form name="upload" ng-submit="uploadFile()">
                <input type="text" ng-model="name" /><br>
                <input type="file" name="file" uploader-model="file" /> <br>
                <input type="submit" value="Enviar"> 
            </form>
        </form>
    </div>
</div>