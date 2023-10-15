<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['usuario_logueado']))
    header("location:index.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="../lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
    <div class="navbar_responsive">
        <div class="collapse p-4 "  id="navbarToggleExternalContent">
            <?php require("menu.php");?>
        </div>
        <nav class="navbar">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
       </div>
        <h1>Noticias Nueva</h1>

        <form action="noticias_nueva_guardar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo" required>
            </div>
            <div class="mb-3">
                <label for="copete" class="form-label">Copete</label>
                <input type="text" class="form-control" id="copete" name="copete" required>
            </div>
            <div class="mb-3">
                <label for="cuerpo" class="form-label">cuerpo</label>
                <textarea  rows="10" class="form-control" id="cuerpo" name="cuerpo" required></textarea>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input  type="file" class="form-control" id="imagen" name="imagen" required></input>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="Anime">Anime</option>
                    <option value="Cultura">Cultura</option>
                    <option value="Manga">Manga</option>
                </select>
            </div>
            <div class="containerBotones d-flex">
            <div class="mb-3">
                <input type="submit" class="btn btn-outline-light" id="enviar" name="enviar" value="GUARDAR">
            </div>
            <div class="mb-3">
                <a href="noticias.php" class="btn btn-outline-light" id="volverNoticias" name="volverNoticias">VOLVER</a>                
            </div>
         </div>
        </form>

        <div id="librerias">
        <script>
            $(document).ready(function() {
                $('#cuerpo').summernote({
                    height: 200
                });
            });
        </script>

    </div>

    </div>
</body>

</html>