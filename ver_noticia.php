<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Noticias</title>
    <link href="lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="admin/style.css">
</head>

<body>
    <div class="container-fluid">
        <?php // require("menu.php"); 
        ?>
        <h1>Diario Otaku</h1>

        <h2>Noticias</h2>
        <div class="row">
        <?php
        extract($_REQUEST);
        require("admin/conexion.php");
        $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
            or die("No se puede conectar con el servidor");
        mysqli_select_db($conexion, $base_db)
            or die("No se puede seleccionar la base de datos");
        $instruccion = "select * from noticias  where id_noticia=".$id_noticia;

        $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");

        $nfilas = mysqli_num_rows($consulta);
        for ($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            $inst2="select * from usuarios where id_usuario='".$resultado['id_usuario']."'";
              $consulta2=mysqli_query($conexion, $inst2) or die("no puedo consultar");
              $autor = mysqli_fetch_array($consulta2);
            print('
            <div class="col-12">
                <div class="card">
                <img src="imagenes_subidas/'.$resultado['imagen'].'" class="card-img-top" alt="'.$resultado['titulo'].'">
                    <div class="card-body">
                            <h4 class="card-title">'.$resultado['titulo'].'</h4>
                        <h6 class="card-text">'.substr($resultado['copete'],0,300).'</h6>
                        <p class="card-text">'.$autor['usuario'].'</p>
                        <p class="card-text">'.substr($resultado['cuerpo'],0,40000).'</p>
                        <a href="javascript:history.back()" class="btn btn-dark">Volver al inicio</a>
                    </div>
                 </div>
            </div>





           
            
            ');
        }
        mysqli_close($conexion);
        ?>
        </div>

</body>

</html>