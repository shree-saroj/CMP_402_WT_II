
<?php

require "./object.php";

$cars = array("Volvo", "BMWsd", "Toyota");
echo $cars[1];
echo "<br />";

$Car = new car();
echo $Car -> getBrand();

echo "<br />";

$name = "BCA";

function prints(){
    GLOBAL $name;
    echo "Hi " . $name;
    function hellooo(){
        echo "hiiiii";
    }
}

function hello(){
    echo "Hi";
}
hello();
echo "<br />";
prints();
hellooo(); 
?>
