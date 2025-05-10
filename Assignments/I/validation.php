<?php
function showError($msg) {
    echo "<div class='error'>$msg</div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];
    $email = $_POST['email'];
    $sex = $_POST['sex'] ?? '';
    $language = $_POST['language'] ?? [];
    $about = $_POST['about'];
    if (strlen($userid) < 5 || strlen($userid) > 12) {
        $errors[] = "User Id should be of length 5 to 12";
    }

    if (strlen($password) < 7 || strlen($password) > 12) {
        $errors[] = "Password should be of length 7 to 12";
    }

    if (!preg_match("/^[a-zA-Z]+$/", $firstname)) {
        $errors[] = "Firstname should only be alphabets.";
    }

    if (!empty($address) && !preg_match("/^[a-zA-Z0-9\s]+$/", $address)) {
        $errors[] = "Address should have only alphanumeric characters.";
    }

    if (!preg_match("/^[0-9]+$/", $zipcode)) {
        $errors[] = "Zip Code should only be numeric.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email should be a valid email.";
    }
    echo "<style>
        body { font-family: Arial; padding: 20px; }
        .error { color: red; }
        .success { font-weight: bold; color: green; }
    </style>";

    if (!empty($errors)) {
        foreach ($errors as $error) {
            showError($error);
        }
    } else {
        echo "<h2 class='success'>Registration Successful</h2>";
        echo "<strong>User Id:</strong> $userid<br>";
        echo "<strong>Password:</strong> $password<br>";
        echo "<strong>First Name:</strong> $firstname<br>";
        echo "<strong>Address:</strong> $address<br>";
        echo "<strong>Country:</strong> $country<br>";
        echo "<strong>ZIP Code:</strong> $zipcode<br>";
        echo "<strong>Email:</strong> $email<br>";
        echo "<strong>Sex:</strong> $sex<br>";
        echo "<strong>Language:</strong> " . implode(", ", $language) . "<br>";
        echo "<strong>About:</strong> $about<br>";
    }
}
?>
