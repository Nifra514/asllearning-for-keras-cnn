<?php
session_start ();
session_destroy ();
$_SESSION = [];

header('Views/index.php');
?>