<?php
include_once '../../model/DBAdmin.php';
$table = $_POST['table-used'];
$columns = DBAdmin::getColumns($table);

$json = [];
for ($i = 0, $iMax = count($columns); $i < $iMax; $i++) {
    $array['data'] = $columns[$i];
    $array['title'] =$columns[$i];
    $json['columns'][] = $array;
}

try {
    echo json_encode($json, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo "Error " . $e->getMessage();
}