
<div class="container-fluid" style="padding:4.7%;">
<form id="formulario-sesion" name="formulario_sesion">
    <fieldset >
        <legend>INICIAR SESIÓN</legend>

        <div class="row">
            <div ng-show="flash">
                <div data-alert class="alert-box alert round">{{ flash }}</div>
            </div>
            <div class="large-12 columns">
                <label>Email</label>
                <input type="email" id="caja_texto" placeholder="Introduce tu email" ng-model="user.email">
            </div>
            <div class="large-12 columns">
                <label>Password</label>
                <input type="password" id="caja_texto" placeholder="Introduce tu password" ng-model="user.password">
            </div>
            <button ng-click="login(user)" class="button">Entrar</button>
            <button ng-click="registrarse(user)" class="button">Registrarse</button>
        </div>
    </fieldset>
    <p class="parrafo_informacion">Si todavia no estas registrado deberas llenar el formulario y presionar el botón REGISTRARSE</p>
</form>
</div>

