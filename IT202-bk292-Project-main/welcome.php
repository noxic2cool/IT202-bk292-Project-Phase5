<?php

session_start();  
$conn=mysqli_connect("localhost","mgs_user","pa55word","plugged-in");   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - plÜgged-in</title>
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
        echo '<a href="shipping.php">Shipping Page</a>';
        echo '<br>'; 
        echo '<a href="create2.php">Create Page</a>';
        echo '<br>'; 
        echo "Welcome user ". $_SESSION['USER_FNAME'] . " " .  $_SESSION['USER_LNAME'] . " " .  $_SESSION['USER_ID'];
        echo '<br>';
        echo '<a href="logout.php">Logout</a>'; 
        }
        ?>
    </nav>
    <main>
        <p class="mid">Welcome. plÜgged-in is an online tech store focused on selling you the most cutting edge technology at prices as great as the products. 
            This store was created in 2022, when the founder, Blade Kirksey, was shopping for various pieces of technology, but noticed one issue. 
            Everything was expensive! Believeing that technology can improve people's lives, but that the pricing was in need of an update, he decided
            to create a webstore selling top brands at more affordable prices. Thus, plÜgged-in was born.</p>

        <ul class="items">
            <li>
                <figure>
                    <img src="photos/vr/minh-pham-AHCmAX0k_J4-unsplash.jpg" alt="A man wearing a VR headset." style="width:auto; height:200px" />
                    <figcaption><a href="vrh.php">Virtual Reality Headset</a></figcaption>
                </figure>
            </li>
            <li>
                <figure>
                <img src="photos/thermo/dan-lefebvre-mAwE-fqgDXc-unsplash.jpg" alt="A smart thermostat on a wall." style="width:auto; height:200px" />
                    <figcaption><a href="st.php">Smart Thermostat</a></figcaption>
                </figure>
            </li>
            <li>
                <figure>
                <img src="photos/charger/georgi-dyulgerov-1Y579--3k5M-unsplash.jpg" alt="A wireless charging pad." style="width:auto; height:200px" />
                    <figcaption><a href="wcp.php">Wireless Charging Pad</a></figcaption>
                </figure>
            </li>
            <li>
                <figure>
                <img src="photos/speaker/howard-bouchevereau-876c-F8YBrg-unsplash.jpg" alt="A bluetooth speaker on a table." style="width:auto; height:200px" />
                    <figcaption><a href="bts.php">Bluetooth Speaker</a></figcaption>
                </figure>
            </li>
            <li>
                <figure>
                <img src="photos/scale/scale2.jpg" alt="A scale someone is standing on." style="width:auto; height:200px" />
                    <figcaption><a href="fss.php">Fitness Smart Scale</a></figcaption>
                </figure>
            </li>
        </ul>

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