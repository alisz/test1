<?php
	include "../header.php";

	if( !isset($_GET["id"]) || !filter_var($_GET["id"], FILTER_VALIDATE_INT)) header ("location: index.php");

	require "db.php";

	$id= $_GET["id"];

			//busca en el array el id si no lo encuentra tira -1
	$producto= Mostrar($id);
								print_r ($producto);

	if ($producto==-1) haeder ("location: ./?p=404"); 

?>

<div class="container">
	<h1>Editar producto</h1>

	<form method="post" class="form-horizontal" enctype="multipart/form-data">

		<label class="control-label">Nombre:</label>
		<input class="form-control" type="text" name="nombre">

		<label class="control-label">Precio:</label>
		<input class="form-control" type="number" name="precio">

		<label class="control-label">Stock:</label>
		<input class="form-control" type="number" name="stock">

		<label class="control-label">Marca:</label>
		<input class="form-control" type="text" name="marca">

		<label class="control-label">Detalle:</label>
		<textarea class="form-control" rows="5" name="detalle"></textarea>
		
		<label class="control-label">Imagen:</label>
		<input type="file" name="imagen">
		
		<br>
		
		<button type="submit" class="btn btn-default">Guardar</button>

	</form>

</div>

<?php
		include "../footer.php";
	
?>