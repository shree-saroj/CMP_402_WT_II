<?php
$fruits = array("Apple", "Banana", "Mango");
echo $fruits[0]; // Output: Apple
echo "</br>";
$fruits[0] = "Orange";
echo "</br>";
echo $fruits[0]; // Output: Orange
$student = array("name" => "John", "age" => 21, "course" => "BCA");
echo "</br>";
echo $student["name"]; // Output: John
$student["address"] = "Pokhara";
echo "</br>";
echo $student["address"]; // Output: Pokhara

$marks = array(
    "John" => array("Math" => 90, "Science" => 85),
    "Alice" => array("Math" => 88, "Science" => 92)
);

echo "</br>";
echo $marks["John"]["Science"]; // Output: 85
$marks["John"]["English"] = 95;
echo "</br>";
echo $marks["John"]["English"]; // Output: 95

echo "</br>";

foreach ($marks as $row => $values) {
    echo $row . " => ";
    foreach ($values as $value => $subvalue) {
        echo $value . ": " . $subvalue . ", ";
    }
    echo "</br>";
}

$matrix = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

echo "</br>";

foreach ($matrix as $row) {
    foreach ($row as $value) {
        echo $value . " ";
    }
    echo "</br>";
}

echo "</br>";
echo $matrix[1][2]; // Output: 6

$matrix[3][0] = 10;
echo "</br>";
echo $matrix[3][0]; // Output: 10

echo "</br>";
var_dump($matrix);
?>
