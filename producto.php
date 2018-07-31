<?php

	if( !isset($_GET["id"]) || !filter_var($_GET["id"], FILTER_VALIDATE_INT)) header ("location: index.php");

	require "admin/db.php";

	$id= $_GET["id"];

 
			//busca en el array el id si no lo encuentra tira -1
	$producto= Mostrar($id);
								//print_r ($producto);

	if ($producto==-1) haeder ("location: ./?p=404"); 

?>

<section id="page">
				<div class="single_top">
	<div class="single_grid">
		<div class="grid images_3_of_2">
			<ul id="etalage">
				<li>
					<img class="etalage_thumb_image" src="<?php echo $producto["Imagen"] ?>" class="img-responsive" />
				</li>
			</ul>
			<div class="clearfix"></div>		
		</div>
		<div class="desc1 span_3_of_2">
			<h4><?php echo $producto["Nombre"] ?></h4>
			<div class="cart-b">
				<div class="left-n ">$<?php echo $producto["Precio"] ?></div>
				<a class="now-get get-cart-in" href="#">COMPRAR</a> 
				<div class="clearfix"></div>
			</div>
			<h6><?php echo $producto["Stock"] ?> unid. en stock</h6>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			<div class="share">
				<h5>Compartir Producto:</h5>
				<ul class="share_nav">
					<li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
					<li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
					<li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
					<li><a href="#"><img src="images/gpluse.png" title="Google+"></a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
			</section>