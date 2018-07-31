<?php
	require 'db.php';

	function crearUsuario($nuevo){
		$conexion = Conexion();

		$email_usuario = filter_var($nuevo["Email"], FILTER_SANITIZE_EMAIL);
		$pass_encriptada = password_hash($nuevo["Pass"], PASSWORD_DEFAULT);

		$usuario = $conexion->prepare("INSERT INTO usuarios (email, password) VALUES (:e, :p)");
		$usuario->bindParam(":e", $email_usuario,   PDO::PARAM_STR);
		$usuario->bindParam(":p", $pass_encriptada, PDO::PARAM_STR);

		if( $usuario->execute() ){
			echo "Usuario registrado :)";
		} else {
			echo "Ocurrio un error, intente de nuevo :(";
		}
		
	}

	function iniciarSesion(){

	}

	function cerrarSesion(){

	}
?>