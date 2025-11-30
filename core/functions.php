<?php
session_start();
function setMessage($message , $type)
{
    $_SESSION['message'] = [
        'message' => $message,
        'type' => $type
    ];   
}
function showMessage()
{
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message']['message'];
        $type = $_SESSION['message']['type'];
        echo "<div class='alert alert-$type w-25 px-3 text-capitalize d-flex justify-content-between align-items-center'>$message
        <button type='button' class='btn-close ' width='24' height='24' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        unset($_SESSION['message']);
    }
}
function registerUser($name, $email,$password)
 {
    $usersJsonFile = __DIR__ . "/../data/users.json";

    $users = file_exists($usersJsonFile) ? json_decode(file_get_contents($usersJsonFile),true) : [];
     $newId = empty($products) ? 1 : max(array_column($products, 'id')) + 1;
      
    $hashPassword = password_hash($password,PASSWORD_DEFAULT);
    $newUser = [
        "id" => $newId,
        "name" => $name,
        "email" => $email,
        "password" => $hashPassword,
    ];

    $users[] = $newUser;
    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email
    ];
    file_put_contents($usersJsonFile,json_encode($users,JSON_PRETTY_PRINT));
    return true;
}
function getAllUsers()
{
    $usersJsonFile = __DIR__ . "/../data/users.json";
    $users = file_exists($usersJsonFile) ? json_decode(file_get_contents($usersJsonFile),true) : [];
    return $users;
}
function loginUser($email,$password)
{
    $usersJsonFile = realpath(__DIR__ . "/../data/users.json");

    $users = file_exists($usersJsonFile) ? json_decode(file_get_contents($usersJsonFile),true) : [];
    foreach ($users as $user){
        if($user['email'] === $email && password_verify($password,$user['password'])){
           $_SESSION["user"] = [
                'name' => $user['name'],
               'email' => $user['email']
           ];
           return true;
        }
    }
    return false;
}
function nameImage($image){
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $image_name =  date('Y-m-d'). "_" . rand(1000, 10000) . "." . $ext; 
    return $image_name;
}
function addProduct($title, $price,$description, $image)
{
    $productsJsonFile = __DIR__ . "/../data/products.json";
    $products = file_exists($productsJsonFile) ? json_decode(file_get_contents($productsJsonFile),true) : [];
    $newId = empty($products) ? 1 : max(array_column($products, 'id')) + 1;

    $image_name = nameImage($image);
    $image_dir = __DIR__ . "/../assets/images/";
   if( !move_uploaded_file($image['tmp_name'], $image_dir ."/". $image_name)){
      die("Failed to upload image.");
   }
    $newProduct = [
        "id" => $newId,
        "title" => $title,
        "price" => $price,
        "description" => $description,
        "image" => $image_name
    ];
    $products[] = $newProduct;
    file_put_contents($productsJsonFile,json_encode($products,JSON_PRETTY_PRINT));
    return true;
}
function getAllProducts()
{
    $productsJsonFile = __DIR__ . "/../data/products.json";
    $products = file_exists($productsJsonFile) ? json_decode(file_get_contents($productsJsonFile),true) : [];
    return $products;
}
function deleteProduct($id){
    $productsJsonFile = __DIR__ . "/../data/products.json";
    $products = file_exists($productsJsonFile) ? json_decode(file_get_contents($productsJsonFile),true) : [];
    $imagePath = "";
    $found = false;
    foreach ($products as $index => $product){
        if($product['id'] === $id){
            $imagePath = $product['image'];
                if(file_exists(__DIR__ . "/../assets/images/" . $imagePath)){
                    unlink(__DIR__ . "/../assets/images/" . $imagePath);
                }
            unset($products[$index]);
            $found = true;
            break;
        }
    }
    if($found === false){
        return false;
    }
    $products = array_values($products);
    file_put_contents($productsJsonFile,json_encode($products,JSON_PRETTY_PRINT));
    return true;
}
function updateProduct($id,$title, $price,$description,$image){
    $productsJsonFile = __DIR__ . "/../data/products.json";
    $products = file_exists($productsJsonFile) ? json_decode(file_get_contents($productsJsonFile),true) : [];

    $image_dir = __DIR__ . "/../assets/images/";
    $found = false;
    foreach ($products as &$product){
        if($product['id'] === $id){
            
            $product['title'] = $title;
            $product['price'] = $price;
            $product['description'] = $description;
            $found = true;
            if(!empty($image['name'])){
                $oldImagePath = $image_dir . $product['image'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $nameImage = nameImage($image);
                 move_uploaded_file($image['tmp_name'], $image_dir . $nameImage);
                $product['image'] = $nameImage;
            }
            break;
        }
        var_dump($product);
    }

    if($found === false){
        return false;
    }
    file_put_contents($productsJsonFile,json_encode($products,JSON_PRETTY_PRINT));
    return true;
}
// ________________________________________________________________________
function contactMessage($name, $email, $message){
    $contactsJsonFile = realpath(__DIR__ . "/../data/contact.json");
    $messages = file_exists($contactsJsonFile) ? json_decode(file_get_contents($contactsJsonFile),true) : [];
    $newMessage = [
        "user_name" => $_SESSION['user']['name'],
        "user_email" => $_SESSION['user']['email'],
        "name" => $name,
        "email" => $email,
        "message" => $message,
    ];
    $messages[] = $newMessage;
    file_put_contents($contactsJsonFile,json_encode($messages,JSON_PRETTY_PRINT));
    return true;
}
function checkOrder($name, $email, $address, $phone, $notes ,$title, $price, $qty ,$total) {
     $ordersJsonFile = realpath(__DIR__ . "/../data/orders.json");
    $orders = file_exists($ordersJsonFile) ? json_decode(file_get_contents($ordersJsonFile),true) : [];

    $newOrder = [
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
    $orders[] = $newOrder;
    file_put_contents($ordersJsonFile,json_encode($orders,JSON_PRETTY_PRINT));
    return true;
}
