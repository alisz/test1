<?php 
	// $producto["iphone 7", 599.99, 600];
	// $producto = array("iphone 7", 599.99, 600);
    //print_r($producto);
	//$producto= array(
	//	"nombre" => "iphone 7", 
	//	"precio" => 599.99, 
	//	"stock" => 600
	//);
	//array asociativo 
	//print_r($producto["nombre"])

	
	$api = file_get_contents("http://localhost/MercadoTech/api/"); // version remota del include... misma funcion, descarga una copia
	
	//print_r($api);

	$productos=json_decode($api); //objeto standard, si le pongo un segundo parametro que es true me hace un array assoc

	//print_r ($productos);

?>

<section id="page">
	
	
				<!-- PRODUCTOS DESTACADOS -->
<div class="shoes-grid">
	<div class="products">
		<h5 class="latest-product">PRODUCTOS DESTACADOS</h5>
	</div>
	<div class="product-left">
		<!-- Producto -->
		<?php  //formas de hacerlo con while o for
		//	$contador=0;
		//	while($contador<count($productos)) {
		//	for($i=0;$contador<count($productos);$i++ ) {
		//$producto[$i]["Imagen"] 
		$i=1;
		foreach ($productos as $producto) {
						
			$class= ($i % 3==0) ? "grid-top-chain": null;
			//class va a tomar uno u otro valor, null si es falso o si es verdadero grid-top-... 
			//forma de reeemplazar al if con un operador ternario
					
		?>
		<div class="col-sm-4 col-md-4 chain-grid <?php echo $class ?>">
			<a href="./?p=producto&id=<?php echo $producto->idProducto ?>"><img class="img-responsive chain" src="<?php echo $producto->Imagen ?>" alt=" " /></a>
			<div class="grid-chain-bottom">
				<h6><a href="./?p=producto&id=<?php echo $producto->idProducto ?>"><?php echo $producto->Nombre ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual">$<?php echo $producto->Precio ?></span>
						
					</div>
					<a class="now-get get-cart" href="./?p=producto&id=<?php echo $producto->idProducto ?>">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<?php
		//	$contador++;	
		$i++;	 
		}?>
		<!-- -->
		
<!-- ULTIMOS PRODUCTOS -->
<div class="shoes-grid">
	<div class="products">
		<h5 class="latest-product">ULTIMOS PRODUCTOS</h5>	
		<a class="view-all" href="./?p=producto">VER TODOS<span></span></a>
	</div>
	<div class="product-left">
		<!-- Producto #1 -->
		<div class="col-sm-4 col-md-4 chain-grid">
			<a href="./?p=producto"><img class="img-responsive chain" src="images/productos/P004.jpg" alt=" " /></a>
			<span class="star"></span>
			<div class="grid-chain-bottom">
				<h6><a href="producto.html">Lorem ipsum dolor #1</a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual">$300</span>
					</div>
					<a class="now-get get-cart" href="./?p=producto">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	
	</div>
	<div class="clearfix"> </div>
</div>
</section>