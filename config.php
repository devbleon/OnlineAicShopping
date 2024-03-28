
<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'supportReddy');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ecommerece');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) {
    array_push($errors, "Se requiee el nombre de usuario");
  }
  if (empty($email)) {
    array_push($errors, "Se requiere el correo elctrónico");
  }
  if (empty($password_1)) {
    array_push($errors, "Se requiere la contraseña");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "Las dos contraseñas no coinciden");
  }

  $user_check_query = "SELECT * FROM register WHERE Name='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['Name'] === $username) {
      array_push($errors, "El nombre de usuario ya existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "El correo electrónico ya existe");
    }
  }

  if (count($errors) == 0) {
    $password = md5($password_1);

    $query = "INSERT INTO register (Name, email, password) 
  			  VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['Name'] = $username;
    $_SESSION['success'] = "Ahora esá conectado";
    header('location: index.php');
  }
}
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Se requiere un correo electrónico");
  }
  if (empty($password)) {
    array_push($errors, "Se requiere una contraseña");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM register WHERE email='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $username;
      $_SESSION['success'] = "Ahora está conectado";
      header('location: index.php');
    } else {
      array_push($errors, "Combinación incorrecta de nombre de usuario/contraseña");
    }
  }
}

?>