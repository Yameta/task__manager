<?php
      require "db.php";
     session_start();
    function saveAuth($id) {
        global $pdo;
        $_SESSION["id"] = $id;
        $sql = "SELECT id_user, user_login, user_name FROM users WHERE  id_user = :id";
        $query = $pdo->prepare($sql);
        $query->execute(array("id" => $id));
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION["login"] = $user["user_login"];
        $_SESSION["username"] = $user["user_name"];

    }