<?php

include "Conexion.php";

try {
    $consultaSql = "select usuario, correo, password from usuarios";
    $consulta = $con -> prepare($consultaSql);
    $consulta -> execute();
    $resultado = $consulta->fetch(PDO::FETCH_NUM);

    // En modo numerico
    print"<h2><pre>PDO::FETCH_NUM</pre></h2>";
    print"<br>";
    var_dump($resultado);
    print"<br>";
    printf("<b>usuario    = </b> %s <br>",$resultado[1]);
    printf("<b>correo     = </b> %s <br>",$resultado[2]);
    printf("<b>password   = </b> %s <br>",$resultado[3]);
    print"<br><br><br>";

    $consulta->closeCursor();

} catch(PDOException $e) {
    echo "Error de consulta, favor de checar";
    echo $e->getMessage();
}
?>