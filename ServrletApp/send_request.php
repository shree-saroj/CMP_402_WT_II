<?php
$name = "Shree";
$url = "http://localhost:8080/MyWebApp/hello";

$data = array('name' => $name);
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    die("Error contacting servlet");
}

echo $result;
?>
