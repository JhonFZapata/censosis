<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">Editar persona</div>
                <form id="formNatural" action="?m=updatePerson" method="POST">
                <input name="ID_PERSONA" value="<?php echo $persona[0]->ID_PERSONA; ?>" hidden="true">
                <div class="form-group mt-2">
                    <input class="form-control" type="number" name="DNI" placeholder="Num. DNI" value="<?php echo $persona[0]->DNI; ?>" required>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="text" name="NOMBRE" placeholder="Nombre" value="<?php echo $persona[0]->NOMBRE; ?>" requiered>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="date" max="2004-01-01" name="FECNAC" placeholder="Fecha de nacimiento"  value="<?php echo $persona[0]->FECNAC; ?>" requiered>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="text" name="DIR" placeholder="Dirección" value="<?php echo $persona[0]->DIR; ?>" requiered>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="number" name="TFNO" placeholder="Num. Teléfono" value="<?php echo $persona[0]->TFNO; ?>" requiered>
                </div>
                <a class=" mt-5 btn btn-secondary" role="button" href="?m=home">Cancelar</a>
                <button class=" mt-5 btn btn-primary" type="submit">Editar persona   </button>
            </form>
            </div>
        </div>
    </div>
</div>