<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="backend.js">
    <link rel="stylesheet" href="NavBar.css">
    <link rel="stylesheet" href="slider.css">
    <link rel="stylesheet" href="styles_Login.css">
    <link rel="stylesshet" href="socialBarstyle.css">
    <link rel="stylesshet" href="css/font-awesome.min.css">
</head>

<body>

    <div class="social-body">
        <ul>
            <li class="facebook"><a href=""><i class="fa fa-facebook"></i></a></li>
            <li class="twitter"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
        </ul>
    </div>


    <header id="main-header">

        <a id="parteLogo">
            <a class="logoB" href="Page_inicio.html"><img class="logo" src="Logos/logo oficial recorte.png"
                    alt="logo"></a>

        </a> <!-- / #logo-header -->

        <nav>
            <ul>
                <li><a href="page_productos.html">PRODUCTOS </a></li>
                <li><a href="page_servicios.html">SERVICIOS</a></li>
                <li><a href="page_QuienesSomos.html">QUIENES SOMOS</a></li>
                <li><a href="page_Contacto.html">CONTACTO</a></li>
            </ul>
        </nav>

    </header>



    <main>
        <section class="section-login">
            <div class="section-main">
                <div class="section-login-1">
                    <div class="section-login-1-main">

                        <h1 class="section-login-1-title">¡Recuerda!</h1>
                        <p class="section-login-1-text">"Tu puedes ser tu propio bombero"</p>
                        <div class="section-login-1-img">
                            <img src="/img/diseño 2 extintores.png" alt="">
                        </div>

                    </div>
                </div>
                <div class="section-login-2">
                    <div class="section-login-2-main">
                        <h1 class="section-login-2-title">Registro</h1>


                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="section-login-2-form">
                            <div class="login-form-1">
                                <label for="input-email" >Correo</label>
                                <input type="text" id="input-email"name="Correo" placeholder="john@example.com" required>
                            </div>
                            <div>
                            <div class="login-form-2">
                                <label for="input-name">Nombre </label>
                                <input type="text" id="input-name" name="Nombre" placeholder="Nombre " required>
                            </div>
                            <div class="login-form-2">
                                <label for="input-name"> Nombre de Empresa</label>
                                <input type="text" id="input-name" name="NameEmpresa" placeholder="Nombre de Empresa" required>
                            </div>
                            <div class="login-form-3">
                                <label for="input-password">Contraseña</label>
                                <input type="password" id="input-password" name="Contraseña" placeholder="debe contener los 8 caracteres" required>
                            </div>
                            <div class="login-form-4">
                                <input type="checkbox" id="checkbox"  name="checkbox" required>
                                <p>
                                    Al crear una cuenta, usted acepta los <a href="#">Terminos y Condiciones.</a></p>
                            </div>
                            
                            <div class="login-form-submit-btn">
                            <button type="submit">Listo</button>
                            </div>
                            <div class="login-form-5">
                                <p>Ya tienes una cuenta? <a href="page_InicioSesion.php">Inicia Sesión</a></p>
                            </div>

                            <?php
                             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                 // Procesar el formulario
                                 // ...
                             
                                 // Mostrar mensaje de confirmación
                                 echo "Registro correctamente. <a href='page_InicioSesion.php'>Iniciar sesión</a>";
                             }
                             ?>
                             
                             
                             
                        </form>
                        <div id="todolist">
                            <?php                                            /*CONEXION DIRECTA A LA BASE DE DATOS*/       
                            $servidor="localhost";              /*Nombre de nuestro servidor / este informacion viene en phpmyadmin*/
                            $usuario ="root";                   /*nombre de usuario / este informacion viene en phpmyadmin*/
                            $password="";                       /*Nuestra contraseña -- queda vacia porque no tenemos en phpmyadmin*/ 
                            $database="loginextintoresweb";  
                       
                            $conexion= new mysqli($servidor,$usuario , $password, $database);
                            // Verificar la conexión
                            if ($conexion-> connect_error){
                             die("conexion fallida".$conexion->connect_error);     /*testers de fallos */ 
                         }
                              
                            // Obtener los datos enviados por el formulario
                         
                            if (isset($_POST['Correo'], $_POST['Nombre'], $_POST['NameEmpresa'], $_POST['Contraseña'])) {
                             /* Recolectar datos de título, autor, editorial, año y categoría */
                             $Correo =   $_POST['Correo'];
                             $Nombre =    $_POST['Nombre'];
                             $NameEmpresa= $_POST['NameEmpresa'];
                             $Contraseña =      $_POST['Contraseña'];
                             
                             
                             /* Validar los datos recibidos */
                             if (empty($Correo) || empty($Nombre) || empty($NameEmpresa) || empty($Contraseña)) {
                               die("Debe completar todos los campos");
                             }
                             ?>

                             
                             <p class="Report-forms">
                             <?php  
                             /* Insertar los datos en la tabla */
                             $sql = "INSERT INTO login_table (Correo, Nombre, NameEmpresa, Contraseña) VALUES ('$Correo ', '$Nombre', '$NameEmpresa', '$Contraseña')";
                                if ($conexion->query($sql) === TRUE) {
                                  echo "Se guardó correctamente en la tabla";
                                } else {
                                  die("Error al ingresar datos: " . $conexion->error);
                                }
                              } else {
                                echo "Debe proporcionar todos los datos solicitados";
                              }
                              ?>
                          </p>
                           
                       
                    </div>
                </div>
            </div>
        </section>
    </main>

</html>