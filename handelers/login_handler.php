<?php

include_once("..\core\\functions.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

    //  get data from form
    $email=$_POST["email"];
    $password=$_POST["password"];

    // get data from json file
    $file="../data/register.json";

    $user=file_exists($file)? json_decode(file_get_contents($file),true):[];

    // i used this method to use this var in check password if i found the mail i will start to check password.
    $found = false;



    //  check email and password

    foreach($user as $item){
        if($item["email"]==$email){

            if(password_verify($password,$item["password"])){
                setcookie("user_email",$email,time() + (86400 * 30),"/");
                header("Location: ../index.php");
                $found = true;
                 exit();


            }else{

                set_message("danger","Worng Password or email");
                header("Location: ../login.php");
                 exit();

             }

               
        }
    }

    if($found==false){

        set_message("danger", "Worng Password or Email.");
        header("Location: ../login.php");
        exit();
    }


    



   


}


?>