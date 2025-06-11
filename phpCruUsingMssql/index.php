<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>User List</title></head>
<body>
<h2>Users</h2>
<a href="create.php">Add User</a><br><br>

<table border="1" cellpadding="5">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>

<?php
$sql = "SELECT * FROM Users";
$stmt = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>
            <a href='edit.php?id={$row['id']}'>Edit</a> |
            <a href='delete.php?id={$row['id']}'>Delete</a>
        </td>
    </tr>";
}
?>
</table>
</body>
</html>
