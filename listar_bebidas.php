<?php
include_once 'lib.php';
View::start('Lista de Bebida');
View::navigation();
// Para controlar que no acceden por la url
$datos=User::getLoggedUser();
$adminType=$datos['tipo'];
if(!$adminType == 1){
    exit();
}

$ver = DB::execute_sql('SELECT * FROM bebidas;');
$ver->setFetchMode(PDO::FETCH_NAMED);
$flag=true;
if($ver){
    echo "<center><table border=2><caption>Listado de Bebidas</caption></center>";
    foreach($ver as $cabecera){
        if($flag){
            echo "<tr>";
            foreach($cabecera as $field=>$value){
                echo "<th> $field </th>";
            }
            echo "</tr>";
            $flag=false;
        }
        echo "<tr>";
        foreach ($cabecera as $field=>$value){
            if($field=="id"){
                $id=$value;
            }
            
            echo "<td> $value </td>";
        }
        echo "<td><a href=modificar.php?ID=$id><input type='button' name='modificar' value='modificar'></td> </tr>";
    }
    echo "</table>";
}
View::end();

?>