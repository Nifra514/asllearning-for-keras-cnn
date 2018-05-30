<?php
session_start ();
session_destroy ();
$_SESSION = [];

header('Location: http://localhost:8888/asllearning/Views/index.php');
?>