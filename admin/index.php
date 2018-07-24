<?php
	include "../header.php";
?>
<div class="container">
	<cite>
		Bienvenido Cosme Fulanito
		<a href="#" style="float:right">[x] Cerrar sesion</a>
	</cite>

	<h1>Listado de Productos</h1>

	
	<a href="agregar.php" style="float:right">
		<button>+ Nuevo producto</button>
	</a>

	<div class="table-responsive">

		<table class="table table-striped"">
			<tr>
				<th>#ID</th>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Stock</th>
				<th>Acciones</th>
			</tr>
			<!-- PLANTILLA DE UN PRODUCTO -->
			<tr>
				<td class="text-center"> 0 </td>
				<td class="text-center"><img src="https://image.ibb.co/hK2VTT/sin_foto.jpg" alt="" width="100"></td>
				<td class="text-center"> Copilla </td>
				<td class="text-center"> $12.99 </td>
				<td class="text-center"> 300 unid. </td>
				<td class="text-center">
					<a href="#">Actualizar</a>
					<a href="#">Eliminar</a>
				</td>
			</tr>
		</table>

	</div>
</div>
<?php include "../footer.php"; ?>