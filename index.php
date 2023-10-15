<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="admin/style.css">
</head>

<body>
    <div class="banner">
        <img src="images/collage.png" alt="" width="1350" height="400">
        <h1>Diario Otaku</h1>
    </div>
    <div class="container">
        <div class="container-fluid">

            <header>
                <h2>Noticias</h2>
                <div id="navbar-index ">
                    <div class="navbar_responsive">
                        <div class="collapse" id="navbarToggleExternalContent">
                            <div class="p-4">
                                <?php require("menu2.php"); ?>
                            </div>
                        </div>
                        <nav class="navbar">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarToggleExternalContent"
                                    aria-controls="navbarToggleExternalContent" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                    <div class="navlink">
                        <nav class="navbar navbar-expand-lg justify-content-end ">
                            <div class="container-fluid">
                                <div class="navbar-nav">
                                    <?php require("menu2.php"); ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>



            <div class="row">
                <?php
                require("admin/conexion.php");
                $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
                    or die("No se puede conectar con el servidor");
                mysqli_select_db($conexion, $base_db)
                    or die("No se puede seleccionar la base de datos");
                $instruccion = "select * from noticias  order by fecha desc LIMIT 10";

                $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");

                $nfilas = mysqli_num_rows($consulta);
                for ($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_array($consulta);
                    $inst2="select * from usuarios where id_usuario='".$resultado['id_usuario']."'";
                    $consulta2=mysqli_query($conexion, $inst2) or die("no puedo consultar");
                    $autor = mysqli_fetch_array($consulta2);
                    print('
            <div class="col-4">
                <div class="card">
                <img src="imagenes_subidas/' . $resultado['imagen'] . '" class="figure-img img-fluid rounded" style="size: 18rem;" alt="' . $resultado['titulo'] . '">
                    <div class="card-body">
                            <h5 class="card-title">' . $resultado['titulo'] . '</h5>
                        <p class="card-text">' . substr($resultado['copete'], 0, 40) . '</p>
                        <p class="card-title">' . $autor['usuario'] . '</p>
                        <a href="ver_noticia.php?id_noticia=' . $resultado['id_noticia'] . '" class="btn btn-dark">Leer más</a>
                    </div>
                 </div>
            </div>





           
            
            ');
                }
                mysqli_close($conexion);
                ?>
            </div>
        </div>
    </div>
</body>

</html>