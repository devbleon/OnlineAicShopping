<?php
session_start();
include "db.php";
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	if (
		empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
		empty($mobile) || empty($address1) || empty($address2)
	) {

		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Porfavor llena todos los registros..!</b>
			</div>
		";
		exit();
	} else {
		if (!preg_match($name, $f_name)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Este $f_name no es válido..!</b>
			</div>
		";
			exit();
		}
		if (!preg_match($name, $l_name)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Este $l_name no es válido..!</b>
			</div>
		";
			exit();
		}
		if (!preg_match($emailValidation, $email)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Este $email no es válido..!</b>
			</div>
		";
			exit();
		}
		if (strlen($password) < 9) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>La contraseña es débil</b>
			</div>
		";
			exit();
		}
		if (strlen($repassword) < 9) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>La contraseña es débil</b>
			</div>
		";
			exit();
		}
		if ($password != $repassword) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>La contraseña no es la misma</b>
			</div>
		";
		}
		if (!preg_match($number, $mobile)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Número de teléfono $mobile no es válido</b>
			</div>
		";
			exit();
		}
		if (!(strlen($mobile) == 10)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>El número de móvil debe tener 9 dígitos</b>
			</div>
		";
			exit();
		}
		//existing email address in our database
		$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1";
		$check_query = mysqli_query($con, $sql);
		$count_email = mysqli_num_rows($check_query);
		if ($count_email > 0) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>La dirección de correo electrónico ya está disponible | Pruebe con otra dirección de correo electrónico</b>
			</div>
		";
			exit();
		} else {

			$sql = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`, `address1`, `address2`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$password', '$mobile', '$address1', '$address2')";
			$run_query = mysqli_query($con, $sql);
			$_SESSION["uid"] = mysqli_insert_id($con);
			$_SESSION["name"] = $f_name;
			$ip_add = getenv("REMOTE_ADDR");
			$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
			if (mysqli_query($con, $sql)) {
				echo "register_success";
				echo "<script> location.href='store.php'; </script>";
				exit;
			}
		}
	}
}
