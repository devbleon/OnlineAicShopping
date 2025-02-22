<?php include("./server/server.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Registro</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="main" style="padding-top: 90px;">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Admin registrarse aqui</h2>
                        <form method="post" class="register-form" id="register-form" action="login.php">
                            <div class="alert alert-danger">
                                <h4 id="e_msg"><?php include('./server/errors.php'); ?></h4>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="admin_name" id="name" placeholder="Tu nombre" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="admin_email" id="email" placeholder="Tu correo" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_1" id="pass" placeholder="Contraseña" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_2" id="re_pass" placeholder="Repetir la contraseña" />
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="reg_user" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="./assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Ya eres miembro</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>