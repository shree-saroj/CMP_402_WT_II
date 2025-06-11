<?php
echo <<<EOT
| Feature    | Cookie                      | Session                     |</br>
| ---------- | --------------------------- | --------------------------- |</br>
| Storage    | Client (browser)            | Server                      |</br>
| Expiry     | Set manually                | Ends with browser/session   |</br>
| Security   | Less secure (can be edited) | More secure                 |</br>
| Size limit | \~4KB                       | Larger (stored server-side) |</br>

EOT;
?>