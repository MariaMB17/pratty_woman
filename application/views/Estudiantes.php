<!DOCTYPE  html>
<!--cargamos nuestro modulo en la etiqueta html con ng-app-->
<html lang="es" ng-app="app">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
    <title>Registro de Estudiantes</title>
    <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap-3.3.6/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">  
    <link rel="stylesheet"  href="<?php echo base_url() ?>node_modules/angular-ui-grid/ui-grid.css"> 
    <link rel="stylesheet"  href="<?php echo base_url() ?>css/normalize.css"  media="screen" />
    <link rel="stylesheet"  href="<?php echo base_url() ?>css/menu.css"  media="screen" />
    <link rel="stylesheet"  href="<?php echo base_url() ?>css/foundation.min.css" media="screen" /> 
    <link rel="stylesheet"  href="<?php echo base_url() ?>css/jquery-ui.min.css" media="screen" />        
    <link rel="stylesheet"  href="<?php echo base_url() ?>css/style.css" media="screen" /> 

</head>
<body>
<!--creamos el div con la directiva ng-view, aquí será donde
carguen todas las vistas-->

<div id="estudiantes" ng-view>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>css/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>css/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>css/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>css/angular-1.5.2/angular.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>css/angular-1.5.2/angular-route.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>css/angular-1.5.2/angular-animate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>node_modules/angular-ui-grid/ui-grid.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>css/js/ui-bootstrap-tpls-1.2.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>css/js/angular.ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/controllers/controllers.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/controllers/estudentControllers.js"></script>
</body>
</html>