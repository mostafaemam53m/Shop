<?php

//  to calculate number or product in cart

// $all_product=[
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $product_name=$_POST["productname"];
    $price=$_POST["price"];
    session_start();

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

   $_SESSION['cart'][]= [
        "name" => $product_name,
        "price" => $price
    ];




    
    header("Location: ../index.php");
    
    exit();

    


}

?>