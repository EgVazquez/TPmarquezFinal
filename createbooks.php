<?php
require_once 'claseusuario/ControladorSesiones.php';
require_once 'claseusuario/Usuario.php';
require_once 'claseusuario/Libros.php';

session_start();
$usuario = unserialize($_SESSION['usuario']);

// echo $usuario->getNombre();

if (isset($_POST['ISBN']) && isset($_POST['Titulo']) && isset($_POST['Autor']) && isset($_POST['Genero'])) {
    // $cs = new ControladorSesion();
    $repolibro = new RepositorioLibro();
    $libro = new Libros($_POST['ISBN'], $_POST['Titulo'], $_POST['Autor'], $_POST['Genero']);
    $result = $repolibro->save($libro);

    if ($result != false) {
        $redirigir = 'home.php?mensaje=Se cargo con exito el libro';
    } else {
        $redirigir = 'createbooks.php?mensaje=Error al cargar el libro';
    }
    header('Location: ' . $redirigir);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Cargar Libros</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="container">
    <div class="jumbotron text-center">
        <h1>Cargar Nuevo Libros</h1>
    </div>
    <div class="text-center">
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
        }
        ?>

        <form action="createbooks.php" method="post">
            <input name="ISBN" class="form-control form-control-lg" placeholder="ISBN"><br>
            <input name="Titulo" class="form-control form-control-lg" placeholder="Titulo"><br>
            <input name="Autor" class="form-control form-control-lg" placeholder="Autor"><br>
            <input name="Genero" class="form-control form-control-lg" placeholder="Genero"><br>
            <input type="submit" value="Cargar Libro" class="btn btn-primary">
        </form>
    </div>
</body>

</html>