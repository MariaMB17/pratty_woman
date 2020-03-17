


  <div id="menu11">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3 id="h3">Bienvenido (a):  {{ email }}</h3>
                <div ng-show="flash">
                <div data-alert class="alert-box alert round">{{ flash }}</div>
            </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <button ng-click="logout()" class="cerrar">Cerrar Sesión</button>
            </div>
        </div>       
        
            <div class="container-fluid cuadro-informacion">
                <div ng-repeat="menuUsuario in menuUsuario">
                    <div class="cuadro-menu">
                        <a ng-href="{{menuUsuario.vinculo}}" ng-click="menu()">{{menuUsuario.descripcion}}</a>
                    </div>
                </div>
            </div>               
        
    </div>
