<?php

// check empty fileds
function validfiled($filed,$Value){

    return empty($Value)?  "$filed  is requried" : null;


}

// check uer name
function check_user_name($user) {
   
    $pattern = "/^[\p{Arabic}a-zA-Z0-9]([\p{Arabic}a-zA-Z0-9_]{3,18})[\p{Arabic}a-zA-Z0-9]$/u";

    return preg_match($pattern, $user) ? null : "Please Enter Correct User Name";
}


// check adress
function check_address($address){

$pattern = "/^[a-zA-Z0-9\s,.\-#]{5,100}$/";



    return preg_match($pattern,$address)? null: "Please Enter Correct Address";

}

function check_email($email){

return filter_var($email,FILTER_VALIDATE_EMAIL)?  null : "please enter correct email";
     
}



 
function phone_number($phone){

    // phone number can be start with + or no as +201234567890 ,0123456789 ,+44 1234-567890,+1-234-567-8901

    if(preg_match("/^\+?[0-9\- ]{10,20}$/",$phone)){



        return null;
    }else{


        return "please enter correct phone number ";
    }
}

function check_text($text){

    // accepte arabic char and a or A char 
    if(preg_match("/^[\p{Arabic}a-zA-Z ]+$/u",$text)){


        return null;

    }else{



        return "please enter english or arabic char";
    }



}

function check_password($password){
       
    return strlen($password) > 6 ? Null: "Password must be at least 6 characters long.";
}


function check_country($country){

    return !empty($country)? NULL :"please select Country";

}

// check repeat mail

function check_repeat_email($new_email,$store_user){


   foreach($store_user as $item){

    if($new_email==$item["email"]){

        return "This email is already registered. Please use another email.";
    }

    
   }

   return null;


    
}

// check repeat user name

function check_repeat_user_name($user_name,$store_user_name){

   

    foreach($store_user_name as $item){
        if($user_name==$item["user_name"]){

            return "This User Name is already registered. Please use another User Name.";
        }
    }

    return null;
}

// user_name,email,name,phone,country,address

function check_register_data($user_name,$email,$password,$full_name,$phone,$country,$address){

    $register_user=[
        "user_name"=>$user_name,
        "email"=>$email,
        "password"=>$password,
        "full_name"=>$full_name,
        "phone"=>$phone,
        "country"=>$country,
        "address"=>$address
  
             ];
// get file to check old mail and user name with new mail and user name to prevent repeat user name and mail
$json_file="../data/register.json";
$user_data=file_exists($json_file)? json_decode(file_get_contents($json_file),true):[];

 


            //   check empty fileds
    foreach($register_user as $index=>$data){


        if($error=validfiled($index,$data)){

            return $error; }
    }
   
    if($error=check_user_name($user_name)){

        return $error;
    }elseif($error=check_repeat_user_name($user_name,$user_data)){        

    return $error;   
    }elseif( $error=check_email($email)){

        return $error;

    }elseif($error=check_repeat_email($email,$user_data)){

        return $error;

    }elseif( $error=check_password($password)){

        return $error;

    }elseif($error=check_text($full_name)){

        return $error;

    }elseif($error=phone_number($phone)){

        return $error;

    }elseif($error=check_country($country)){

        return $error;
    }elseif($error=check_address($address)){
        return $error;

    }else{

        return null;
    }





}


function check_contact($name,$email,$message){

    $contact_array=[
        "name"=>$name,
        "email"=>$email,
        "message"=>$message
  
             ];

     foreach($contact_array as $index=>$data){


          if($error=validfiled($index,$data)){
        
                    return $error; }
            }

            if($error=check_text($name)){

                return $error;
            }elseif( $error=check_email($email)){

                return $error;
        
            }elseif($error=check_text($message)){


                return $error;
            }else{

               return null;
            }
           

}
 

function check_out($name,$email,$address,$phone,$notes){

    $check_out=[
        "name"=>$name,
        "email"=>$email,
        "address"=>$address,
        "phone"=>$phone,
        "notes"=>$notes

  
             ];

     foreach($check_out as $index=>$data){


          if($error=validfiled($index,$data)){
        
                    return $error; }
            }

            if($error=check_text($name)){

                return $error;
            }elseif( $error=check_email($email)){

                return $error;
        
            }elseif( $error=check_address($address)){

                return $error;
        
            }elseif( $error=phone_number($phone)){

                return $error;
        
            }elseif($error=check_text($notes)){


                return $error;
            }else{

               return null;
            }
           


}


?>