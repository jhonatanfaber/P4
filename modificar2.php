<?php
include_once('lib.php');
View::start('Modificar Bebidas');
View::navigation();
// Para controlar que no acceden por la url
$datos=User::getLoggedUser();
$adminType=$datos['tipo'];
if(!$adminType == 1){
    exit();
}

$id=$_GET['id'];
$marca=$_GET['marca'];
$stock=$_GET['stock'];
$pvp=$_GET['pvp'];
$marcaCondicion=  strlen($marca);
if($marcaCondicion <3 || $stock <0 || $pvp <0){
    header("location:fallo.php");
}else{
    $array=array($marca,$stock,$pvp,$id);
    $ver = DB::execute_sql('UPDATE bebidas SET marca=?, stock=?,PVP=? where id=?;',$array);
    header("location:listar_bebidas.php");
}




?>