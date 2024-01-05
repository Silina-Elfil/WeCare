<?php
//session_start();
$_SESSION[] = array(); // empty all sessions
unset($_SESSION["username"]);
unset($_SESSION["memberId"]);
session_destroy();

header("Location: index.php");
?>