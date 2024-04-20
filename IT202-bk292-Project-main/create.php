<?php

session_start();  
$conn=mysqli_connect("localhost","mgs_user","pa55word","plugged-in");  
if (!isset($_SESSION['USER_ID'])) {  
     header("location:login.php");  
     die();  
}  

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $techCode = $_POST["techCode"];
    $techName = $_POST["techName"];
    $description = $_POST["description"];
    $price = $_POST["price"];


    $dbConnection = mysqli_connect("localhost", "mgs_user", "pa55word", "plugged-in");
    $checkQuery = "SELECT COUNT(*) as count FROM tech WHERE techCode = '$techCode'";
    $result = mysqli_query($dbConnection, $checkQuery);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        echo '<script>alert("Code already exists.");</script>';
        echo "Tech code already exists. Please choose a different code.";
    } else {
        
        $insertQuery = "INSERT INTO tech (techCode, techName, description, price, dateCreated)
                        VALUES ('$techCode', '$techName', '$description', $price, NOW())";
        
        if (mysqli_query($dbConnection, $insertQuery)) {
            echo "Data inserted successfully.";
        } else {
            echo '<script>alert("Data insertion error.");</script>';
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($dbConnection);
        }
    }

    mysqli_close($dbConnection);
}
?>

<!--
    Blade Kirksey
    Mar. 12, 2024
    IT 202 (Spring 2024)
    Project 1, Phase 3
-->