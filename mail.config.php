<?php
	require 'lib/phpMailer/PHPMailer.php';
	require 'lib/phpMailer/SMTP.php';
	require 'lib/phpMailer/Exception.php';
	require 'lib/phpMailer/OAuth.php';
	
	use PHPMailer\PHPMailer\PHPMailer;
	
	# Datos del Servidor SMTP
	define("SERVIDOR", 'smtp.gmail.com');
	define("ENCRIPTACION", 'ssl');
	define("PUERTO", 465);
	
	# Datos de la cuenta de envio
	define("USUARIO", 'modestomastro@gmail.com');
	define("CLAVE", 'simon1948');

	$mail = new PHPMailer();

	# Configuracion del sistema de envio
	$mail->isSMTP();
	$mail->Host = SERVIDOR;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = ENCRIPTACION;
	$mail->Port = PUERTO;
	$mail->Username = USUARIO;
	$mail->Password = CLAVE;
?>