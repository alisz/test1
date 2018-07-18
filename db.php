<?php 

    //PDO: PHP Data OBject
    $servidor= "localhost";
    $usuario= "root";
    $clave= "";
    $base_datos= "mercadotech";

 try{
         $conexion= new PDO("mysql:host={$servidor};dbname={$base_datos};charset=utf8", $usuario, $clave);
         sleep(5);
         //CRUD : create, read, update, delete | ABM
#1 Crear datos
                                                   $producto = array (
                                                      "Nombre"=>"IPad",
                                                       "Precio" => 800.35,
                                                       "Marca" => 2,
                                                       "Categoria" => 1,
                                                       "Detalle" => "12.5 pulgadas",
                                                       "Imagen" => "sin-foto.jpg",
                                                       "Stock" => 100,
                                                   );

         $sql="INSERT INTO productos 
                           (Nombre, Precio, Marca, Categoria, Detalle, Imagen, Stock) 
                           VALUES
                           (:n, :p, :m, :c, :d, :i, :s)";  //plantilla sql
                          
                          
                                                 // ('{$producto["Nombre"]}', {$producto["Precio"]}, {$producto["Marca"]}, {$producto["Categoria"]},'{$producto["Detalle"]}','{$producto["Imagen"]}',{$producto["Stock"]})";

                                
                                                   // $insertar= $conexion -> query($sql);  //operacion directa
                                                   // query no me sirve para esta operacion es demasiado engorroso.
                                                   // creo una plantilla sql y la dejo preparada

         $insertar= $conexion ->prepare($sql); //preparo pero no ejecuto opracion indirecta.
         //aca voy a setear los datos a insertar dato, origen de datos, y tipo de dato
         $insertar->bindParam(":n", $producto["Nombre"], PDO:: PARAM_STR );
         $insertar->bindParam(":p", $producto["Precio"], PDO:: PARAM_STR ); 
         $insertar->bindParam(":m", $producto["Marca"], PDO::PARAM_INT );
         $insertar->bindParam(":c", $producto["Categoria"], PDO:: PARAM_INT );
         $insertar->bindParam(":d", $producto["Detalle"], PDO:: PARAM_STR );
         $insertar->bindParam(":i", $producto["Imagen"], PDO:: PARAM_STR );
         $insertar->bindParam(":s", $producto["Stock"], PDO:: PARAM_INT );

       //  if ($insertar->execute()==true ) {
       //     echo "producto insertado";
       //  } else echo "error, no se inserto el producto";

         
         
         //var_dump ($insertar);

#2 Visualizar datos

        $obtener= $conexion->query("SELECT * FROM productos");
        print_r ($obtener->fetchAll(PDO::FETCH_ASSOC)); //si voy a traer uno o alguno solo fetch


#3 Actualizar datos

#4 Eliminar datos




 }
 catch  (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>