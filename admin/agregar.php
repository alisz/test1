<?php
		require "db.php";

		$marcas=MostrarTodo("marcas");
		//print_r ($marcas);
		$categorias=MostrarTodo("categorias");
		//print_r ($categorias);

		if( $_SERVER["REQUEST_METHOD"] == "POST" ){ //--> Si la peticion http es POST...
								
			$datos = array (
				"Nombre"    => filter_var($_POST["Nombre"], FILTER_SANITIZE_STRING),
				"Precio"    => filter_var($_POST["Precio"], FILTER_SANITIZE_NUMBER_FLOAT),
				"Marca"     => filter_var($_POST["Marca"], FILTER_SANITIZE_NUMBER_INT),
				"Categoria" => filter_var($_POST["Categoria"], FILTER_SANITIZE_NUMBER_INT),
				"Detalle"   => filter_var($_POST["Detalle"], FILTER_SANITIZE_STRING),
				"Imagen"    => "https://image.ibb.co/hK2VTT/sin_foto.jpg",
				"Stock"     => filter_var($_POST["Stock"], FILTER_SANITIZE_NUMBER_INT),
			);

			//print_r($datos);
			//die();
			
			  if (Agregar($datos)) {
					header ("location: index.php?rta=ok");
			} else  header("location: index.php?rta=error");
			
			
		}
		else {
			
			include "../header.php";
		
	
?>

<div class="container">
	<h1>Agregar nuevo producto</h1>

	<form method="POST" class="form-horizontal" enctype="multipart/form-data">

		<label class="control-label">Nombre:</label>
		<input class="form-control" type="text" id="inputNom" name="Nombre" placeholder="Aca va el nombre del producto"><span id="msgNombre"></span>
	    <label class="control-label">Precio:</label>
		<input class="form-control" type="number" step="any" id="precio" name="Precio" placeholder="Precio del producto formato xx.xx">
		<label class="control-label">Stock:</label>
		<input class="form-control" type="number" id="stock" name="Stock" placeholder="Aca va la cantidad de productos">
		<label class="control-label">Marca:</label>
		<select class="form-control" name="Marca">
		<?php 
			  foreach ($marcas as $marca) {
				
	    ?>	
    			<option value="<?php echo $marca["idMarca"]?>"><?php echo $marca["Marca"]?></option>
		<?php 
		      }
		?>
       </select>
	   <label class="control-label">Categoria:</label>
	   <select class="form-control" name="Categoria">
		<?php 
			  foreach ($categorias as $categoria) {
		?>	
    			<option value="<?php echo $categoria["idCategoria"]?>"><?php echo $categoria["Categoria"]?></option>
		<?php 
		      }
		?>
       </select>
	   <label class="control-label">Detalle:</label>
	   <textarea class="form-control" rows="5" id="detalle" name="Detalle" placeholder="Describa brevemente el producto"></textarea>
	   <label class="control-label">Imagen:</label>
	   <input type="file" name="Imagen" placeholder="Seleccione la foto del producto">
	   <br>
	   <button id="btnAgregar" type="submit" class="btn btn-default">Agregar</button>
	</form>
</div>

<?php
		include "../footer.php";
		}
?>
<script src="js/formAgregarProducto.js"></script> 