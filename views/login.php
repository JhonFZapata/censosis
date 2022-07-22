<div class="row">
    <div class="col-md-4 offset-md-4">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">Ingreso</div>
                <!-- <div class="card-header"><?php echo $mode; ?></div> -->
                <div class="card-body">
                    <form action="?m=verifyUser" method="POST">
                        <div class="form-group">
                            <input class="form-control" type="number" name="document" placeholder="Num. Documento" requiered>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="password" name="password" placeholder="Contraseña" requiered>
                        </div>
                        <?php if (false): ?>
                        <div class="form-group mt-2">
                            <input class="form-control" type="text" name="username" placeholder="Nombre" requiered>
                        </div>
                        <?php endif; ?>
                        <a class=" mt-2 btn btn-secondary" role="button" name="btnRegresar" href="?m=instituto">Regresar</a>
                        <button class=" mt-2 btn btn-primary" name="btnAceptar" type="submit">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>