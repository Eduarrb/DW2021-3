<?php
    // ⚡⚡ FUNCIONES BASICAS
    function query($sql){
        global $conexion;
        return mysqli_query($conexion, $sql);
    }

    function confirmar($query){
        global $conexion;
        if(!$query){
            die("Fallo en la conexión " . mysqli_error($conexion));
        }
    }

    function fetch_array($query){
        return mysqli_fetch_array($query);
    }

    // ⚡⚡ FUNCIONES FRONT
    function show_categorias(){
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        while($fila = fetch_array($query)){
            $categorias = <<<DELIMITADOR
                <li class="nav-item"><a class="nav-link" href="#">{$fila['cat_nombre']}</a></li> 
DELIMITADOR;
            echo $categorias;
        }
    }
    // ⚡⚡ FUNCIONES BACK
?>