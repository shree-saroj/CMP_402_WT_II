<?php
include './connect.php';
?>

<form method="POST" action="">
    <label>Name: <input name="name" type="text" required/> </label>
    <label>Password: <input name="password" type="password"/ required> </label>
    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $date = date("Y-m-d H:i:s");
    // Prepare and bind
    $stmt = mysqli_prepare($conn, "INSERT INTO webtech (Name, Password,CreatedDate) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $name, $password, $date);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "New record created successfully";
        $name = "";
        $password = "";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>