<?php
include_once 'lib.php';
View::start('Distribuidora');
View::navigation();
$res = DB::execute_sql('SELECT * FROM usuarios;');
$res->setFetchMode(PDO::FETCH_NAMED);

echo '<img src="logo.png" alt="Logo de la empresa" />';
echo '<h2>Ejemplo acceso a tabla</h2>';
echo "<table>\n";
echo "<tr><th>Cuenta</th><th>Nombre</th></tr>\n";
foreach($res->fetchAll() as $usuario){
    echo "<tr>";
    echo "<td>${usuario['usuario']}</td>";
    echo "<td>${usuario['nombre']}</td>";
    echo "</tr>\n";
}
echo "</table>\n";
View::end();
