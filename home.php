<?php
require_once 'claseusuario/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
  $usuario = unserialize($_SESSION['usuario']);
  $nomApe = $usuario->getNombreApellido();
} else {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Libreria</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="container">
  <div class="jumbotron text-center">
    <h1>Libreria</h1>
  </div>
  <div class="text-center">
    <h3>Hola <?php echo $nomApe; ?></h3>
    <p><a href="alquilar.php">Alquilar</a></p>
    <p><a href="createbooks.php">Cargar libros</a></p>
    <p><a href="logout.php">Cerrar sesión</a></p>
  </div>
</body>

</html>