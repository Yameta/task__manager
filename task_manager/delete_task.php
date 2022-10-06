<?php 
    require "systems.php";
    global $pdo;
    $sql = "DELETE FROM tasks WHERE id_task = :id";
    $query = $pdo->prepare($sql);
    $query->execute(array("id"=>$_GET["id"]));
    header("Location: 1index.php");
?>