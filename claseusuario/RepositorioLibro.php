<?php
require_once '.env.php';
require_once 'Libros.php';
require_once 'Usuario.php';

class RepositorioLibro
{
    private $conn;

    public function __construct()
    {
        if (is_null($this->conn)) {
            $credenciales = credenciales();
            $this->conn = new mysqli(
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['clave'],
                $credenciales['base_de_datos']
            );
            if ($this->conn->connect_error) {
                $error = 'Error de conexión: ' . $this->conn->connect_error;
                $this->conn = null;
                die($error);
            }
            // echo "Conexion exitosa<br>";
            $this->conn->set_charset('utf8');
        } else {
            echo "Hubo un fallo<br>";
        }
    }

    public function create($isbn)
    {
        $q = "SELECT isbn, userId , title, author, genre FROM books ";
        $q .= "WHERE isbn = ?";

        $userId = null;
        $title = null;
        $autor = null;
        $genero = null;

        if ($query = $this->conn->prepare($q)) {
            // echo "pase por la prepare<br>";
            $query->bind_param("d", $isbn);
            // echo "pase por el bind param<br>";
            if ($query->execute()) {
                // echo "pase por la execute<br>";
                if ($query->bind_result($isbn, $userId, $title, $autor, $genero)) {
                    // echo "pase por el bind result";

                    while ($fila = $query->fetch() !== false) {
                        // echo "pase por fetch<br>";
                        return new Libros($isbn, $title, $autor, $genero, $userId);
                    }
                } else {
                    echo "Falle en el bind_result";
                }
            }
        }

        return false;
    }



    public function save(Libros $l)
    {
        $q = "INSERT INTO books (isbn,title,author,genre) ";
        $q .= "VALUES (?, ?, ?, ?)";
        $query = $this->conn->prepare($q);
        $genero = $l->getGenre();
        $title = $l->getTitle();
        $autor = $l->getAuthor();
        $ISBN = $l->getISBN();
        $user_id = null;
        $query->bind_param("isss", $ISBN, $title, $autor, $genero);
        echo "pase el bindparam del save";

        if ($query->execute()) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }

    public function actualizar(Libros $l, Usuario $u)
    {
        $q = "UPDATE books ";
        $q .= "SET userId= ? ";
        $q .= "WHERE isbn = ?";
        if ($query = $this->conn->prepare($q)) {
            $ISBN = $l->getISBN();
            $user_id = $u->getId();

            if ($query->bind_param("ii", $user_id, $ISBN)) {
                // echo "pase por bind param";
                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo "Fallo el bind";
            }
        } else {
            echo "fallo el prepare";
        }
    }

    public function eliminar(Libros $l)
    {
        $q = "DELETE FROM BOOKS  WHERE isbn = ?";
        $query = $this->conn->prepare($q);

        $ISBN = $l->getISBN();

        $query->bind_param("d", $ISBN);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listarLibrosNoAlquilados()
    {
        $queryCantidad = "SELECT * FROM books";
        $getCantidad = mysqli_query($this->conn, $queryCantidad);
        $cantidad = mysqli_num_rows($getCantidad);

        $resultado = [];
        for ($i = 1; $i < $cantidad + 1; $i++) {
            $queryLibros = "SELECT * FROM books WHERE isbn = " . $i;
            $getLibros = mysqli_query($this->conn, $queryLibros);
            $libro = $getLibros->fetch_array();
            if ($libro[1] == NULL) {
                array_push($resultado, [$libro[2], "<option value=\"" . $libro[0] . "\" >" . $libro[2] . "</option>"]);
            }
        }

        return $resultado;
    }
}
