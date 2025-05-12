<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' type="text/css" href='style.css'>
  </head>

  <body>
    <h2>Listado de Estudiantes</h2>

    <main>
    <p class="addStudent">
      <a href='handlers/insert.php'>Agregar Nuevo</a>
    </p>

    <?php

    // No hay necesidad de usar echo para renderizar cada etiqueta HTML, simplemente se 
    // puede meter PHP dentro de HTML, de esta forma queda mas prolijo 
    include 'config.php';

    $result = $connection->query("SELECT * FROM students");

    if ($result->num_rows > 0) {
      echo '<table class="table">';
      echo "<thead><tr><th>Nombre</th><th>Email</th><th>Edad</th><th>Acciones</th></tr></thead>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['age']}</td>
                <td>
                    <a href='handlers/update.php?id={$row['id']}'>Editar</a> |
                    <a href='handlers/delete.php?id={$row['id']}'>Borrar</a>
                </td>
              </tr>";
    }
      echo "</table>";
    } else {
      echo "No hay estudiantes cargados.";
    }
    ?>
    </main>
  </body>
</html>
