<?php 
require "systems.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <title>Вход</title>
</head>
<body>
<form  action="r.php" method="post">
        <h1>Регистрация</h1>
        <input type="text" name="name" id="name" placeholder="Имя" autocomplete="off"> </br></br>
        <input type="text" name="login" id="login" placeholder="Логин" autocomplete="off"> </br></br>
        <input type="password" name="password" id="password" placeholder="Пароль" autocomplete="off"> </br></br>
        <button class="btn" id="reg" type="submit">Зарегистрироваться</button>
        <?php 
            if (isset ($_SESSION['message'])) {
                echo '<p class=msg>' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        </br>
        </br>
        <a  href="auth.php">Войти</a>
    
    </form>
</body>
</html>