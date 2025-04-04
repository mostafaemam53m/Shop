<?php
include("..\core\\functions.php");
include("..\core\\validations.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];

    $error=check_contact($name,$email,$message);

    if(!empty($error)){
        set_message("danger",$error);
        header("Location: ../contact.php");
     }else{
        set_message("success"," message sent.");
        header("Location: ../index.php");
    
    
        store_contact_data($name,$email,$message);
    
    }
}

?>