<?php
		require "db.php";

		$marcas=MostrarTodo("marcas");
		//print_r ($marcas);
		$categorias=MostrarTodo("categorias");
		//print_r ($categorias);

		if( $_SERVER["REQUEST_METHOD"] == "POST" ){ //--> Si la peticion http es POST...
			//▼ Aca programo que hacer con los datos del formulario de contacto ▼
			
			
					//echo "metodo POST";
					//print_r ($_POST);
			////////////////////////////////////////////
			/// Validacion de datos del formulario   //
			//////////////////////////////////////////
			
			/////////////////////////////////////////
			$datos = array (
				"Nombre" => $_POST["Nombre"],
				"Precio" => $_POST["Precio"],
				"Marca" => $_POST["Marca"],
				"Categoria" => $_POST["Categoria"],
				"Detalle" => $_POST["Detalle"],
				"Imagen" => "https://image.ibb.co/hK2VTT/sin_foto.jpg",
				"Stock" => $_POST["Stock"],
			);

			//print_r ($datos);

			if (Agregar($datos)) {
					header ("location: index.php?rta=ok");
			} else  header("location: index.php?rta=error");
			
			
		}
		else {
			//Aca debera mostrar el formulario
			include "../header.php";

		
	
	

		/* VALIDAR si la peticion http es GET o POST */
	
?>

<div class="container">
	<h1>Agregar nuevo producto</h1>

	<form method="POST" class="form-horizontal" enctype="multipart/form-data">

		<label class="control-label">Nombre:</label>
		<input class="form-control" type="text" name="Nombre">

		<label class="control-label">Precio:</label>
		<input class="form-control" type="number" name="Precio">

		<label class="control-label">Stock:</label>
		<input class="form-control" type="number" name="Stock">

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
		<textarea class="form-control" rows="5" name="Detalle"></textarea>
		
		<label class="control-label">Imagen:</label>
		<input type="file" name="Imagen">
		
		<br>
		

		<button type="submit" class="btn btn-default">Guardar</button>

	</form>

</div>

<?php
		include "../footer.php";
		}
?>