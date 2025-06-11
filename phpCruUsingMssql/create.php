<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO Users (name, email) VALUES (?, ?)";
    $params = [$name, $email];
    sqlsrv_query($conn, $sql, $params);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Add User</title></head>
<body>
<h2>Add User</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <input type="submit" value="Save">
</form>
</body>
</html>
