<?php

if (isset($_SESSION['USER_ID'])) {  
echo '<a href="shipping.php">Shipping Page</a>';
echo '<br>'; 
echo '<a href="create2.php">Create Page</a>';
echo '<br>'; 
echo "Welcome user ". $_SESSION['USER_FNAME'] . " " .  $_SESSION['USER_LNAME'] . " " .  $_SESSION['USER_ID'];
echo '<br>';
echo '<a href="logout.php">Logout</a>';
}

$Fname = filter_input(INPUT_POST, 'Fname');
$Lname = filter_input(INPUT_POST, 'Lname');
$Address = filter_input(INPUT_POST, 'Address');
$City = filter_input(INPUT_POST, 'City');
$State = filter_input(INPUT_POST, 'State');
$Zip = filter_input(INPUT_POST, 'Zip', FILTER_VALIDATE_INT);
$P_Width = filter_input(INPUT_POST, 'P_Width', FILTER_VALIDATE_INT);
$P_Height = filter_input(INPUT_POST, 'P_Height', FILTER_VALIDATE_INT);
$P_Length = filter_input(INPUT_POST, 'P_Length', FILTER_VALIDATE_INT);
$P_Value = filter_input(INPUT_POST, 'P_Value', FILTER_VALIDATE_FLOAT);

$error_message = '';

if ( empty($Fname)) {
    $error_message = 'First Name must not be blank.';
}

if ( $Lname === FALSE) {
    $error_message = 'Last Name must not be blank.';
}

if ( $Address === FALSE) {
    $error_message = 'Address must not be blank.';
}

if ( $City === FALSE) {
    $error_message = 'City must not be blank.';
}

if ( $State === FALSE) {
    $error_message = 'State must not be blank.';
}

if ( $Zip === FALSE) {
    $error_message = 'Zip Code must not be blank and a valid number.';
}

if ( $P_Width === FALSE) {
    $error_message = 'Width must not be blank and a valid number.';
} elseif ($P_Width > 36) {
    $error_message = 'All dimnesions must be less than or equal to 36.';
}elseif ( $P_Width < 0) {
    $error_message = 'Width must be a positive number.';
}

if ( $P_Height === FALSE) {
    $error_message = 'Height must not be blank and a valid number.';
} elseif ($P_Height > 36) {
    $error_message = 'All dimensions must be less than or equal to 36.';
}elseif ( $P_Height < 0) {
    $error_message = 'Height must be a positive number.';
}

if ($P_Length === FALSE) {
    $error_message = 'Length must not be blank and a valid number.';
}elseif ($P_Length > 36) {
    $error_message = 'Length must be less than or equal to 36.';
}elseif ($P_Length < 0) {
    $error_message = 'Length must be a positive number.';
}

if ( $P_Value === FALSE) {
    $error_message = 'Value must not be blank and a valid number.';
} elseif ($P_Value > 1000) {
    $error_message = 'The value must be less than or equal to 1000.';
} elseif ($P_Value < 0) {
    $error_message = 'The value must be a positive number.';
}

if($error_message == '') {
    include("shipping.php");
    exit();
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Shipping - plÜgged-in</title>
    <link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <main>
    <header>
        <h1>plÜgged-in</h1>
    </header>
    <nav>
        <a href="welcome.php">Welcome Page</a>
        <a href="shipping.php">Shipping Page</a>
    </nav>

        <h1>Final Shipping Page</h1>

        <h2>From:</h2>
        <p>plÜgged-in Co.</p>
        <p>121 Maybach Avenue</p>
        <p>Monarch Row</p>
        <p>New Monroe</p>
        <p>99774-2780</p>

        <h2>To:</h2>
        <label>First Name:</label>
        <span><?php echo htmlspecialchars($Fname); ?></span>
        <br>
        <label>Last Name:</label>
        <span><?php echo htmlspecialchars($Lname); ?></span>
        <br>
        <label>Address:</label>
        <span><?php echo htmlspecialchars($Address); ?></span>
        <br>
        <label>City:</label>
        <span><?php echo htmlspecialchars($City); ?></span>
        <br>
        <label>State:</label>
        <span><?php echo htmlspecialchars($State); ?></span>
        <br>
        <label>Zip:</label>
        <span><?php echo $Zip; ?></span>
        <br>
    
        <h2>Package Dimenstions</h2>
        <label>Package Width:</label>
        <span><?php echo $P_Width; ?></span>
        <br>
        <label>Package Height:</label>
        <span><?php echo $P_Height; ?></span>
        <br>
        <label>Package Length:</label>
        <span><?php echo $P_Length; ?></span>
        <br>

        <h2>Package Delcared Value</h2>
        <label>Package Declared Value:</label>
        <span><?php echo $P_Value; ?></span>
        <br>

        <h2>Shipping Company</h2>
        <label for="s_comp">Select a Company:</label>
                <select name="s_comp" id="s_comp">
                    <option value="usps">USPS</option>
                    <option value="ups">UPS</option>
                    <option value="fedex">FedEx</option>
                </select>
        <br>

        <h2>Shipping Class</h2>
        <label>Choose one or two classes:</label>
            <input type="checkbox" id="s_class1" name="s_class1" value="NDA">
                <label for="s_class1"> Next Day Air</label>
            <input type="checkbox" id="s_class2" name="s_class2" value="PM">
                <label for="s_class2"> Priority Mail</label>
        <br>

        <h2>Tracking Informantion</h2>
        <p>Tracking Number: #8A74E3</p>
        <br>
        <img src="photos/barcode/barcode-fake.png" alt="The barcode image for the tracking number." style="width: auto; height: 100px;" />
        <br>

        <h2>Order Number</h2>
        <p>Order Number: #32500084</p>
        <br>

        <h2>Ship Date</h2>
        <p>Ship Date: 2/21/2024</p>
        <br>
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