
<?php

require "./object.php";

$cars = array("Volvo", "BMWsd", "Toyota");
echo $cars[1];
echo "\n";

$Car = new car();
echo $Car -> getBrand();
?>
