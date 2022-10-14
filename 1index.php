<?php
    require "systems.php";
    require "classes/Database.php";
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css" type="text/css">
    <title>Task manager</title>
</head>
<body>
    <?php require "blocks/header.php"?>
    <main>
                <table>
                    <thead>
                    <tr>
                    <th>Кто поставил задачу</th>
                    <th>Его почта</th>
                    <th>Кому поставили задачу</th>
                    <th>Его почта</th>
                    <th>Название задачи</th>
                    <th>Описание задачи</th>
                    <th>Дата начала</th>
                    <th>Дата окончания</th>
                    <th>Изменение задачи</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($tasks as $item): ?>
                        <tr>
                        <td><?=$item["assigner"]?></td>
                        <td><?=$item["assigner_email"]?></td>
                        <td><?=$item["performer"]?></td>
                        <td><?=$item["performer_email"]?></td>
                        <td><?=$item["task_name"]?></td>
                        <td><?=$item["task_description"]?></td>
                        <td><time datetime="<?=$item["beginning"]?>"><?=date("j F Y \г\. \в H:i", strtotime($item["beginning"]))?></time></td>
                        <td><time datetime="<?=$item["deadline"]?>"><?=date("j F Y \г\. \в H:i", strtotime($item["deadline"]))?></time> </td>
                        <td>
                            <a href="update_task.php?id=<?=$item["id_task"]?>">Изменить/</a>
                            <a href="delete_task.php?id=<?=$item["id_task"]?>">Удалить</a>
                        
                    </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
    </main>
    <?php require "blocks/footer.php" ?> 
</body>
</html>