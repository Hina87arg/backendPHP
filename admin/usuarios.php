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
    <title>Usuarios</title>
    <link href="../lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="navbar_responsive">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="p-4">
                    <div class="nabvaricono">
                        <?php require("menu.php"); ?>
                    </div>
                </div>
            </div>
            <nav class="navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
        <div class="navlink">
            <nav class="navbar navbar-expand-lg justify-content-end ">
                <div class="container-fluid">
                    <div class="navbar-nav">
                        <?php require("menu.php"); ?>
                    </div>
                </div>
            </nav>
        </div>


        <h1>Usuarios</h1>
        <?php
        if (isset($mensaje))
            print("<h3 style='color:#cc00ff'>" . $mensaje . "</h3>");
        ?>
        <a href="usuarios_nueva.php" class="btn btn-outline-info">Nuevo Usuario</a>
    </div>
    <table class="table table-dark table-hover">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>            
            <th>Usuario</th>
            <th>Rol</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        <?php
        require("conexion.php");
        $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
            or die("No se puede conectar con el servidor");
        mysqli_select_db($conexion, $base_db)
            or die("No se puede seleccionar la base de datos");
        $instruccion = "select * from usuarios  order by nombre desc";

        $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");

        $nfilas = mysqli_num_rows($consulta);
        for ($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            print('
            <tr>
                <td>' . trim($resultado['nombre']) . '</td>
                <td>' . trim($resultado['apellido']) . '</td>
                <td>' . trim($resultado['usuario']) . '</td>
                <td>' . trim($resultado['rol']) . '</td>  

                <td><a href="usuarios_editar.php?id_usuario=' . $resultado['id_usuario'] . '" class="btn btn-secondary">editar</a></td>
                <td><a href="usuarios_borrar.php?id_usuario=' . $resultado['id_usuario'] . '" class="btn btn-danger" onclick="return confirm(&quot; Desea eliminar &quot;)">borrar</a></td>
            </tr>
            
            ');
        }
        mysqli_close($conexion);
        ?>
    </table>
</body>

</html>