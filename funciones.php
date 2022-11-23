<?php
$conex = mysqli_connect("localhost", "root", "", "libreria");
function popular($conex)
{
    $queryCantidad = "SELECT * FROM books";
    $getCantidad = mysqli_query($conex, $queryCantidad);
    $cantidad = mysqli_num_rows($getCantidad);


    for ($i = 1; $i < $cantidad + 1; $i++) {
        $queryLibros = "SELECT * FROM books WHERE isbn = " . $i;
        $getLibros = mysqli_query($conex, $queryLibros);
        $libro = $getLibros->fetch_array();
        if ($libro[1] == NULL) {
            echo "<option value=\"" . $libro[0] . "\" >" . $libro[2] . "</option>";
        }
    }
}
