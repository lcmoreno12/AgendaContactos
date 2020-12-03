<div class="col-lg-4 mx-auto">
    <h1 class="my-5">Editar Contacto</h1>

    <?php
    if (isset($_GET['contacto_id'])) {
        $contacto_id = $_GET['contacto_id'];
        $contacto = traerContacto($contacto_id);
    }
    if(isset($_GET['rta'])) {
        $rta = $_GET['rta'];
        echo mostrarMensaje($rta);
    }
    ?>

    <form action="./?page=validar" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre" style="font-size: 1.5em">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $contacto[1] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="apellido" style="font-size: 1.5em">Apellido</label>
            <input type="text" name="apellido" id="apellido" value="<?php echo $contacto[2] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="telefono" style="font-size: 1.5em">Telefono:</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo $contacto[3] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="direccion" style="font-size: 1.5em">Dirección:</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $contacto[4] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="comentarios" style="font-size: 1.5em">Comentarios:</label>
            <input type="text" name="comentarios" id="comentarios" value="<?php echo $contacto[5] ?>" class="form-control">
        </div>

        <div class="form-group">
            <img src="./imagenes/contactos/<?php echo $contacto[6] ?>" style="width: 150px; height: 150px;" alt="">
            <input type="hidden" name="imagenActual" id="imagenActual">
        </div>

        <div class="form-group">
            <label for="imagen" style="font-size: 1.5em">Imagen:</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>

        <div class="form-group d-flex justify-content-between">
            <input type="hidden" name="contacto_id" value="<?php echo $contacto[0] ?>">
            <a href="./?page=agenda" class="btn btn-warning col-5 d-block">Volver</a>
            <input type="submit" name="accion" value="Editar" class="btn btn-success col-5 d-block">
        </div>
    </form>
</div>