<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <?php
        require "systems.php";
        global $pdo;
        if(isset($_POST["login"]) && isset($_POST["password"])) {
            $sql = "SELECT * FROM users WHERE user_login = :login AND BINARY user_password = :password";
            $query = $pdo->prepare($sql);
            $query->execute(array(
                "login" => $_POST["login"],
                "password" => $_POST["password"]
            ));
            if($query->rowCount() == 1) {
                $user = $query->fetch(PDO::FETCH_ASSOC);
                saveAuth($user["id_user"]);
                header("Location: 1index.php");
            }
            else {
                include("auth.php");
                echo "<p>Имя пользователя или пароль указаны неверно.</p>";
            }
        }
        else {
            include("auth.php");
        }
    ?>
</body>
</html>