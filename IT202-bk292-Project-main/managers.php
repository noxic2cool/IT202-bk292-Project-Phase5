<?php
function addPluggedInManager($email, $password) {
   $db = getDB();
   $hash = password_hash($password, PASSWORD_DEFAULT);
   $query = 'INSERT INTO pluggedinManagers (emailAddress, password, firstName, lastName, dateCreated)
             VALUES (:email, :password, :firstname, :lastname, NOW())';
   $statement = $db->prepare($query);
   $statement->bindValue(':email', $email);
   $statement->bindValue(':password', $hash);
   $statement->bindValue(':firstname', $fname);
   $statement->bindValue(':lastname', $lname);
   $statement->execute();
   $statement->closeCursor();
}
?>