<?php
include("..\core\\functions.php");
include("..\core\\validations.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=$_POST["name"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $phone=$_POST["phone"];
    $notes=$_POST["notes"];

    $error=check_out($name,$email,$address,$phone,$notes);

    if(!empty($error)){
        set_message("danger",$error);
        header("Location: ../checkout.php");
     }else{
        set_message("success"," your data sent.");
        header("Location: ../index.php");
    
    
        store_check_out_data($name,$email,$address,$phone,$notes);
    
    }
}


?>