<?php
include ("include/db.php");
$quantity_values = $_POST['quantity'];
    array_walk($_SESSION['cart'], function (&$product) use ($quantity_values) {
       if(isset($quantity_values[$product["id"]])){
            $product["quantity"] = $quantity_values[$product["id"]];
        }
   });

foreach($_SESSION['cart'] as $product)
{
    $quantity = $product['quantity'];
    $id = $product['id'];
    $query = "UPDATE Product SET Stock = Stock - $quantity WHERE Product_id = $id";
    mysqli_query($conn, $query);
}
if(!isset($_COOKIE['past_purchase']))
{
    setcookie("past_purchase", json_encode($_SESSION['cart']), time() + 3600);
}
else
{
    $past_purchases = json_decode($_COOKIE['past_purchase']);

    foreach( $_SESSION['cart'] as $item)
    $past_purchases[] = $item;

    setcookie("past_purchase", json_encode($past_purchases),  time() + 3600);
}
unset($_SESSION['cart']);
?>