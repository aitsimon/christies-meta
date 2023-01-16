<?php
$action = '';
//$db =new DBManagerUsers();
if(isset($_SESSION['action'])){
    $action = $_SESSION['action'];
}
if($action==='update'){

}

$table = 'user';
$primaryKey = 'user_id';
$columns = array(
    array('db' => 'user_id', 'dt' => 'user_id'),
    array('db' => 'email', 'dt' => 'email'),
    array('db' => 'password', 'dt' => 'password'),
    array('db' => 'rol', 'dt' => 'rol'),
    array('db' => 'tokens', 'dt' => 'tokens'),
    array('db' => 'telph', 'dt' => 'telph'),
);

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