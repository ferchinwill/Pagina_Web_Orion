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
                        <h1 class="section-login-2-title">¡Inicio de Sesion!</h1>


                        <form method="get" class="section-login-2-form">
                            <div class="login-form-1">
                                <label for="input-email" >Correo</label>
                                <input type="text" id="input-email"name="Correo" placeholder="john@example.com" required>
                            </div>
                            <div>
                           
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
                                <p>No tienes una cuenta? <a href="page_Registro.php">¡Registrate!</a></p>
                            </div>
                            
                         
                             
                             
                             
                        </form>
                        <?php
                            
                             // Conectar a la base de datos
                             $servername = "localhost";
                             $username = "root";
                             $password = "";
                             $dbname = "loginextintoresweb";
                             $conn = mysqli_connect($servername, $username, $password, $dbname);
                                                          
                             // Verificar la conexión
                             if (!$conn) {
                                 die("Conexión fallida: " . mysqli_connect_error());
                             }
                                                          
                             // Validar los datos ingresados en el formulario de registro
                             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                 $correo = mysqli_real_escape_string($conn, $_POST["Correo"]);
                                 $nombre = mysqli_real_escape_string($conn, $_POST["Nombre"]);
                                 $empresa = mysqli_real_escape_string($conn, $_POST["NameEmpresa"]);
                                 $contraseña = mysqli_real_escape_string($conn, $_POST["Contraseña"]);
                                                              
                                 // Validar que el correo no exista en la base de datos
                                 $sql = "SELECT * FROM usuarios WHERE Correo = '$correo'";
                                 $result = mysqli_query($conn, $sql);
                                 if (mysqli_num_rows($result) > 0) {
                                     echo "El correo ya se encuentra registrado. <a href='page_InicioSesion.php'>Iniciar sesión</a>";
                                     exit();
                                 }
                             }
                                                          
                             // Verificar los datos ingresados al iniciar sesión
                             if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                 $correo = mysqli_real_escape_string($conn, $_GET["Correo"]);
                                 $contraseña = mysqli_real_escape_string($conn, $_GET["Contraseña"]);
                                                              
                                 // Buscar el correo y la contraseña en la base de datos
                                 $sql = "SELECT * FROM usuarios WHERE Correo = '$correo' AND Contraseña = '$contraseña'";
                                 $result = mysqli_query($conn, $sql);

                              
                                 if (mysqli_num_rows($result) == 1) {
                                     echo "Inicio de sesión exitoso.";
                                     // Redirigir a la página de inicio de sesión exitoso
                                     header("Location: pagina-exitosa.html");
                                     exit(); // Asegurarse de que el código se detenga después de la redirección
                                 } else {
                                     echo "El correo o la contraseña son incorrectos.";
                                 }
                             }
                                                          
                             mysqli_close($conn);
                                                          
                        ?>  
                            
                    </div>
                </div>
            </div>
        </section>
    </main>

</html>