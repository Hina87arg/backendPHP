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
    <title>Editar Noticias</title>
    <link href="../lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <div class="container">
        <?php require("menu.php"); ?>
        <h1>Editar Usuario</h1>
        <?php
        require("conexion.php");
        $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
            or die("No se puede conectar con el servidor");
        mysqli_select_db($conexion, $base_db)
            or die("No se puede seleccionar la base de datos");
        $instruccion="select * from usuarios where id_usuario=$id_usuario";
        $consulta=mysqli_query($conexion,$instruccion) or die("no pudo consultar");
        $resultado=mysqli_fetch_array($consulta);
       
        if(isset($mensaje))
        print("<h3 style='color:#cc00ff'>".$mensaje."</h3>");
        mysqli_close($conexion);
        ?>
        
            
      
        <form action="usuarios_nueva_guardar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required value="<?php print($resultado['nombre']);?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required value="<?php print($resultado['apellido']);?>">
            </div>            
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" onkeyup="comprobar_usuario(this.value)" required value="<?php print($resultado['usuario']);?>">
                <span id="mensaje"></span>
            </div>               
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="Lector" <?php if($resultado['rol']=="Lector") print("selected");?>>Lector</option>
                    <option value="Contribuidor" <?php if($resultado['rol']=="Contribuidor") print("selected");?>>Contribuidor</option>
                    <option value="Lector/Contribuidor" <?php if($resultado['rol']=="Lector/Contribuidors") print("selected");?>>Lector/Contribuidor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required value="<?php print($resultado['password']);?>">
            </div>
            <div class="mb-3">
            
                <input type="hidden" name="id_usuario" value="<?php print($resultado['id_usuario']);?>">
                <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="GUARDAR">
                <a href="usuarios.php" class="btn btn-info">Regresar</a>
            </div>
            <input type="hidden" name="id_usuario" value="<?php print($resultado['id_usuario']);?>">

        </form>



    </div>

    <div id="librerias">
        <script>
            $(document).ready(function() {
                $('#cuerpo').summernote({
                    height: 200
                });
            });
        </script>

    </div>
</body>

</html>