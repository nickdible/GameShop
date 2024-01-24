<?php
include "../include/imageBase.php";
//create an empty array
$items = array();
$query = "SELECT * FROM GameCatalog ORDER BY Sales DESC";
$result = $conn->query($query);
while($row = $result->fetch_assoc())
{
$item = array('id' => $row['ID'], 'imageData' => $row['PosterData'], 'title' => $row['Title'], 'price' => $row['Price'], 'genre' => $row['Genre'], 'rating' => $row['Rating'], 'console' => $row['Console']);
$items[] = $item;
}
include "bestSellersList.html.php";
?>