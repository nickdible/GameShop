<?php
session_start();
include "../include/imageBase.php";
//create an empty array
$items = array();
$query = "SELECT * FROM GameCatalog WHERE Console = 'Switch' ORDER BY ID DESC";
$result = $conn->query($query);
while($row = $result->fetch_assoc())
{
$item = array('id' => $row['ID'], 'imageData' => $row['PosterData'], 'title' => $row['Title'], 'price' => $row['Price'], 'genre' => $row['Genre'], 'rating' => $row['Rating'], 'console' => $row['Console']);
$items[] = $item;
}
if (!isset($_SESSION['cart']))
{
$_SESSION['cart'] = array();
}
if (isset($_POST['action']) and $_POST['action'] == 'Buy')
{
// Add item to the end of the $_SESSION['cart'] array
$_SESSION['cart'][] = $_POST['id'];
header('Location: shoppingNS.php'); //Add this line. We specify index.php.
exit();
}
if (isset($_POST['action']) and $_POST['action'] == 'Empty cart')
{
// Empty the $_SESSION['cart'] array
unset($_SESSION['cart']);
header('Location: ?cart');
exit();
}
if (isset($_GET['cart']))
{
$cart = array();
$total = 0;
foreach ($_SESSION['cart'] as $id)
{
foreach ($items as $product)
{
if ($product['id'] == $id)
{
$cart[] = $product;
$total += $product['price'];
break;
}
}
}
include 'cart.html.php';
exit();
}
include 'catalog.html.php';
?>