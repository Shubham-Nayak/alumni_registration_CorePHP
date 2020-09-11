<?php
$conn=mysqli_connect('localhost','root','','test');

session_start();
session_unset();
session_destroy();
header('Location: http://localhost/registration/index.php');
exit();
?>