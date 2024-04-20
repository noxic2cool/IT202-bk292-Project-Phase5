<?php
$dsn = 'mysql:host=localhost;port=3306;dbname=plugged-in';
$username = 'mgs_user';
$password = 'pa55word';

try {
    $db = new PDO($dsn, $username, $password);
    echo '<p>You are connected to the database!</p>';
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo '<p>Connection Failed.</p>';
}

?>