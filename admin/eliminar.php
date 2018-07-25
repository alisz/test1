<?php

	if( !isset($_GET["id"]) || !filter_var($_GET["id"], FILTER_VALIDATE_INT)) header ("location: index.php");

	require "db.php";

	$id= $_GET["id"];

	if (Borrar($id)) {
		header ("location: index.php?rta=ok");
} else  header("location: index.php?rta=error");


?>

