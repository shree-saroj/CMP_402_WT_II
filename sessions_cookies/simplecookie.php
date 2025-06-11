<?php
echo <<<EOT
Cookies in PHP
</br>
==============
</br>
Cookies are small pieces of data stored on the client-side (browser). They are used to remember information like user preferences, login details, etc.
</br>
Characteristics:
</br>
- Stored on the user's computer.
</br>
- Can be set to persist for a long time (e.g., days or months).
</br>
- Less secure than sessions because users can see and modify them.
EOT;

echo "</br>";
// Create Cookie
setcookie("username", "JohnDoe", time() + 3600, "/sessions_cookies/", "", true, true); // Expires in 1 hour
echo "Cookie 'username' is set! with value " . $_COOKIE["username"];

echo "</br>";
if(isset($_COOKIE["username"])) {
    echo "Username is: " . $_COOKIE["username"];
} else {
    echo "Cookie 'username' is not set!";
}

echo "</br>";
//Update Cookie
setcookie("username", "JaneDoe", time() + (60 * 60), "/sessions_cookies/", "", false, false); // New value
echo "Cookie 'username' is updated!";

echo "</br>";
// Delete Cookie
setcookie("username", "delete", time() - 2, "/sessions_cookies/");
echo "Cookie 'username' is deleted!";
?>