<?php
include_once ('Mailer.php');
$c1 = new \correo\Mailer('comercioaitor@gmail.com','aitorsimon99@gmail.com');
$c2= new \correo\Mailer('comercioaitor@gmail.com','comercioaitor@gmail.com','aitorsimon99@gmail.com');
$c3= new \correo\Mailer('comercioaitor@gmail.com','comercioaitor@gmail.com','aitorsimon99@gmail.com','php.png');
$c3->mandarMail();
?>