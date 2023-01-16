<?php
include_once '../../model/DBAdmin.php';
header('Content-Type: application/json');
$db = new DBAdmin();
$table = $_POST['table-used'];
$columnas = $db->getColumns($table);
$a = array();
for ($i = 0; $i<count($columnas); $i++) {
    array_push($a, $columnas[$i]);
}
$array['data']=$a;
echo json_encode($array);