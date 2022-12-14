<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM Usuario WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Identificacion y Registro de Usuarios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido/a. <?= $user['email']; ?>
      <br>Estás Identificado
      <a href="logout.php">
        Desconectar
      </a>
    <?php else: ?>
      <h1>Por favor Identificate o Registrate</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">Registro</a>
    <?php endif; ?>
  </body>
</html>
