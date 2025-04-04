<?php
include(__DIR__."\..\core\\validations.php");
include(__DIR__."\..\core\\functions.php");

if($_SERVER["REQUEST_METHOD"]="POST"){
    $user_name= $_POST["username"];
    $email=$_POST["email"];
    $full_name=$_POST["full_name"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $password=$_POST["password"];

    // to get country value
    if(isset($_POST["country"]) && !empty($_POST["country"])) {
        $country = $_POST["country"];
    } else {
        $country = null; 
    }
 
$error=check_register_data($user_name,$email,$password,$full_name,$phone,$country,$address);


if(!empty($error)){
    set_message("danger",$error);
    header("Location: ../register.php");
 }else{
    set_message("success","Congratulations, registration is complete.");
    header("Location: ../login.php");


    put_data_into_json($user_name,$email,$password,$full_name,$phone,$country,$address);


}




}




?>