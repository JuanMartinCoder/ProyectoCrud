<?php
include '../config.php';

/**
 * $_SERVER con esta "super-global" detecto con qué método
 * consultan al servidor.
 * https://www.php.net/manual/es/reserved.variables.request.php
 * https://www.php.net/manual/es/language.variables.superglobals.php 
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (fullname, email, age)
            VALUES ('$name', '$email', $age)";

    if ($connection->query($sql) === TRUE) {
        /**
         * la función header redirige a la página principal index.php
         * de lo contrario recargaría la misma página.
         */
        header("Location: ../index.php"); 
        exit;
    } else {
        echo "Error al insertar: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang='es'>
    <head>
      <meta charset='UTF-8'>
      <link rel='stylesheet' type="text/css" href='../style.css'>
    </head>

    <body>
    <h2>Agregar Estudiante</h2>
      
  
    <main class="main_formulario">
      <form action="insert.php" method="post">
        <div class="campo">
          <label>Nombre completo: </label>
          <input type="text" name="fullname" required>
        </div>
        <div class="campo">
          <label>Email: </label>
          <input type="email" name="email" required>
        </div>
        <div class="campo">
          <label>Edad: </label>
          <input type="number" name="age" required>
        </div>
        <div class="campo">
          <input type="submit" value="Guardar" class="guardar_estudiante">
        </div>
      </form>
     </main>
   </body>
</html>
