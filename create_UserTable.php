<?php
include "../include/imageBase.php";
$sql = "CREATE TABLE User(
    ID INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(65) NOT NULL,
    Password VARCHAR(32) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Role VARCHAR(32) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
$result = $conn -> query($sql);
if ($result) {
    echo "Table User created successfully.";
} else {
    echo "Error creating table: ".$conn->error;
}
$conn -> close();
?>