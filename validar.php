<?php
if(isset($_POST['accion']) && $_POST['accion'] == "Agregar") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $comentarios = $_POST['comentarios'];
    $imagen = $_FILES['imagen'];

    if(empty($nombre) || is_numeric($nombre) || strlen($nombre) < 2) {
        header('location: ./?page=nuevoContacto&rta=0x005');
    } else if(empty($apellido) || is_numeric($apellido) || strlen($apellido) < 2) {
        header('location: ./?page=nuevoContacto&rta=0x006');
    } else if(empty($telefono) || !is_numeric($telefono) || strlen($telefono) > 20) {
        header('location: ./?page=nuevoContacto&rta=0x007');
    } else if(empty($direccion)) {
        header('location: ./?page=nuevoContacto&rta=0x008');
    } else if(strlen($comentarios) > 200) {
        header('location: ./?page=nuevoContacto&rta=0x009');
    } else {
        $rta = agregarContacto($nombre, $apellido, $telefono, $direccion, $comentarios, $imagen);
        header("location: ./?page=agenda&rta=$rta");
    }
}
else if(isset($_POST['accion']) && $_POST['accion'] == "Editar") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $comentarios = $_POST['comentarios'];
    $imagenActual = $_POST['imagenActual'];
    $imagen = $_FILES['imagen'];
    $contacto_id = $_POST['contacto_id'];

    if(empty($nombre) || is_numeric($nombre) || strlen($nombre) < 2) {
        header("location: ./?page=editarContacto&contacto_id=$contacto_id&rta=0x005");
    } else if(empty($apellido) || is_numeric($apellido) || strlen($apellido) < 2) {
        header("location: ./?page=editarContacto&contacto_id=$contacto_id&rta=0x006");
    } else if(empty($telefono) || !is_numeric($telefono) || strlen($telefono) > 20) {
        header("location: ./?page=editarContacto&contacto_id=$contacto_id&rta=0x007");
    } else if(empty($direccion)) {
        header("location: ./?page=editarContacto&contacto_id=$contacto_id&rta=0x008");
    } else if(strlen($comentarios) > 200) {
        header("location: ./?page=editarContacto&contacto_id=$contacto_id&rta=0x009");
    } else {
        $rta = editarContacto($nombre, $apellido, $telefono, $direccion, $comentarios, $imagenActual, $imagen, $contacto_id);
        header("location: ./?page=agenda&rta=$rta");
    }
}