<?php
include './connect.php';

if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $date = date("Y-m-d H:i:s");

    if (!empty($id)) {
        $stmt = mysqli_prepare($conn, "UPDATE webtech SET Name = ?, Password = ?, CreatedDate = ? WHERE Id = ?");
        mysqli_stmt_bind_param($stmt, "sssi", $name, $password, $date, $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Record updated successfully";
        } else {
            echo "Update failed: " . mysqli_error($conn);
        }
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO webtech (Name, Password, CreatedDate) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $name, $password, $date);
        if (mysqli_stmt_execute($stmt)) {
            echo "New record created successfully";
        } else {
            echo "Insert failed: " . mysqli_error($conn);
        }
    }
    mysqli_stmt_close($stmt);
    exit;
}

if(isset($_GET["action"]) && $_GET["action"] == "fetch") {
    $stmt = mysqli_prepare($conn, "SELECT * FROM webtech");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
    mysqli_stmt_close($stmt);
    exit;
}

if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete'];
    $stmt = mysqli_prepare($conn, "DELETE FROM webtech WHERE Id = ?");
    mysqli_stmt_bind_param($stmt, "i", $deleteId);
    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully";
    } else {
        echo "Deletion failed: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    exit;
}
?>
