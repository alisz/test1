<?php

	if( isset($_GET["p"]) ){ //<-- Si existe la supervariable GET con parametro "p"...
		$pagina = $_GET["p"]; //<-- ... asigno a $pagina el valor del parametro "p".
	} else { //<-- Si NO existe el parametro "p" ...
		$pagina = "home"; //<-- ... asigno a $pagina el valor "home" como modulo a cargar por default.
	}

	include "header.php";
?>
<div class="container">
<?php
	
	if( file_exists("{$pagina}.php") ){ //<-- Si "existe" el archivo ***.php ...
		include "{$pagina}.php"; //<-- que incluya el archivo ***.php
	} else { //<-- Si NO existe el archivo ***.php ...
		include "404.php"; //<-- ... que incluya el archivo 404.php
	}


?>
</div>
<?php
	include "footer.php";
?>