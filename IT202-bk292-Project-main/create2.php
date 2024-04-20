<?php

session_start();  
$conn=mysqli_connect("localhost","mgs_user","pa55word","plugged-in");  
if (!isset($_SESSION['USER_ID'])) {  
     header("location:login.php");  
     die();  
}  

?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Page</title>
</head>
<body>
<nav>
        <a href="welcome.php">Welcome Page</a>
        <?php
        if (isset($_SESSION['USER_ID'])) {  
        echo '<a href="shipping.php">Shipping Page</a>';
        echo '<br>';
        echo "Welcome user ". $_SESSION['USER_FNAME'] . " " .  $_SESSION['USER_LNAME'] . " " .  $_SESSION['USER_ID'];
        echo '<br>';
        echo '<a href="logout.php">Logout</a>';
        }
        ?>
    </nav>
    <form action="create.php" method="post">
        <label for="techCategory">Tech category:</label>
        <select name="techCategory" id="techCategory">
            <?php
            $dbConnection = mysqli_connect("localhost", "mgs_user", "pa55word", "plugged-in");
            $query = "SELECT pluggedinCategoryName FROM pluggedincategories";
            $result = mysqli_query($dbConnection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['pluggedinCategoryName'] . "'>" . $row['pluggedinCategoryName'] . "</option>";
            }
            mysqli_close($dbConnection);
            ?>
        </select>

        <label for="techCode">Tech code:</label>
        <input type="text" name="techCode" id="techCode">

        <label for="techName">Tech name:</label>
        <input type="text" name="techName" id="techName">

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" pattern="\d+(\.\d{2})?" title="Enter a valid price">

        <input type="reset" value="Reset/Clear">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<!--
    Blade Kirksey
    Mar. 12, 2024
    IT 202 (Spring 2024)
    Project 1, Phase 3
-->