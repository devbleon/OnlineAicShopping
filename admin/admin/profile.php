<?php
session_start();
include("./includes/db.php");
if (isset($_POST['re_password'])) {
  $email = $_SESSION['admin_email'];

  $old_pass = $_POST['old_pass'];
  $op = md5($old_pass);
  $new_pass = $_POST['new_pass'];
  $re_pass = $_POST['re_pass'];
  $password_query = mysqli_query($con, "select * from admin_info where admin_email='$email'");
  $password_row = mysqli_fetch_array($password_query);
  $database_password = $password_row['admin_password'];
  if ($database_password == $op) {
    if ($new_pass == $re_pass) {
      $pass = md5($re_pass);
      $update_pwd = mysqli_query($con, "UPDATE admin_info set admin_password='$pass' where admin_id='6'");
      echo "<script>alert('Actualizado correctamente'); </script>";
    } else {
      echo "<script>alert('Su nueva contraseña y la que volvio a escribir no coinciden'); </script>";
    }
  } else {
    echo "<script>alert('Tu antigua contraseña es incorrecta'); </script>";
  }
}

include "sidenav.php";
include "topheader.php";

?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Editar Perfil</h4>
            <p class="card-category">Complete su perfil</p>
          </div>
          <div class="card-body">
            <form method="post" action="profile.php">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">
                      <?php if (isset($_SESSION['admin_name'])) : ?><?php echo $_SESSION['admin_name']; ?>
                    <?php endif ?>

                    </label>
                    <input type="text" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Ingresar antigua contraseña</label>
                    <input type="text" class="form-control" name="old_pass" id="npwd">
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Cambiar su contraseña aqui</label>
                    <input type="text" class="form-control" name="new_pass" id="npwd">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Confirmar su contraseña aqui</label>
                    <input type="text" class="form-control" name="re_pass" id="npwd">
                  </div>
                </div>

                <button class="btn btn-primary pull-right" type="submit" name="re_password">Actualizar Perfil</button>

                <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php
include "footer.php";
?>