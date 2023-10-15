<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['usuario_logueado']))
  header("location:index.php");
?>

<!DOCTYPE html>
<html lang="es">

<head class="header .bg-danger-subtle">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="../lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <div>
    <div class="container-fluid ">
      <div class="navlink">
        <nav class="navbar navbar-expand-lg justify-content-end ">
          <div class="container-fluid">
            <div class="navbar-nav">
              <?php require("menu.php"); ?>
            </div>
          </div>
        </nav>
      </div>
    </div>
</body>

</html>