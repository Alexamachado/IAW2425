<?php 
if (isset($_GET["columna"])) {
           $columna = htmlspecialchars(trim(mysqli_real_escape_string($enlace, $_GET['columna'])));
           $orden = htmlspecialchars(trim(mysqli_real_escape_string($enlace, $_GET['orden'])));
        
        /* $order = [
        "titulo" => "DESC",
        "tipo" => "DESC",
        "departamento" => "DESC",
        "Presponsable" => "DESC",
        "trimestre" => "DESC",
        "Finicio" => "DESC",
        "Ffin" => "DESC",
        "Hinicio" => "DESC",
        "Hfin" => "DESC",
        "organizador" => "DESC",
        "acompanantes" => "DESC",
        "ubicacion" => "DESC",
        "coste" => "DESC",
        "Talumnos" => "DESC",
        "objetivo" => "DESC",
        "aprobada" => "DESC"
    ];*/

    // Flip the order if it's currently ASC
    if ($orden == "ASC") {
        $order[$columna] = "DESC";
    } else {
        $order[$columna] = "ASC";
    }

    // Build the query based on the column and order
    switch ($columna) {
        case "titulo":
            $query = "SELECT * FROM actividad ORDER BY titulo " . $order['titulo'] . " LIMIT $start, 5";
            break;
        case "tipo":
            $query = "SELECT A.* FROM actividad A, tipo_actividad T WHERE T.id_tipo=A.id_tipo ORDER BY nombre " . $order['tipo'] . " LIMIT $start, 5";
            break;
        case "departamento":
            $query = "SELECT A.* FROM actividad A, departamento D WHERE D.id_departamento=A.id_departamento ORDER BY nombre " . $order['departamento'] . " LIMIT $start, 5";
            break;
        case "Presponsable":
            $query = "SELECT A.* FROM actividad A, profesor_responsable PR WHERE PR.id_profesor_responsable=A.id_profesor_responsable ORDER BY nombre " . " LIMIT $start, 5";
            break;
        case "trimestre":
            $query = "SELECT * FROM actividad ORDER BY trimestre " . $order['trimestre'] . " LIMIT $start, 5";
            break;
        case "Finicio":
            $query = "SELECT * FROM actividad ORDER BY fecha_inicio " . $order['Finicio'] . " LIMIT $start, 5";
            break;
        case "Ffin":
            $query = "SELECT * FROM actividad ORDER BY fecha_fin " . $order['Ffin'] . " LIMIT $start, 5";
            break;
        case "Hinicio":
            $query = "SELECT * FROM actividad ORDER BY hora_inicio " . $order['Hinicio'] . " LIMIT $start, 5";
            break;
        case "Hfin":
            $query = "SELECT * FROM actividad ORDER BY hora_fin " . $order['Hfin'] . " LIMIT $start, 5";
            break;
        case "organizador":
            $query = "SELECT A.* FROM actividad A, organizador O, profesor_responsable PR WHERE O.id_organizador=A.id_organizador AND PR.id_profesor_responsable=O.id_profesor_responsable ORDER BY PR.nombre " . $order['organizador'] . " LIMIT $start, 5";
            break;
        case "acompanantes":
            $query = "SELECT * FROM actividad ORDER BY acompanantes " . $order['acompanantes'] . " LIMIT $start, 5";
            break;
        case "ubicacion":
            $query = "SELECT A.* FROM actividad A, ubicacion U WHERE U.id_ubicacion=A.id_ubicacion ORDER BY nombre " . $order['ubicacion'] . " LIMIT $start, 5";
            break;
        case "coste":
            $query = "SELECT * FROM actividad ORDER BY coste " . $order['coste'] . " LIMIT $start, 5";
            break;
        case "Talumnos":
            $query = "SELECT * FROM actividad ORDER BY total_alumnos " . $order['Talumnos'] . " LIMIT $start, 5";
            break;
        case "objetivo":
            $query = "SELECT * FROM actividad ORDER BY objetivo " . $order['objetivo'] . " LIMIT $start, 5";
            break;
        case "aprobada":
            $query = "SELECT * FROM actividad ORDER BY aprobada " . $order['aprobada'] . " LIMIT $start, 5";
            break;
        default:
            die("Error: No modifiques las cabeceras.");
    }
            $resultado = mysqli_query($enlace, $query);
            $filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
          foreach($filas as $fila){
                $qtipo = "SELECT nombre FROM tipo_actividad WHERE id_tipo='$fila[id_tipo]'";
                $rtipo = mysqli_fetch_assoc(mysqli_query($enlace, $qtipo));
                $qdepartamento = "SELECT nombre FROM departamento WHERE id_departamento='$fila[id_departamento]'";
                $rdepartamento = mysqli_fetch_assoc(mysqli_query($enlace, $qdepartamento));
                $qprofesor = "SELECT nombre, apellidos  FROM profesor_responsable WHERE id_profesor_responsable='$fila[id_profesor_responsable]'";
                $rprofesor = mysqli_fetch_assoc(mysqli_query($enlace, $qprofesor));
                $allprofesor = $rprofesor["nombre"] . " " . $rprofesor["apellidos"];
                $porganizador = "SELECT id_profesor_responsable FROM organizador WHERE id_organizador='$fila[id_organizador]'";
                $sorganizador = mysqli_fetch_assoc(mysqli_query($enlace, $porganizador)); 
                $qorganizador = "SELECT nombre, apellidos FROM profesor_responsable WHERE id_profesor_responsable='$sorganizador[id_profesor_responsable]'";
                $rorganizador = mysqli_fetch_assoc(mysqli_query($enlace, $qorganizador));
                $allorganizador = $rorganizador["nombre"] . " " . $rorganizador["apellidos"];
                $qubicacion = "SELECT nombre FROM ubicacion WHERE id_ubicacion='$fila[id_ubicacion]'";
                $rubicacion = mysqli_fetch_assoc(mysqli_query($enlace, $qubicacion));
                $todo .= 
              "<tr> <td>" . $fila["titulo"] . "</td>" . "<td> " . $rtipo["nombre"] . "</td>" .
                "<td>" . $rdepartamento["nombre"] . "</td>" . "<td>" . $allprofesor . "</td>" . 
                "<td>" . $fila["trimestre"] . "</td>" . "<td>" . $fila["fecha_inicio"] . "</td>" .
                "<td>" . $fila["fecha_fin"] . "</td>" . "<td>" . $fila["hora_inicio"] . "</td>" .
                "<td>" . $fila["hora_fin"] . "</td>" . "<td>" . $allorganizador . "</td>" . "<td>" . 
                $fila["acompanantes"] . "</td>" . "<td>" . $rubicacion["nombre"] . "</td>" . "<td>" . 
                $fila["coste"] . "</td>" . "<td>" . $fila["total_alumnos"] . "</td>" . 
                "<td>" . $fila["objetivo"] . "</td>" .  "<td>" . $fila["aprobada"] . "</td> </tr>";
        }
}
?>