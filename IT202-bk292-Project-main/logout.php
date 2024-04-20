<?php

session_start();
unset($_SESSION['USER_ID']);
header("location:login.php");
session_destroy();

?>