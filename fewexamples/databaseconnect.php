<?php
$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

$sql = "SELECT id, name, course FROM students";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . " | Name: " . $row["name"] . " | Course: " . $row["course"] . "<br>";
    }
} else {
    echo "No records found.";
}

mysqli_close($conn);
?>
