<?php
include_once 'claseusuario/Usuario.php';
include_once 'claseusuario/repositorioLibro.php';

session_start();

$usuario = unserialize($_SESSION['usuario']);

// echo $usuario->getNombre();

// $sql = "SELECT user_id FROM books WHERE user_id = 'NULL'";

$repolibro = new RepositorioLibro();

if (isset($_POST['opcionLibro']) && ($_POST['opcionLibro'] != "")) {
    //echo "Envie informacion";
    $libroSeleccionado = $repolibro->create($_POST['opcionLibro']);

    // echo $libroSeleccionado->getTitle();
    //echo $usuario->getId();

    if ($repolibro->actualizar($libroSeleccionado, $usuario)) {
        echo "Se actualizo libro";
    } else {
        echo "Algo fallo";
    }
} else {
    echo "";
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Libreria</title>
</head>
<form action="alquilar.php" method="post">
    <h2> Elige el libro que quieres alquilar </h2><br>
    <label> Libros disponibles: </label><br>
    <br><select name="opcionLibro" class="seleccionar">
        <option value=""> Seleccione un libro</option>
        <?php

        $listadoLibros = $repolibro->listarLibrosNoAlquilados();

        for ($i = 0; $i < count($listadoLibros); $i++) {
            echo $listadoLibros[$i][1];
        }
        ?>
    </select><br>

    <br><input type="submit" value="Alquilar" class="boton">
</form>
</body>
</br>
<a href="logout.php"> Desloguearse </a>

</html>