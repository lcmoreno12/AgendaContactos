<?php
include "admin/conexion.php";

function validarVista($vista) {
    if (file_exists($vista)) {
        $vista = $vista;
    } else {
        $vista = "404.php";
    }

    return $vista;
}

function mostrarMensaje($rta) {
    switch ($rta) {
        case "0x001":
            $mensaje = "<b class='text-success'>Contacto agregado con éxito!</b>";
        break;
        case "0x002":
            $mensaje = "<b class='text-danger'>El contacto no se pudo agregar</b>";
        break;
        case "0x003":
            $mensaje = "<b class='text-success'>Contacto editado con éxito!</b>";
        break;
        case "0x004":
            $mensaje = "<b class='text-danger'>El contacto no se pudo editar</b>";
        break;
        case "0x005":
            $mensaje = "<b class='text-danger'>El campo nombre es inválido</b>";
        break;
        case "0x006":
            $mensaje = "<b class='text-danger'>El campo apellido es inválido</b>";
        break;
        case "0x007":
            $mensaje = "<b class='text-danger'>El campo telefono es inválido</b>";
        break;
        case "0x008":
            $mensaje = "<b class='text-danger'>El campo dirección es inválido</b>";
        break;
        case "0x009":
            $mensaje = "<b class='text-danger'>El campo comentarios es inválido</b>";
        break;
    }

    return $mensaje;
}

function agregarContacto($nombre, $apellido, $telefono, $direccion, $comentarios, $imagen) {
    global $conexion;

    // subir imagen
    $tmp_name = $imagen['tmp_name'];
    $uploads_dir = './imagenes/contactos';
    $name = $imagen['name'];
    move_uploaded_file($tmp_name, "$uploads_dir/$name");

    try {
        $sql = "INSERT INTO contactos (nombre, apellido, telefono, direccion, comentarios, imagen) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $apellido, PDO::PARAM_STR);
        $stmt->bindParam(3, $telefono, PDO::PARAM_INT);
        $stmt->bindParam(4, $direccion, PDO::PARAM_STR);
        $stmt->bindParam(5, $comentarios, PDO::PARAM_STR);
        $stmt->bindParam(6, $name, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return $rta = "0x001";
        } else {
            return $rta = "0x002";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function traerContactos() {
    global $conexion;

    try {
        $sql = "SELECT * FROM contactos";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $contactos = $stmt->fetchAll();

        return $contactos;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function traerContacto($contacto_id) {
    global $conexion;

    try {
        $sql = "SELECT * FROM contactos WHERE contacto_id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $contacto_id, PDO::PARAM_INT);
        $stmt->execute();
        $contacto = $stmt->fetch();

        return $contacto;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function editarContacto($nombre, $apellido, $telefono, $direccion, $comentarios, $imagenActual, $imagen, $contacto_id) {
    global $conexion;

    if ($imagen['type'] == 'image/jpeg' || $imagen['type'] == 'image/jpg' || $imagen['type'] == 'image/png') {
        $tmp_name = $imagen['tmp_name'];
        $uploads_dir = './imagenes/contactos';
        $name = $imagen['name'];
        // eliminar imagen
        $imagenActual = $uploads_dir . $imagenActual;
        unlink($imagenActual);
        // subir imagen
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
    else {
        $name = $imagenActual;
    }

    try {
        $sql = "UPDATE contactos SET nombre = ?, apellido = ?, telefono = ?, direccion = ?, comentarios = ?, imagen = ? WHERE contacto_id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $apellido, PDO::PARAM_STR);
        $stmt->bindParam(3, $telefono, PDO::PARAM_INT);
        $stmt->bindParam(4, $direccion, PDO::PARAM_STR);
        $stmt->bindParam(5, $comentarios, PDO::PARAM_STR);
        $stmt->bindParam(6, $name, PDO::PARAM_STR);
        $stmt->bindParam(7, $contacto_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return $rta = "0x003";
        } else {
            return $rta = "0x004";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function borrarContacto($contacto_id) {
    global $conexion;

    try {
        $sql = "DELETE FROM contactos WHERE contacto_id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $contacto_id, PDO::PARAM_INT);
        
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>