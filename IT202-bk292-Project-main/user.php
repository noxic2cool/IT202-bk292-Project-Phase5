<?php

session_start();  
$conn=mysqli_connect("localhost","mgs_user","pa55word","plugged-in");  
if (!isset($_SESSION['USER_ID'])) {  
     header("location:login.php");  
     die();  
}  

echo "Welcome user ". $_SESSION['USER_FNAME'] . " " .  $_SESSION['USER_LNAME'] . " " .  $_SESSION['USER_ID'];

?>

<br>
<nav>
     <a href="welcome.php">Welcome Page</a>
     <?php
     if (isset($_SESSION['USER_ID'])) {  
     echo '<a href="shipping.php">Shipping Page</a>';
     echo '<br>';  
     echo '<a href="create2.php">Create Page</a>'; 
     }
     ?>
</nav>
<br>
<a href="logout.php">Logout</a>