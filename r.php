<?php 
require "systems.php";
global $pdo;
if(trim($_POST['login'] !== '') && trim($_POST['password'] !== '')) {

    $query = "INSERT INTO `users` (`user_name`, `user_login`, `user_password`) VALUES (:name, :login, :password)"; 

    $params = [ 
      ':name' => trim($_POST['name']),
      ':login' => trim($_POST['login']), 
      ':password' => trim($_POST['password']) 
    ];

    $data = $pdo->prepare($query); 

    $data->execute($params); 

    $_SESSION['user'] = $_POST['login']; 
    header("Location: 1index.php");

} 

