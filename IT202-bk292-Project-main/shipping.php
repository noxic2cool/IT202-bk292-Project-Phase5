<?php


if ( !isset($Fname)) { $Fname = ''; }
if ( !isset($Lname)) { $Lname = ''; }
if ( !isset($Address)) { $Address = ''; }
if ( !isset($City)) { $City = ''; }
if ( !isset($State)) { $State = ''; }
if ( !isset($Zip)) { $Zip = ''; }
if ( !isset($P_Width)) { $P_Width = ''; }
if ( !isset($P_Height)) { $P_Height = ''; }
if ( !isset($P_Length)) { $P_Length = ''; }
if ( !isset($P_Value)) { $P_Value = ''; }

session_start();  
$conn=mysqli_connect("localhost","mgs_user","pa55word","plugged-in");  
if (!isset($_SESSION['USER_ID'])) {  
     header("location:login.php");  
     die();  
}  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping - plÜgged-in</title>
    <link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <header>
        <h1>plÜgged-in</h1>
    </header>
    <nav>
        <a href="welcome.php">Welcome Page</a>
        <?php
        if (isset($_SESSION['USER_ID'])) {  
            echo '<a href="create2.php">Create Page</a>';
            echo '<br>'; 
            echo "Welcome user ". $_SESSION['USER_FNAME'] . " " .  $_SESSION['USER_LNAME'] . " " .  $_SESSION['USER_ID'];
            echo '<br>';
            echo '<a href="logout.php">Logout</a>'; 
            }
        ?>
    </nav>
    <br>
    <main>
        <form action="shipping_results.php" method="post">
            <label>First Name:</label>
            <input type="text" name="Fname" value="<?php echo htmlspecialchars($Fname); ?>" />
            <br>
            <label>Last Name:</label>
            <input type="text" name="Lname" value="<?php echo htmlspecialchars($Lname); ?>" />
            <br>
            <label>Address:</label>
            <input type="text" name="Address" value="<?php echo htmlspecialchars($Address); ?>" />
            <br>
            <label>City:</label>
            <input type="text" name="City" value="<?php echo htmlspecialchars($City); ?>" />
            <br>
            <label>State:</label>
            <input type="text" name="State" value="<?php echo htmlspecialchars($State); ?>" />
            <br>
            <label>Zip:</label>
            <input type="text" name="Zip" value="<?php echo $Zip; ?>" />
            <br>
            <label>Package Width:</label>
            <input type="text" name="P_Width" value="<?php echo $P_Width; ?>" />
            <br>
            <label>Package Height:</label>
            <input type="text" name="P_Height" value="<?php echo $P_Height; ?>" />
            <br>
            <label>Package Length:</label>
            <input type="text" name="P_Length" value="<?php echo $P_Length; ?>" />
            <br>
            <label>Package Declared Value:</label>
            <input type="text" name="P_Value" value="<?php echo $P_Value; ?>" />
            <br>
            <input type="submit" value="Submit Information"/>
        </form>
    </main>
    <footer>
        <p class="mid">121 Maybach Avenue, Monarch Row, New Monroe, 99774-2780</p>
    </footer>
</body>
</html>

<!--
    Blade Kirksey
    Feb. 16, 2024
    IT 202 (Spring 2024)
    Project 1
-->