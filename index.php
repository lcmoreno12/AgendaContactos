<?php
    include "header.php";
    include "funciones.php";
?>

<section class="page">
<?php
    if(isset($_GET['page'])) {
        $vista = $_GET['page'] . ".php";
    } else {
        $vista = "login.php";
    }

    include validarVista($vista);
?>
</section>

<?php
    include "footer.php";
?>