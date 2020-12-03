<div class="col-lg-4 mx-auto my-4">
    <nav class="d-flex justify-content-between">
        <h2><a href="./?page=agenda" class="text-dark">Agenda Virtual</a></h2>

        <a href="./?page=nuevoContacto" class="btn btn-info">Nuevo Contacto</a>
    </nav>

    <?php
        if(isset($_GET['rta'])) {
            $rta = $_GET['rta'];
            mostrarMensaje($rta);
        }

        if(isset($_GET['accion']) && $_GET['accion'] == "d") {
            $contacto_id = $_GET['contacto_id'];
            borrarContacto($contacto_id);
        }

        $contactos = traerContactos();
    ?>

    <ul class="list-group my-4">
    <?php
    for($i = 0; $i < count($contactos); $i++) {
    ?>
        <li class="list-group-item d-flex justify-content-between flex-wrap">
            <a href="#" class="h4 font-weight-normal text-decoration-none show-datos"><?php echo $contactos[$i][1] . " " . $contactos[$i][2] ?> <i class="angle fas fa-angle-down"></i></a>

            <div>
                <a href="./?page=editarContacto&contacto_id=<?php echo $contactos[$i][0] ?>" style="font-size: 1.5em; margin-right: 15px;" class="text-warning"><i class="fas fa-pencil"></i></a>
                <a href="./?page=agenda&accion=d&contacto_id=<?php echo $contactos[$i][0] ?>" style="font-size: 1.5em;" class="text-danger"><i class="fas fa-trash"></i></a>
            </div>

            <ul class="list-group contactos hide">
                <?php
                if($contactos[$i][6] != "") {
                ?>
                <li class="list-group-item"><img src="imagenes/contactos/<?php echo $contactos[$i][6] ?>" alt="" style="width: 150px; height: 150px;"></li>
                <?php
                }
                ?>
                <li class="list-group-item" style="font-size: 1.3em"><span class="border-bottom border-dark">Telefono:</span> <?php echo $contactos[$i][3] ?></li>
                <li class="list-group-item" style="font-size: 1.3em"><span class="border-bottom border-dark">Dirección:</span> <?php echo $contactos[$i][4] ?></li>
                <li class="list-group-item" style="font-size: 1.3em"><span class="border-bottom border-dark">Comentarios:</span> <?php echo $contactos[$i][5] ?></li>
            </ul>
        </li>
    <?php
    }
    ?>
    </ul>
</div>