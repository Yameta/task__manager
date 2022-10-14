<?php
      require "db.php";
     session_start();
    function saveAuth($id) {
        global $pdo;
        $_SESSION["id"] = $id;
        $sql = "SELECT id_user,user_login,user_name,group_name,group_rules  FROM users JOIN groups ON users.id_group = groups.id_group WHERE id_user = :id";
        $query = $pdo->prepare($sql);
        $query->execute(array(
            "id" => $id
        ));
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION["rule"] = $user["group_rules"];
        $_SESSION["login"] = $user["user_login"];
        $_SESSION["role_name"] = $user["group_name"];
        $_SESSION["id_user"] = $user["id_user"];
        $_SESSION["name"] = $user["user_name"];
    }
    function checkRule() {
        global $pdo;
        if(isset($_SESSION["id"]) && isset($_SESSION["rule"]) && isset($_SESSION["login"])) {
            $sql = "SELECT id_user, user_name, group_rules  FROM users JOIN groups WHERE users.id_group = groups.id_group AND id_user = :id";
            $query = $pdo->prepare($sql);
            $query->execute(array(
                "id" => $_SESSION["id"]
            ));
            $user = $query->fetch(PDO::FETCH_ASSOC);
            if($_SESSION["rule"] == $user["group_rules"]) {
                return $_SESSION["rule"];
            }
            else {
                $_SESSION["rule"] = $user["group_rules"];
                return $user["group_rules"];
            }
        }
        else {
            return 5;
        }
    }
    function logging($action){
        global $pdo;
        $sql= "INSERT INTO test_loq (id_log,id_user,action,	log_datetime,ip,user_agent) VALUES (:id,:id_user,:action,:datetime,:ip,:user_agent)";
        $query = $pdo->prepare($sql);
        $query->execute(array(
            "id"=>http_response_code(),
            "id_user"=>$_SESSION["id"],
            "action"=>$action,
            "datetime"=> date("Y-m-d H:i:s"),
            "ip" =>$_SERVER["REMOTE_ADDR"],
            "user_agent"=>$_SERVER["HTTP_USER_AGENT"]
        ));
    }  