
            let btnAgregar= document.getElementById("btnAgregar");
            let nombre= document.getElementById("inputNom");
            let msgNombre= document.getElementById("msgNombre");
            let precio= document.getElementById("precio");
           // let marca= document.querySelector("select[name=Marca]");
			//let categoria= document.querySelector("select[name=Categoria]");
           let detalle= document.getElementById("detalle");
          // let imagen= document.getElementById("imagen");
           let stock= document.getElementById("stock");

            btnAgregar.disabled=true;

            nombre.focus();

           nombre.addEventListener("focusout", validacionNombre);
           
           precio.addEventListener("focusout", validacionPrecio);
           detalle.addEventListener("focusout", validacionDetalle);
           stock.addEventListener("focusout", validacionStock);

         function validacionNombre() {
            if (nombre.value=="") {
                msgNombre.value="Nombre requerido";
                nombre.focus();
            }
          }

          function validacionPrecio() {
            if (precio.value=="") {
                
                precio.focus();
            }
          }

         

          function validacionDetalle() {
            if (detalle.value=="") {
                
                detalle.focus();
            } else btnAgregar.disabled=false;   
              
        }
  
        function validacionStock() {
            if (stock.value=="") {
               // alert("El stock no puede ser un valor nulo");
                stock.focus();
            } 
        }
            

          //var expreg = new RegExp("^[0-9]+([,][0-9]+)?$");
          
          

       
       
       