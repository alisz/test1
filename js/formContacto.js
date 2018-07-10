const formulario = document.querySelector("form");  //let reemplaza a var const lo guarda coomo constante
	
	formulario.onsubmit= function(evento) {
		document.querySelector("h6").innerHTML="";
			// en esta funcion capturo el evento submit y en vez de que lo envie el navegador lo voy a enviar yo desde 
			//javascript, en un hipervinculo el evento es onclick
			evento.preventDefault(); //frena el envio
			//console.log(evento);
            
            let nombre= document.querySelector("input[name=nombre]").value;
			let email= document.querySelector("input[name=email]").value;
			let mensaje= document.querySelector("textarea[name=mensaje]").value;

			//en esta parte podria validar los campos
           
            let datos = `nombre=${nombre}&email=${email}&mensaje=${mensaje}`; //para armar cadenas con variables uso esta sintaxis

			let btnEnviar= document.querySelector("input[type=submit]");
			btnEnviar.value="Enviando...";
			btnEnviar.disabled= true;

			let peticion = new XMLHttpRequest();
			peticion.open("POST","enviar.php");
			peticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // con esto le pido que peticion se comporte como un formulario
            
            peticion.onload = function() {
				
				// aca recibo la respuesta del servidor, hago o que me parece
               if (peticion.status==200) {
				
					//alert(peticion.response);
				document.querySelector("h6").innerHTML= peticion.response;
				btnEnviar.value="Enviar";
				btnEnviar.disabled= false;

			   }
			   else {
			//	header("location: index.php?p=404")
				location.href ="/index.php?p=404"; ///verrrrr
			   }
				
            } 

            peticion.send(datos);

	} 