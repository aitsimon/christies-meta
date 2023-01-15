<?php
include_once '../model/DBAdmin.php';

$dbadmin = new DBAdmin();
$columns = $dbadmin->getColumns('user');
?>
<table>
    <thead>
    <?php
    foreach ($columns as $column) {
        echo "<th>".$column."</th>";
        }
    ?>
    </thead>
</table>
