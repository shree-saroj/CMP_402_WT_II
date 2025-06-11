<?php

// Function to check palindrome
function isPalindrome($num)
{
    $original = $num;
    $reverse = 0;
    while ($num > 0) {
        $digit = $num % 10;
        $reverse = ($reverse * 10) + $digit;
        $num = (int) ($num / 10);
    }
    return $original == $reverse;
}

// Function to check even or odd
function isEven($num)
{
    return $num % 2 == 0;
}

// Function to check Armstrong number
function isArmstrong($num)
{
    $sum = 0;
    $temp = $num;
    $n = strlen((string) $num);
    while ($temp > 0) {
        $digit = $temp % 10;
        $sum += pow($digit, $n);
        $temp = (int) ($temp / 10);
    }
    return $sum == $num;
}

if (isset($_POST['number'])) {
    $number = $_POST['number'];

    if (!is_numeric($number) || $number < 0) {
        echo "Please enter a valid number.";
        exit;
    }

    if (isset($_POST['palindrome'])) {
        // Palindrome check
        if (isPalindrome($number)) {
            echo "$number is a Palindrome.<br>";
        } else {
            echo "$number is not a Palindrome.<br>";
        }
    }

    if (isset($_POST['evenodd'])) {
        // Even or Odd check
        if (isEven($number)) {
            echo "$number is Even.<br>";
        } else {
            echo "$number is Odd.<br>";
        }
    }

    if (isset($_POST['armstrong'])) {
        // Armstrong check
        if (isArmstrong($number)) {
            echo "$number is an Armstrong Number.<br>";
        } else {
            echo "$number is not an Armstrong Number.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="number">Enter a number:</label>
        <input type="number" name="number" id="number" required>
        <input type="submit" value="Check Palindrome" name="palindrome">
        <input type="submit" value="Check Even Or Odd" name="evenodd">
        <input type="submit" value="Check Armstrong" name="armstrong">
    </form>

</body>
</html>