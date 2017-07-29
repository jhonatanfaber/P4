<?php
include_once('lib.php');
View::start('Modificar Bebida');
View::navigation();
// Para controlar que no acceden por la url
$datos=User::getLoggedUser();
$adminType=$datos['tipo'];
if(!$adminType == 1){
    exit();
}

$id=$_GET['ID'];
$array=array($id);
$ver=DB::execute_sql('SELECT * FROM bebidas where id=?',$array);
$ver->setFetchMode(PDO::FETCH_OBJ);

if($ver){
    foreach ($ver as $cabecera){
        $marca= $cabecera->marca;
        $stock= $cabecera->stock;
        $pvp= $cabecera->PVP;
    }
}
    
    echo "<form action='modificar2.php' method='get' name='formulario' onsubmit='return validar();'>";
    echo "<p> Modificar Bebida </p>";
    echo "<input type='hidden' name='id' value='$id'><br>";
    echo "Marca: <br><input type='text' name='marca' value='$marca'> <div id='errorMarca'></div>";
    echo "Stock: <br><input type='text' name='stock' value='$stock'><div id='errorStock'></div>";
    echo "PVP: <br><input type='text' name='pvp' value='$pvp'><div id='errorPrecio'></div>";
    echo "<input type='submit' name='aceptar' value='Aceptar'>";
    echo "</form>";



View::end();
?>

