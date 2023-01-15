<?php
include_once 'model/DBAdmin.php';

$dbadmin = new DBAdmin();
$columns = $dbadmin->getColumns('user');
var_dump($columns);

?>
<style type="text/css">
    table,th,td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
<table>
    <thead>
    <?php
    foreach ($columns as $column) {
        echo "<th>".$column."</th>";
    }
    ?>
    </thead>
</table>
