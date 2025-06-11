<?php
echo <<<EOT
🔹 Sessions in PHP
</br>
Sessions store data on the server-side and are used to persist user data during a browsing session.
</br>
Characteristics:
</br>
More secure (data is not stored on the client).
</br>
Temporary — usually destroyed when the browser is closed or session ends.
</br>
Require session_start() to begin the session. 
EOT;

echo("</br>");
session_start();
$_SESSION["username"] = "JohnDoe";
echo "Session 'username' is set! with value" . $_SESSION["username"];


session_unset();    // Remove all session variables
session_destroy();  // Destroy the session
?>