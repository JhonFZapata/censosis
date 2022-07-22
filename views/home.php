<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="container">
            <div class="card mt-5">
            <button class="btn btn-secondary mb-3" id="btnTelefonos">Listar Teléfonos</button>
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Nombre</th>
                    <th>Telefono</th>
                </thead>
                <tbody  id="tbPhones">
                    
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1">
        <div class="container">
            <div class="card mt-5">
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Censar Persona</button>
                <div class="card-header">Listado de personas</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>DNI</th>
                            <th>NOMBRE</th>
                            <th>FEC NACIMIENTO</th>
                            <th>DIRECCIÓN</th>
                            <th>TELEFONO</th>
                            <th>ACCION</th>
                        </thead>
                        <tbody>
                            <?php foreach ($personas as $p): ?>
                            <tr>
                                <td><?= $p->DNI ?></td>
                                <td><?= $p->NOMBRE ?></td>
                                <td><?= $p->FECNAC ?></td>
                                <td><?= $p->DIR ?></td>
                                <td><?= $p->TFNO ?></td>
                                <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" >
                                    <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                        <form action="?m=editarPersona" method="POST">
                                                <input name="ID_PERSONA" value="<?php echo $p->ID_PERSONA; ?>" hidden="true">
                                                <button class="dropdown-item" type="submit">Editar</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="?m=deletePerson" method="POST">
                                                <input name="ID_PERSONA" value="<?php echo $p->ID_PERSONA; ?>" hidden="true">
                                                <button class="dropdown-item" type="submit">Eliminar</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="card-header">Censar personas</div>
                <div class="card-body">
                    
                </div> -->
            </div>
        </div>
    </div>
</div>


<!-- Nuevo censo -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nueva Persona</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form id="formNatural" action="?m=createPerson" method="POST">

            <div class="form-group mt-2">
                <input class="form-control" type="number" name="DNI" placeholder="Num. DNI" requiered>
            </div>
            <div class="form-group mt-2">
                <input class="form-control" type="text" name="NOMBRE" placeholder="Nombre" requiered>
            </div>
            <div class="form-group mt-2">
                <input class="form-control" type="date" max="2004-01-01" name="FECNAC" placeholder="Fecha de nacimiento" requiered>
            </div>
            <div class="form-group mt-2">
                <input class="form-control" type="text" name="DIR" placeholder="Dirección" requiered>
            </div>
            <div class="form-group mt-2">
                <input class="form-control" type="number" name="TFNO" placeholder="Num. Teléfono" requiered>
            </div>
            <a class=" mt-5 btn btn-secondary" role="button" data-bs-dismiss="modal">Cancelar</a>
            <button class=" mt-5 btn btn-primary" type="submit">Censar</button>
        </form>
      </div>
    </div>
  </div>
</div>