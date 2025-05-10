
<?php 


    session_start(); 
  
    $_SESSION['favorite_color'] = 'blue'; 
  
    echo "Session variables are set."; 

    echo $_SESSION['favorite_color'];
?> 
