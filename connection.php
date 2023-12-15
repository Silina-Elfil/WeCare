<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "WeCare");

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)
    or die("Failed to connect : " . mysqli_connect_error());
?>