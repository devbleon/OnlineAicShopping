<?php
if (isset($_SESSION["uid"])) {
	header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Página de Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet" />
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login_regis.css">
	<link rel="stylesheet" type="text/css" href="css/utils.css">
</head>

<body style="background-color: #e0e0e0;">
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('img/wallpaper.png');-webkit-transform: scaleX(-1);transform: scaleX(-1);"></div>
			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form id="signup_form" onsubmit="return false" class="login100-form validate-form">
					<span class="login100-form-title p-b-59">
						Registrarse
					</span>
					<div class="wrap-input100 validate-input" data-validate="Se requiere sus nombres">
						<span class="label-input100">Nombres Completos</span>
						<input class="input100" type="text" name="f_name" id="f_name" placeholder="Escriba sus nombres aquí...">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Se requiere su apellidos">
						<span class="label-input100">Apellidos Completos</span>
						<input class="input100" type="text" name="l_name" id="l_name" placeholder="Escriba sus apellidos aquí...">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Se requiere un correo electrónico por ejemplo: example@gmail.com">
						<span class="label-input100">Correo</span>
						<input class="input100" type="email" name="email" placeholder="Escriba su correo electrónico aquí...">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Se requier su teléfono móvil maximo 9 digitos">
						<span class="label-input100">Teléfono</span>
						<input class="input100" type="text" name="mobile" id="mobile" placeholder="Escriba el número de su teléfono aquí....">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Se requiere un minimo de 8 caracteres en las que incluyas almenos una mayúscula, minúsculas, números y un caracter especial">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="password" id="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Porfavor podría repetir su contraseña agregada anteriormente">
						<span class="label-input100">Repetir contraseña</span>
						<input class="input100" type="password" name="repassword" id="repassword" placeholder="*************">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Se requiere la dirección donde reside">
						<span class="label-input100">Dirección</span>
						<input class="input100" type="text" name="address1" id="address1" placeholder="Escriba su dirección aquí...">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Se requiere la ciudad donde se encuenta ud.">
						<span class="label-input100">Ciudad</span>
						<input class="input100" type="text" name="address2" id="address2" placeholder="Escriba la ciudad donde reside aquí...">
						<span class="focus-input100"></span>
					</div>
					<div class="">
						<div class="g-recaptcha" data-sitekey="6Lc1axMnAAAAAOIYxCS1DRbtzEzFGCUB8_q3VYNy"></div>
					</div>
					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									Estoy de acuerdo con los
									<a href="#" class="txt2 hov1">
										Terminos de Usuarios
									</a>
								</span>
							</label>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Registrarse
							</button>

						</div>

						<a href="signin_form.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Inciar Sesión
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>

						<a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-40 p-b-10 p-l-180">
							Omitir Inicio de Sesión
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
						<div class="col-md-8" id="signup_msg"></div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="js/login_reg.js"></script>
	<script src="js/actions.js"></script>

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>

</html>