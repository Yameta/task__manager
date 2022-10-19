<?php 
require "systems.php";
global $pdo;
if(trim($_POST['login'] !== '') && trim($_POST['password'] !== '') && trim($_POST['name'] !== '')) {
    $query = "INSERT INTO `users` (`user_name`, `user_login`, `user_password`) VALUES (:name, :login, :password)"; 

    $params = [ 
      ':name' => $name = trim($_POST['name']),
      ':login' => $login = trim($_POST['login']), 
      ':password' => $password = password_hash($_POST['password'], PASSWORD_DEFAULT) // хэширование пароля 
    ];
    
    $data = $pdo->prepare($query); 

    $data->execute($params); 
  //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
  $login = stripslashes($login);
  $login = htmlspecialchars($login);
  $password = stripslashes($password);
  $password = htmlspecialchars($password);
  //удаляем лишние пробелы
  $login = trim($login);
  $password = trim($password);
}

if (empty($login) && empty($password) && empty($name))
 //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
  $_SESSION['message'] = 'ВЫ не ввели данные!';
  header('Location: reg.php');
}
?>