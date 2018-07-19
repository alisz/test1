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

function Mostrar() {
	
	$conexion=Conexion();

	$mostrar = $conexion->query("SELECT Nombre, Precio, Detalle, Stock FROM productos ORDER BY Precio ASC");
	print_r( $mostrar->fetchAll(PDO::FETCH_ASSOC) );
}

function Agregar($producto) {

	$conexion=Conexion();

	$agregar = $conexion->prepare("INSERT INTO productos (Nombre, Precio, Marca, Categoria, Detalle, Imagen, Stock) VALUES	(:n, :p, :m, :c, :d, :i, :s)");

	$agregar ->bindParam(":n", $producto["Nombre"],    PDO::PARAM_STR);
	$agregar ->bindParam(":p", $producto["Precio"],    PDO::PARAM_STR);
	$agregar ->bindParam(":m", $producto["Marca"],     PDO::PARAM_INT);
	$agregar ->bindParam(":c", $producto["Categoria"], PDO::PARAM_INT);
	$agregar ->bindParam(":d", $producto["Detalle"],   PDO::PARAM_STR);
	$agregar ->bindParam(":i", $producto["Imagen"],    PDO::PARAM_STR);
	$agregar ->bindParam(":s", $producto["Stock"],     PDO::PARAM_INT);

	
	if( $agregar ->execute() ){
		echo "Producto registrado correctamente";
	} else {
		echo "Ocurrio un error :(";
	}
	
}

function Actualizar ($preciofinal, $id) {
	
	$conexion=Conexion();

	$actualizar = $conexion->prepare("UPDATE productos SET Precio = :precio WHERE idProducto = :id");
	$actualizar->bindParam(":precio", $precioFinal, PDO::PARAM_STR);
	$actualizar->bindParam(":id", $id, PDO::PARAM_INT);
	
	
	if ( $actualizar->execute() ) {
		echo "Producto actualizado correctamente!";
	} else {
		echo "Ocurrio un error :(";
	}
	
}

function Borrar ($id) {
	
	$conexion=Conexion();

	$borrar = $conexion->prepare("DELETE FROM productos WHERE idProducto = :id");
	$borrar->bindParam(":id", $id, PDO::PARAM_INT);

	if ( $borrar->execute() ) {
		echo "Producto borrado correctamente!";
	} else {
		echo "Ocurrio un error :(";
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////
// Testeo de las funciones
//////////////////////////////////////////////////////////////////////////////////////////////


//Mostrar();

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

//Actualizar(20.5, 1);

Borrar(2);


?>