<br><br><br>
<div class="card card-flat">
    <div class="card-header text-center bg-dark">
        <h2 class="mb-0 text-white font-weight-light">Simple<span class="font-weight-bold">Stock</span></h2>
    </div>
    <div class="card-body">
        <p class="text-center py-2">Inicia sesión para continuar</p>
        <?= $this->Form->create() ?>
            <div class="form-group">
                <div class="input-group with-focus">
                    <input class="form-control border-right-0" id="email" name="email" type="email" placeholder="Ingresa tu email"
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text fa fa-envelope text-muted bg-transparent border-left-0"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group with-focus">
                    <input class="form-control border-right-0" name="password" id="password" type="password"
                           placeholder="Ingresa tu contraseña" required>
                    <div class="input-group-append">
                        <span class="input-group-text fa fa-lock text-muted bg-transparent border-left-0"></span>
                    </div>
                </div>
            </div>
            <button class="btn btn-block btn-primary my-3" type="submit">Ingresar</button>
<!--            <a class="text-primary" href="recover.html">Olvidé mi contraseña</a>-->
        <?= $this->Form->end() ?>
<!--        <p class="pt-2 text-center">También puedes</p><a class="btn btn-block btn-secondary" href="register.html">Crear una cuenta</a>-->
    </div>
</div>

