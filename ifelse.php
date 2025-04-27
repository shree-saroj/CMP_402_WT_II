<?php

// create a sample program for if else else if
$age = 20;
if ($age < 18) {
    echo "You are a minor.";
} elseif ($age >= 18 && $age < 65) {
    echo "You are an adult.";
} else {
    echo "You are a senior citizen.";
}
echo "<br />";

?>