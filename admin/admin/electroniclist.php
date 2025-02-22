<?php
session_start();
include("../../db.php");
error_reporting(0);
if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
  $product_id = $_GET['product_id'];
  $result = mysqli_query($con, "select product_image from products where product_id='$product_id'")
    or die("query is incorrect...");

  list($picture) = mysqli_fetch_array($result);
  $path = "../product_images/$picture";

  if (file_exists($path) == true) {
    unlink($path);
  } else {
  }
  mysqli_query($con, "delete from products where product_id='$product_id'") or die("query is incorrect...");
}

$page = $_GET['page'];

if ($page == "" || $page == "1") {
  $page1 = 0;
} else {
  $page1 = ($page * 10) - 10;
}
include "sidenav.php";
include "topheader.php";
?>
<div class="content">
  <div class="container-fluid">

    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title"> Lista de Productos</h4>
          <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
            <label class="btn btn-sm btn-primary btn-simple active" id="0">
              <input type="radio" name="options" autocomplete="off" checked=""> Electrónica
            </label>
            <label class="btn btn-sm btn-primary btn-simple" id="1">
              <input type="radio" name="options" autocomplete="off"> Sensores
            </label>
            <label class="btn btn-sm btn-primary btn-simple" id="2">
              <input type="radio" name="options" autocomplete="off"> Impresoras
            </label>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table table-hover tablesorter " id="page1">
              <thead class=" text-primary">
                <tr>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>
                    <a class=" btn btn-primary" href="add_products.php">Agregar Nuevo</a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php

                $result = mysqli_query($con, "select product_id,product_image, product_title,product_price from products  where  product_cat=1  Limit $page1,12") or die("query 1 incorrect.....");

                while (list($product_id, $image, $product_name, $price) = mysqli_fetch_array($result)) {
                  echo "<tr><td><img src='../product_images/$image' style='width:50px; height:50px; border:groove #000'></td><td>$product_name</td>
                        <td>$price</td>
                        <td>
                        <a class=' btn btn-success' href='clothes_list.php?product_id=$product_id&action=delete'>Delete</a>
                        </td></tr>";
                }

                ?>
              </tbody>
            </table>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>
        </div>
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Anterior</span>
            </a>
          </li>
          <?php

          $paging = mysqli_query($con, "select product_id,product_image, product_title,product_price from products");
          $count = mysqli_num_rows($paging);

          $a = $count / 10;
          $a = ceil($a);

          for ($b = 1; $b <= $a; $b++) {
          ?>
            <li class="page-item"><a class="page-link" href="productlist.php?page=<?php echo $b; ?>"><?php echo $b . " "; ?></a></li>
          <?php
          }
          ?>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Siguiente</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>


  </div>
</div>
<?php
include "footer.php";
?>