<?php
include "../include/imageBase.php";
$sql = "CREATE TABLE GameCatalog(
    ID INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    Genre VARCHAR(32) NOT NULL,
    Rating VARCHAR(5) NOT NULL,
    Console VARCHAR(32) NOT NULL,
    Price decimal(8, 2) NOT NULL,
    PosterData longblob NOT NULL,
    Sales INT(25) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
$result = $conn -> query($sql);
if ($result) {
    echo "Table GameCatalog created successfully.";
} else {
    echo "Error creating table: ".$conn->error;
}
$conn -> close();
?>