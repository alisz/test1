<?php
	require 'db.php';

	if (isset($_GET["accion"]) && $_GET["accion"]=="cerrar") cerrarSesion();

	function crearUsuario($nuevo){
		$conexion = Conexion();

		$nombre_usuario= $nuevo["Nombre"];
		$apellido_usuario= $nuevo["Apellido"];
		$email_usuario = filter_var($nuevo["Email"], FILTER_SANITIZE_EMAIL);
		$pass_encriptada = password_hash($nuevo["Pass"], PASSWORD_DEFAULT);

		$usuario = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, email, password) VALUES (:n, :a, :e, :p)");
		$usuario->bindParam(":n", $nombre_usuario,     PDO::PARAM_STR);
		$usuario->bindParam(":a", $apellido_usuario,   PDO::PARAM_STR);
		$usuario->bindParam(":e", $email_usuario,      PDO::PARAM_STR);
		$usuario->bindParam(":p", $pass_encriptada,    PDO::PARAM_STR);

		if( $usuario->execute() ){
			echo "Usuario registrado :)";
		} else {
			echo "Ocurrio un error, intente de nuevo :(";
		}
		
	}

	function iniciarSesion($datos){
		
		
		$conexion = Conexion();

		$email_usuario = filter_var($datos["mail"], FILTER_SANITIZE_EMAIL);
		$pass_usuario = filter_var($datos["pass"], FILTER_SANITIZE_SPECIAL_CHARS );
		

		$usuario = $conexion->prepare("SELECT * FROM usuarios WHERE email= :e");
		$usuario->bindParam(":e", $email_usuario, PDO::PARAM_STR);

		if ($usuario->execute() && $usuario->rowCount()==1){
			 //El usuario existe
									//print_r($usuario->fetch(PDO::FETCH_ASSOC));
									//die();
			$usuario=$usuario->fetch(PDO::FETCH_ASSOC); // con esto sobreescribo y borro todo 
					//print_r($usuario);
					//die();	    					//lo que tenga que ver con la conexion

			if (password_verify($pass_usuario, $usuario["password"])){
					//password_verify, busca el algoritmo y desencripta
					//Si estoy aca el usuario inicio sesion
					session_start();
					$_SESSION["usuario"]= array (   //supervariable persistente, queda como cookie
						"id"   => $usuario["idUsuario"],
						"nombre"   => $usuario["nombre"],
						"email" => $usuario ["email"]
					 );
					 
					 header ("location: admin/index.php");
					// print_r($_SESSION);
					// die;s

					
			}
		}
	}

	function cerrarSesion(){
			session_start();
			unset($_SESSION);
			session_destroy();
			header ("location: ../?p=ingreso");
	}
?>