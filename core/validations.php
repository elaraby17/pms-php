<?php

function validateRequired($inputName, $value)
{
    return empty($value) ? "$inputName is required" : null;
}
// ________________________________________________________________________
function validateMinString($string)
{
    return strlen($string) < 3 ? "name must be at least 3 chharacters" : null;
}
// ________________________________________________________________________
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "Invalid Email";
}
// ________________________________________________________________________
function validatePassword($password)
{
    if (strlen($password) < 6) {
        return "password must be 6 chharacters";
    }

    if (!preg_match("/[A-Z]/", $password)) {
        return "Password must contain uppercase";
    }

    if (!preg_match("/[a-z]/", $password)) {
        return "Password must contain lowecase";
    }

    if (!preg_match("/[0-9]/", $password)) {
        return "Password must contain number";
    }

    return null;
}
// ________________________________________________________________________

// ________________________________________________________________________
function validatePasswordMatch($password, $confirm_password)
{
    return $password === $confirm_password ? null : "Password and confirm password dont match";
}
// ________________________________________________________________________
function validateEmailUnique($email)
{
    $usersJsonFile = realpath(__DIR__ . "/../data/users.json");
    $users = file_exists($usersJsonFile) ? json_decode(file_get_contents($usersJsonFile),true) : [];

    foreach ($users as $user){
        if($email === $user['email']){
            return "ُEmail already exsite";
        }
    }
    return null;
}
// ________________________________________________________________________
function validateFileImage($image){
   if($image['error'] != 0){
    return "Image upload failed";
   }
   if($image['size'] <= 0){
    return "the image not found";
   }
     $allowed_ext = ["jpg", "jpeg", "png", "webp"];
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    if(!in_array($ext, $allowed_ext)){
        return "error! only images are allowed (jpg, jpeg, png, webp)";
    }
    $allowed_size = 2 * 1024 * 1024; // 2MB
    if($image['size'] > $allowed_size){
        return "error! image size must be less than 2MB";
    }
    return null;
}

// ________________________________________________________________________
function validateRegister($name, $email, $role,$password, $confirm_password)
{
    $filds = [
        "name" => $name, 
        "email" => $email, 
        "role" => $role,
        "password" => $password,
        "confirm_password" => $confirm_password,
    ];

    foreach ($filds as $input_name => $value) {
        if ($error = validateRequired($input_name, $value)) {
            return $error;
        }
    }

    if ($error = validateMinString($name)) {
        return $error;
    }

    if ($error = validateEmail($email)) {
        return $error;
    }

    if ($error = validateEmailUnique($email)) {
        return $error;
    }

    if ($error = validatePassword($password)) {
        return $error;
    }

    if ($error = validatePasswordMatch($password, $confirm_password)) {
        return $error;
    }
}

// ________________________________________________________________________
function validateLogin( $email, $password)
{
    $filds = [
        "email" => $email, 
        "password" => $password,
    ];

    foreach ($filds as $input_name => $value) {
        if ($error = validateRequired($input_name, $value)) {
            return $error;
        }
    }


    if ($error = validateEmail($email)) {
        return $error;
    }

}
// ________________________________________________________________________
function validateContact($name, $email, $message){
    $filds = [
        "name" => $name, 
        "email" => $email,
        "message" => $message,
    ];

    foreach ($filds as $input_name => $value) {
        if ($error = validateRequired($input_name, $value)) {
            return $error;
        }
    }
        if ($error = validateMinString($name)) {
        return $error;
    }

    if ($error = validateEmail($email)) {
        return $error;
    }
    
}
function validateProduct($title, $price, $description,$image){
    $filds = [
        "title" => $title, 
        "price" => $price,
        "description" => $description,
    ];
     
    foreach ($filds as $input_name => $value) {
        if ($error = validateRequired($input_name, $value)) {
            return $error;
        }
    }
        if ($error = validateMinString($title)) {
        return $error;
    }
    if ($error = validateMinString($description)) {
        return $error;
    }
    
    if ($error = validateFileImage($image)) {
        return $error;
    }
}
function validateupdateProduct($title, $price, $description,$image){
    $filds = [
        "title" => $title, 
        "price" => $price,
        "description" => $description,
    ];
         if(!empty($image['name'])){
        $imageName = $image['name'];
          if ($error = validateFileImage($image)) {
            return $error;
        }
    foreach ($filds as $input_name => $value) {
        if ($error = validateRequired($input_name, $value)) {
            return $error;
        }
    }
        if ($error = validateMinString($title)) {
        return $error;
    }
    if ($error = validateMinString($description)) {
        return $error;
    }
    

    
}
}
function validateOrder($name, $email, $address, $phone, $notes ,$title, $price, $qty ,$total){
    $filds = [
        "name" => $name, 
        "email" => $email,
        "address" => $address,
        "phone" => $phone,
        "notes" => $notes,
        "title" => $title,
        "price" => $price,
        "qty" => $qty,
        "total" => $total,
    ];

    foreach ($filds as $input_name => $value) {
        if ($error = validateRequired($input_name, $value)) {
            return $error;
        }
    }
        if ($error = validateMinString($name)) {
        return $error;
    }

    if ($error = validateEmail($email)) {
        return $error;
    }
    if ($error = validateMinString($address)) {
        return $error;
    }
    if ($error = validateMinString($notes)) {
        return $error;
    }

}
// ________________________________________________________________________