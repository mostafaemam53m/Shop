<?php

function products($product){

    session_start();

    $arry_of_products=$product;


    print_r($arry_of_products);



}

   // function to delet repeate itemes in array

   function delet_repeat($cart){
    $uniqueArray=[];
    $seen=[];

     foreach($cart as $key=>$value){
         if(!in_array($value['name'],$seen)){
             $seen[]=$value['name'];


     //    array withou repeat values
      $uniqueArray[]=$value;
     

         } 

        
     }

     return $uniqueArray;
}



 // to cal quantity of roducts in array
 function product_Quantity($cart){

    $counts = [];  

foreach ($cart as $item) {
    $name = $item['name'];  
    if (isset($counts[$name])) {
        $counts[$name]++;  
    } else {
        $counts[$name] = 1;  
    }
}

return $counts;

}


function cal_total($array,$quantity){
    // to delet repeate values
 $uniqueArray=delet_repeat($array);
   
    
    // to calculte total price
    $total_price=[];
    foreach($uniqueArray as $index =>$item){
        $price=$item["price"];
        $num_repeat=$quantity[$item["name"]];

        $total_price[]=[$item["name"]=>$price*$num_repeat];
        $final_result=array_merge(...$total_price);


    }

    return $final_result;

    


}



//  save $result  of product_Quantity in var quantity



function get_final_array(array $cart,array $quantity,array $total_price){

foreach( delet_repeat($cart) as $index=>$item){

    $colect_array[]=["name"=>$item["name"],"price"=>$item["price"],"Quantity"=> $quantity[$item["name"]],"total"=>$total_price[$item["name"]]];
    

}

return $colect_array;

}


// create this function to use it in show error massage if login and register page if there is any error

// session_start(); dont active session start because  i used it in header to make it active on all code use session im my site
session_start();

function set_message($type,$message){
    $_SESSION["message"]=[
        "type"=>$type,
        "message"=>$message
    ];



}

function show_message(){
    if(isset($_SESSION["message"])){
        $type=$_SESSION["message"]["type"];
        $message=$_SESSION["message"]["message"];

        echo "<div class='alert alert-$type' role='alert'>$message</div>";
 

        unset($_SESSION["message"]);


    
}
}
//  put all data in jeson file after validation 
 $file="../data/register.json";
function put_data_into_json($user_name,$email,$password,$full_name,$phone,$country,$address){
    global $file;

    if(file_exists($file)){
        $user_data=json_decode(file_get_contents($file),true);

        if(!is_array($user_data)){
            $user_data=[];
        }
      
        // to add id if array empty make id=0 and end use to get last id and add +1 to it
        
        $newId=count($user_data)<1 ? 0: end($user_data)["id"]+1;

        // to encode pasword before store it

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        
        $user_new_data=[
        "id"=>$newId,
        "user_name"=>$user_name,
        "email"=>$email,
        "password"=>$hashed_password,
        "full_name"=>$full_name,
        "phone"=>$phone,
        "country"=>$country,
        "address"=>$address
            
        ];

        

        $user_data[]= $user_new_data;



        file_put_contents($file,json_encode($user_data,JSON_PRETTY_PRINT));





    }
}


function store_contact_data($name,$email,$message){
    $file="../data/contact_data.json";
    
    $contact=file_exists($file)? json_decode(file_get_contents($file),true):[];
   
    // to add id if array empty make id=0 and end use to get last id and add +1 to it
        
    $newId=count($contact) < 1 ? 0: end($contact)["id"] + 1;
    
    $new_contact=[
        "id"=>$newId,
        "name"=>$name,
        "email"=>$email,
        "message"=>$message
    ];

    $contact[]= $new_contact;

    file_put_contents($file,json_encode($contact,JSON_PRETTY_PRINT));

}



function store_check_out_data($name,$email,$address,$phone,$notes){
    $file="../data/checkout_data.json";
    
    $check_out_data=file_exists($file)? json_decode(file_get_contents($file),true):[];
   
    // to add id if array empty make id=0 and end use to get last id and add +1 to it
        
    $newId=count($check_out_data) < 1 ? 0: end($check_out_data)["id"] + 1;
    
    $new_check_out_data=[
        "id"=>$newId,
        "name"=>$name,
        "email"=>$email,
        "address"=>$address,
        "phone"=>$phone,
        "notes"=>$notes


    ];

    $check_out_data[] = $new_check_out_data;

    file_put_contents($file,json_encode($check_out_data,JSON_PRETTY_PRINT));

}



?>