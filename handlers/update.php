<?php
include '../config.php';

$id = $_GET['id'];
$result = $connection->query("SELECT * FROM students WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "UPDATE students SET fullname='$name', email='$email', age=$age WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error al actualizar: " . $connection->error;
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
    <h2>Modificar Estudiante</h2>
      
  
    <main class="main_formulario">
      <form action="update.php?id=<?= $row['id'] ?>" method="post">
        <div class="campo">
          <label>Nombre completo: </label>
          <input type="text" name="fullname" value="<?= $row['fullname'] ?>" required>
        </div>
        <div class="campo">
          <label>Email: </label>
          <input type="email" name="email" value="<?= $row['email'] ?>" required>
        </div>
        <div class="campo">
          <label>Edad: </label>
          <input type="number" name="age" value="<?= $row['age'] ?>" required>
        </div>
        <div class="campo">
          <input type="submit" value="Actualizar" class="guardar_estudiante">
        </div>
      </form>
     </main>
   </body>
</html>

