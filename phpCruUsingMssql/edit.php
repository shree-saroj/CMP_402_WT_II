<?php
include 'db.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE Users SET name = ?, email = ? WHERE id = ?";
    $params = [$name, $email, $id];
    sqlsrv_query($conn, $sql, $params);
    header("Location: index.php");
}

$sql = "SELECT * FROM Users WHERE id = ?";
$stmt = sqlsrv_query($conn, $sql, [$id]);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><title>Edit User</title></head>
<body>
<h2>Edit User</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>
    <input type="submit" value="Update">
</form>
</body>
</html>
