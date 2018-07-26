<?php
	//PDO: PHP Data Object
	//CRUD: Create, Read, Update, Delete | ABM: Alta, Baja y Modificacion
	
	

/////////////////////////////////////////////////////////////////////////////////////////////

function Conexion() {

	require "constantes.php";

	try{
		$conexion = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BASE_DE_DATOS . ";charset=utf8", USUARIO, CLAVE);
		
		return $conexion;
	
	}
    catch  (PDOException $e) {
		print "¡Error!: " . $e->getMessage() . "<br/>";
		die();
	}
}

function Mostrar($id=0) { //parametro condicional si no viene le asigna el valor 0
	
	$conexion=Conexion();
	
	$sqlQuery="SELECT idProducto, Nombre, Precio, Detalle, Imagen, Stock FROM productos ";

	if (!$id) {
		
		$mostrar = $conexion->query($sqlQuery);
		return $mostrar->fetchAll(PDO::FETCH_ASSOC);
	}
	else 
			{
				$sqlQuery= $sqlQuery. " WHERE idProducto= :id";
				$mostrar = $conexion->prepare($sqlQuery);
				$mostrar->bindParam(":id", $id, PDO::PARAM_INT);
				
				if ($mostrar->execute() && $mostrar->rowCount()>0){
					return $mostrar->fetch();
				} else return "producto no encontrado";
			}		
	
}

function MostrarTodo($tabla) {

	$conexion=Conexion();
	
	$sqlQuery="SELECT * FROM " . $tabla;
		
		$mostrar = $conexion->query($sqlQuery);
		return $mostrar->fetchAll(PDO::FETCH_ASSOC);
	


}

function Agregar($producto) {

	$conexion=Conexion();

	$agregar = $conexion->prepare("INSERT INTO productos (Nombre, Precio, idMarca, idCategoria, Detalle, Imagen, Stock) VALUES	(:n, :p, :m, :c, :d, :i, :s)");

	$agregar ->bindParam(":n", $producto["Nombre"],    PDO::PARAM_STR);
	$agregar ->bindParam(":p", $producto["Precio"],    PDO::PARAM_STR);
	$agregar ->bindParam(":m", $producto["Marca"],     PDO::PARAM_INT);
	$agregar ->bindParam(":c", $producto["Categoria"], PDO::PARAM_INT);
	$agregar ->bindParam(":d", $producto["Detalle"],   PDO::PARAM_STR);
	$agregar ->bindParam(":i", $producto["Imagen"],    PDO::PARAM_STR);
	$agregar ->bindParam(":s", $producto["Stock"],     PDO::PARAM_INT);

	
	if( $agregar ->execute() ){
		//echo "Producto registrado correctamente";
		return true;
	} else {
		//echo "Ocurrio un error :(";
		return false;
	}
	
}

function Actualizar ($id, $producto) {
	
	$conexion=Conexion();

	$actualizar = $conexion->prepare("UPDATE productos SET Nombre = :n, Precio = :p, idMarca = :m, idCategoria = :c, 
														   Detalle = :d, Imagen = :i, Stock = :s
														  WHERE idProducto = :id");
	
	$actualizar->bindParam(":id", $id, PDO::PARAM_INT);
	
	$actualizar ->bindParam(":n", $producto["Nombre"],    PDO::PARAM_STR);
	$actualizar ->bindParam(":p", $producto["Precio"],    PDO::PARAM_STR);
	$actualizar ->bindParam(":m", $producto["Marca"],     PDO::PARAM_INT);
	$actualizar ->bindParam(":c", $producto["Categoria"], PDO::PARAM_INT);
	$actualizar ->bindParam(":d", $producto["Detalle"],   PDO::PARAM_STR);
	$actualizar ->bindParam(":i", $producto["Imagen"],    PDO::PARAM_STR);
	$actualizar ->bindParam(":s", $producto["Stock"],     PDO::PARAM_INT);
	
	if ( $actualizar->execute() ) {
		//echo "Producto actualizado correctamente!";
		return true;
	} else {
		//echo "Ocurrio un error :(";
		return false;
	}
	
}

function Borrar ($id) {
	
	$conexion=Conexion();

	$borrar = $conexion->prepare("DELETE FROM productos WHERE idProducto = :id");
	
	$borrar->bindParam(":id", $id, PDO::PARAM_INT);

	if ( $borrar->execute() ) {
		//echo "Producto borrado correctamente!";
		return true;
	} else {
		//echo "Ocurrio un error :(";
		return false;
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////
// Testeo de las funciones
//////////////////////////////////////////////////////////////////////////////////////////////


//print_r (Mostrar());

/* $datos = array (
    	"Nombre"    =>"IPad",
	    "Precio"    => 800.35,
	    "Marca"     => 2,
	    "Categoria" => 1,
	    "Detalle"   => "12.5 pulgadas",
	    "Imagen"    => "sin-foto.jpg",
	    "Stock"     => 100,
 ); */

// Agregar($datos);

// Actualizar(60, $datos);

// Borrar(2);




?>