<?php
	
	require "db.php";
	if( $_SERVER["REQUEST_METHOD"] == "POST" ){ 
			//aca voy a ejecutar el envio del formulario
			$id= $_POST["id"];

			$datos = array (
				"Nombre" => $_POST["nombre"],
				"Precio" => $_POST["precio"],
				"Marca" => $_POST["marca"],
				"Categoria" => 1,
				"Detalle" => $_POST["detalle"],
				"Imagen" => "https://image.ibb.co/hK2VTT/sin_foto.jpg",
				"Stock" => $_POST["stock"],
			);
			if (Actualizar($id,$datos)) {
					header ("location: index.php?rta=ok");
			} else  header("location: index.php?rta=error");

		//////////////////////////////////////////////////////	
	} else {
		include "../header.php";
		//aca muestra el formulario
		if( !isset($_GET["id"]) || !filter_var($_GET["id"], FILTER_VALIDATE_INT)) header ("location: index.php");

	

				$id= $_GET["id"];

			//busca en el array el id si no lo encuentra tira -1
					$producto= Mostrar($id);
								//print_r ($producto);

			if ($producto==-1) haeder ("location: ./?p=404"); 



?>

<div class="container">
	<h1>Editar producto</h1>

	<form method="post" class="form-horizontal" enctype="multipart/form-data">

		<label class="control-label">Nombre:</label>
		<input class="form-control" type="text" name="nombre" value="<?php echo $producto["Nombre"]?>">

		<label class="control-label">Precio:</label>
		<input class="form-control" type="number" name="precio" value="<?php echo $producto["Precio"]?>">

		<label class="control-label">Stock:</label>
		<input class="form-control" type="number" name="stock" value="<?php echo $producto["Stock"]?>">

		<label class="control-label">Marca:</label>
		<input class="form-control" type="text" name="marca" value="2">

		<label class="control-label">Detalle:</label>
		<textarea class="form-control" rows="5" name="detalle" ><?php echo $producto["Detalle"]?></textarea>
		
		<label class="control-label">Imagen:</label>
		<input type="file" name="imagen">
		
		<br>
		
		<button type="submit" class="btn btn-default">Guardar</button>
		<input type="hidden" name="id" value="<?php echo $producto["idProducto"]?>">
	</form>

</div>

<?php
		include "../footer.php";
	}
	
?>