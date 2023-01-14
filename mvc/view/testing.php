<?php
include 'model/DBManagerComments.php';
$gestor = new DBManagerComments();
$gestor->deleteComment(1);
$comments = $gestor->getAllComments();
var_dump($comments);
echo "<br><hr><br>";
