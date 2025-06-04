<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVER</title>
</head>
<body>
    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        Name: <input name="fname" type="text" /><input type="submit" />
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $name = $_REQUEST["fname"];
            if(empty($name)){
                echo "Name is empty";
            }else{
                echo $name;
            }
        }
    ?>
</body>
</html>