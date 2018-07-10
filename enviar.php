<?php
	
	require 'mail.config.php';

	/* Formas de "testear" lo que hay en una variable */
	//print_r( $_POST ); //--> Muestra la estructura y datos de una variable de tipo Array
	//var_dump( $_POST ); //--> Muestra la estructura, datos y sus tipos (string, int, float, bool) de una variable de tipo Array

	/* VALIDAR si la peticion http es GET o POST */
	if( $_SERVER["REQUEST_METHOD"] == "POST" ){ //--> Si la peticion http es POST...
		//▼ Aca programo que hacer con los datos del formulario de contacto ▼

		//▼ Validacion del nombre
		if( empty($_POST["nombre"]) || is_numeric($_POST["nombre"]) ){

			echo "Error, ingrese un nombre válido";
		
		} elseif( empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){ // ← Validacion del email
			
			echo "Error, ingrese un e-mail válido";

		} elseif( empty($_POST["mensaje"]) || strlen($_POST["mensaje"])<10 ||  strlen($_POST["mensaje"])>280 ){ // ← Validacion del mensaje
			
			echo "Error, el mensaje no puede tener menos de 10 caracteres y mas de 280 caracteres";

		} else {
			//▼ Aca programo enviar los datos via e-mail (porque son validos!)
			$nombre =  filter_var($_POST["nombre"], FILTER_SANITIZE_SPECIAL_CHARS);
			$email =   filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
			$mensaje = filter_var($_POST["mensaje"], FILTER_SANITIZE_SPECIAL_CHARS);

			$destinatario = "aliciamas@gmail.com";

			$asunto = "Consulta desde MercadoTECH";

			$cuerpo = "<h1>Datos de la consulta</h1>";
			$cuerpo.= "<p>Nombre: {$nombre}</p>";
			$cuerpo.= "<p>E-mail: {$email}</p>";
			$cuerpo.= "<p>Mensaje:</p>";
			$cuerpo.= "<blockquote>{$mensaje}</blockquote>";

			
			# Configuracion del envio
			$mail->setFrom($email, $nombre);			                        // ◄ Emisor
			$mail->addAddress($destinatario, 'Alicia Mastromonaco');	     	// ◄ Destinatario
			//$mail->addReplyTo('info@example.com', 'Information');         	// ◄ E-Mail de respuesta (opcional)
			//$mail->addCC('cc@example.com');					            	// ◄ E-Mail adicional en Copia Compartida (opcional)
  		    //$mail->addBCC('bcc@example.com');					            	// ◄ E-Mail adicional en Copia Compartida Oculta (opcional)
	
		    # Configuracion del email
			$mail->isHTML(true);									// ◄ Soporte para HTML (true/false)
			$mail->Subject = $asunto;								// ◄ Asunto del E-Mail
			$mail->Body = $cuerpo;								// ◄ Cuerpo del E-Mail
			$mail->SMTPDebug = 0;									// ◄ Visualizador para testeo (0: apagado | 1: mensajes del cliente | 2: mensajes del cliente y servidor)

			if($mail->send()) {
				echo "Gracias por su consulta";

			} else echo "Ocurrio un error,  NO SE PUDO ENVIAR";

		}


	} else { //--> Si la peticion http NO es POST
		//▼ Aca programo que el usuario sea redireccionado hacia el formulario de contacto
		header("location: index.php?p=contacto");
	}

?>