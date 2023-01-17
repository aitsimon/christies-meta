<?php

$table = $_POST['table-used'];
$primaryKey = $_POST['primaryKey'];
$columnsJs = $_POST['columns-used'];
$columns = array();
for($i = 0, $iMax = count($columnsJs); $i < $iMax; $i++) {
    $columns[] = array(
        'db' => $columnsJs[$i], 'dt' => $columnsJs[$i]
    );
}
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db' => 'christies',
    'host' => 'localhost'
);
require('../../model/ssp.class.php');
echo json_encode(
    SSP::simple($_POST, $sql_details, $table, $primaryKey, $columns)
);
?>