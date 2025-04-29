<?php

$db_server = "127.0.0.1";
$db_user = "root";
$db_userpass = "Mysql@Shr33";
$db_database = "dbWebTechII";

// Create connection
$conn = mysqli_connect($db_server, $db_user, $db_userpass, $db_database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>
