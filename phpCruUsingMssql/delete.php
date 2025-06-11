<?php
include 'db.php';

$id = $_GET['id'];
$stmt = sqlsrv_query($conn, "DELETE FROM Users WHERE id = ?", [$id]);

if ($stmt) {
    header("Location: index.php");
} else {
    echo "Error: " . print_r(sqlsrv_errors(), true);
}
