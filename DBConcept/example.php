<?php
    include './connect.php';
    $name = "Saroj Baral";
    $password = "helloworld";

    $sql = "INSERT INTO webtech(Name,Password,CreatedDate) values (?, ?, ?)";
    try {
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $password, );
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Record inserted successfully.";
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>