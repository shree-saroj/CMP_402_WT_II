<?php
$serverName = "localhost";
// $connectionOptions = [
//     "Database" => "TestDB",
//     "Authentication" => SQLSRV_AUTH_WINDOWS,  // Use Windows authentication
// ];

$connectionOptions = [
    "Database" => "TestDB",
    "Uid" => "sa",
    "PWD" => "Mssql@Shr33",
];

$conn = sqlsrv_connect($serverName, $connectionOptions);
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}
?>
