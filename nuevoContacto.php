<div class="col-lg-4 mx-auto">
    <h1 class="my-4">Nuevo Contacto</h1>

    <?php
    if(isset($_GET['rta'])) {
        $rta = $_GET['rta'];
        echo mostrarMensaje($rta);
    }
    ?>

    <form action="./?page=validar" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre" style="font-size: 1.5em">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>

        <div class="form-group">
            <label for="apellido" style="font-size: 1.5em">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control">
        </div>

        <div class="form-group">
            <label for="telefono" style="font-size: 1.5em">Telefono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>

        <div class="form-group">
            <label for="direccion" style="font-size: 1.5em">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control">
        </div>

        <div class="form-group">
            <label for="comentarios" style="font-size: 1.5em">Comentarios:</label>
            <input type="text" name="comentarios" id="comentarios" class="form-control">
        </div>

        <div class="form-group">
            <label for="imagen" style="font-size: 1.5em">Imagen:</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>

        <div class="form-group d-flex justify-content-between">
            <a href="./?page=agenda" class="btn btn-warning col-5 d-block">Volver</a>
            <input type="submit" name="accion" value="Agregar" class="btn btn-success col-5 d-block">
        </div>
    </form>
</div>