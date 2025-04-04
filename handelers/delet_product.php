<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // to get id of deleted element
    $id = $_POST["deletitem"]; 
    
    // to excute delet on cart session and pure session(the session that dont has repeat name of product)
    delet_item_array($id); 
   
    header("Location: ../cart.php"); 
    exit();
}

function delet_item_array($id) {
//    to verify from found session has pure array and cart array
    if (!isset($_SESSION['pure_array']) || empty($_SESSION['pure_array']) || !isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return [];
    }

    // array to store new data
    $pureArray = [];
    $cartArray = [];

//    to delet element that has capture id
    foreach ($_SESSION['pure_array'] as $index => $item) {
        // colect items that not has capture id or index

        if ($index != $id) { 
            $pureArray[] = $item;
        }
    }

//   get the name of element that deleted from pure_array to used it in delet any element has the same name in cart array
    $nameToDelete = $_SESSION['pure_array'][$id]['name'];  

    // apply the delete on cart session (the main session to updat number on cart that in top of header)

    foreach ($_SESSION['cart'] as $index => $item) {
        //  delete all items that have   $nameToDelete
        if ($item['name'] != $nameToDelete) { 
            $cartArray[] = $item;
        }
    }

    // arrangement data in every array
    $_SESSION['pure_array'] = array_values($pureArray);   
    $_SESSION['cart'] = array_values($cartArray);         

    // check the empty array and delete it
    if (empty($pureArray)) {
        unset($_SESSION['pure_array']);
    }
    if (empty($cartArray)) {
        unset($_SESSION['cart']);
    }
}

?>