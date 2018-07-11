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

	
	$api = file_get_contents("http://localhost/MercadoTech/api/?d=productos"); // version remota del include... misma funcion, descarga una copia
	$productos=json_decode($api); //objeto standard, si le pongo un segundo parametro que es true me hace un array assoc

	$api = file_get_contents("http://localhost/MercadoTech/api/?d=ultimos"); // version remota del include... misma funcion, descarga una copia
	$ultimos=json_decode($api); //objeto standard, si le pongo un segundo parametro que es true me hace un array assoc
	
	//print_r($productos);
	//print_r($ultimos);
	//die(); para el script hasta esta linea es como un breakpoint

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
	<?php 
		 $i=1;
		 foreach($ultimos as $ultimo) {
		$class= ($i % 3==0) ? "grid-top-chain": null;
	?>
		<!-- Producto #1 -->
		<div class="col-sm-4 col-md-4 chain-grid">
			<a href="./?p=producto"><img class="img-responsive chain" src="<?php echo $ultimo->Imagen ?>" alt=" " /></a>
			<span class="star"></span>
			<div class="grid-chain-bottom">
				<h6><a href="producto.html"><?php echo $ultimo->Nombre ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual"><?php echo $ultimo->Precio ?></span>
					</div>
					<a class="now-get get-cart" href="./?p=producto">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<?php 
		 }
			?>
	
	</div>
	<div class="clearfix"> </div>
</div>
</section>