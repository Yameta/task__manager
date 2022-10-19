<?php
    require "../systems.php";
    require "../classes/Database.php";
    $Database = new Database();
    $qry = "SELECT * FROM tasks ORDER BY task_name DESC";
    $tasks = $Database->getAll($qry);
    if(!isset($_SESSION["id"])){
        saveAuth(4);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
    <title>Document</title>
</head>
<body>
<?php require "../blocks/header.php"?>
</body>
</html>