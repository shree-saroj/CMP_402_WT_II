<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "Mysql@Shr33");
define("DB_NAME", "dbWebTechII");

$_con = null;
function getDatabaseConnection()
{
    global $_con;
    $_con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$_con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $_con;
}

function sanitizeInput(array $data)
{
    return array_map(function ($value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        $value = strip_tags($value);
        return $value;
    }, $data);
}

function executeStoredProcedure(string $procedureName, array $params = [], string $paramTypes = "")
{
    global $_con;
    if (!$_con) {
        getDatabaseConnection();
    }
    $sql = "CALL $procedureName(" . implode(', ', array_fill(0, count($params), '?')) . ")";
    $stmt = mysqli_prepare($_con, $sql);
    if (!$stmt) {
        die("Query preparation failed: " . mysqli_error($_con));
    }

    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
    }

    if (!mysqli_stmt_execute($stmt)) {
        die("Query execution failed: " . mysqli_error($_con));
    }
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function executeStoredProcedureUpdate(string $procedureName, array $params, string $paramTypes)
{
    global $_con;
    if (!$_con) {
        getDatabaseConnection();
    }
    $sql = "CALL $procedureName(" . implode(', ', array_fill(0, count($params), '?')) . ")";
    $stmt = mysqli_prepare($_con, $sql);
    if (!$stmt) {
        die("Query preparation failed: " . mysqli_error($_con));
    }
    mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        die("Query execution failed: " . mysqli_error($_con));
    }
    $affectedRows = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    return $affectedRows;
}
?>
