<div class="main main-raised">
	<div class="container mainn-raised" style="width:100%;">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->


			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<div class="item active">
					<img src="img/bn5.png" alt="Los Angeles" style="width:100%;">

				</div>

				<div class="item">
					<img src="img/bn2.png" style="width:100%;">

				</div>

				<div class="item">
					<img src="img/bn4.png" alt="New York" style="width:100%;">

				</div>
				<div class="item">
					<img src="img/bn1.png" alt="New York" style="width:100%;">

				</div>
				<div class="item">
					<img src="img/bn3.png" alt="New York" style="width:100%;">

				</div>

			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Siguiente</span>
			</a>
		</div>
	</div>



	<!-- SECTION -->
	<div class="section mainn mainn-raised">


		<!-- container -->
		<div class="container">

			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<a href="product.php?p=78">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop2.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Impresora<br>Collección</h3>
								<a href="product.php?p=78" class="cta-btn">Comprar ahora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<a href="product.php?p=72">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop3.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Sensores<br>Collección</h3>
								<a href="product.php?p=72" class="cta-btn">Comprar ahora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<a href="product.php?p=79">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop1.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Camaras de seguridad<br>Collección</h3>
								<a href="product.php?p=79" class="cta-btn">Comprar Ahora<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Nuevos Productos</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Tableros</a></li>
								<li><a data-toggle="tab" href="#tab1">Micro PLC</a></li>
								<li><a data-toggle="tab" href="#tab1">Detectores de humo</a></li>
								<li><a data-toggle="tab" href="#tab1">Lámparas de emergencia</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12 mainn mainn-raised">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">

									<?php
									include 'db.php';


									$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 70 AND 75";
									$run_query = mysqli_query($con, $product_query);
									if (mysqli_num_rows($run_query) > 0) {

										while ($row = mysqli_fetch_array($run_query)) {
											$pro_id    = $row['product_id'];
											$pro_cat   = $row['product_cat'];
											$pro_brand = $row['product_brand'];
											$pro_title = $row['product_title'];
											$pro_price = $row['product_price'];
											$pro_image = $row['product_image'];

											$cat_name = $row["cat_title"];

											echo "
				
                        
                                
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>Nuevo</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>S/990.00</del></h4>
										<div class='product-rating'>";
											$rating_query = "SELECT ROUND(AVG(rating),1) AS avg_rating  FROM reviews WHERE product_id='$pro_id '";
											$run_review_query = mysqli_query($con, $rating_query);
											$review_row = mysqli_fetch_array($run_review_query);

											if ($review_row > 0) {
												$avg_count = $review_row["avg_rating"];
												$i = 1;
												while ($i <= round($avg_count)) {
													$i++;
													echo '
													<i class="fa fa-star"></i>';
												}
												$i = 1;
												while ($i <= 5 - round($avg_count)) {
													$i++;
													echo '
													<i class="fa fa-star-o empty"></i>';
												}
											}
											echo "</div>
										<div class='product-btns'>
											<button pid='$pro_id' id='wishlist' class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>Agregar a lista de deseos</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>Agregar para comparar</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>Vista rápida</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> agregar al carrito</button>
									</div>
								</div>
                               
							
                        
			";
										};
									}
									?>
									<!-- product -->


									<!-- /product -->


									<!-- /product -->
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section mainn mainn-raised">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3>02</h3>
									<span>Días</span>
								</div>
							</li>
							<li>
								<div>
									<h3>10</h3>
									<span>Horas</span>
								</div>
							</li>
							<li>
								<div>
									<h3>34</h3>
									<span>Minutos</span>
								</div>
							</li>
							<li>
								<div>
									<h3>60</h3>
									<span>Segundos</span>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase">Gran oferta esta semana</h2>
						<p>Nueva colección hasta 50% DE DESCUENTO</p>
						<a class="primary-btn cta-btn" href="store.php">Comprar Ahora</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->


	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Más vendidos</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab2">Impresoras</a></li>
								<li><a data-toggle="tab" href="#tab2">Camaras de Seguridad</a></li>
								<li><a data-toggle="tab" href="#tab2">Tableros Adosables Eléctricos</a></li>
								<li><a data-toggle="tab" href="#tab2">Lampara de Emergencia</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12 mainn mainn-raised">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab2" class="tab-pane fade in active">
								<div class="products-slick" data-nav="#slick-nav-2">
									<!-- product -->
									<?php
									include 'db.php';


									$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 59 AND 65";
									$run_query = mysqli_query($con, $product_query);
									if (mysqli_num_rows($run_query) > 0) {

										while ($row = mysqli_fetch_array($run_query)) {
											$pro_id    = $row['product_id'];
											$pro_cat   = $row['product_cat'];
											$pro_brand = $row['product_brand'];
											$pro_title = $row['product_title'];
											$pro_price = $row['product_price'];
											$pro_image = $row['product_image'];

											$cat_name = $row["cat_title"];

											echo "
				
                        
                                
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>Nuevo</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>S/990.00</del></h4>
										<div class='product-rating'>";
											$rating_query = "SELECT ROUND(AVG(rating),1) AS avg_rating  FROM reviews WHERE product_id='$pro_id '";
											$run_review_query = mysqli_query($con, $rating_query);
											$review_row = mysqli_fetch_array($run_review_query);

											if ($review_row > 0) {
												$avg_count = $review_row["avg_rating"];
												$i = 1;
												while ($i <= round($avg_count)) {
													$i++;
													echo '
													<i class="fa fa-star"></i>';
												}
												$i = 1;
												while ($i <= 5 - round($avg_count)) {
													$i++;
													echo '
													<i class="fa fa-star-o empty"></i>';
												}
											}
											echo "</div>
										<div class='product-btns'>
											<button pid='$pro_id' id='wishlist' class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>Agregar a lista de favoritos</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>Agregar para comparar</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>Vista rápida</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> Agregar al carrito</button>
									</div>
								</div>
                               
							
                        
			";
										};
									}
									?>

									<!-- /product -->
								</div>
								<div id="slick-nav-2" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Top selling</h4>
						<div class="section-nav">
							<div id="slick-nav-3" class="products-slick-nav"></div>
						</div>
					</div>


					<div class="products-widget-slick" data-nav="#slick-nav-3">
						<div id="get_product_home">
							<!-- product widget -->

							<!-- product widget -->
						</div>

						<div id="get_product_home2">
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoría</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/shop3.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoría</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Top selling</h4>
						<div class="section-nav">
							<div id="slick-nav-4" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-4">
						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product04.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoría</p>
									<h3 class="product-name"><a href="#">el nombre del producto va aquí</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product05.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoría</p>
									<h3 class="product-name"><a href="#">el nombre del producto va aquí</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product06.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoría</p>
									<h3 class="product-name"><a href="#">el nombre del producto va aquí</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product07.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoría</p>
									<h3 class="product-name"><a href="#">el nombre del producto va aquí</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product08.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoría</p>
									<h3 class="product-name"><a href="#">el nombre del producto va aquí</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product09.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Categoría</p>
									<h3 class="product-name"><a href="#">el nombre del producto va aquí</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>
					</div>
				</div>

				<div class="clearfix visible-sm visible-xs">

				</div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Top selling</h4>
						<div class="section-nav">
							<div id="slick-nav-5" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-5">
						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product04.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->


							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product05.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product06.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">S/980.00 <del class="product-old-price">S/885.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
</div>