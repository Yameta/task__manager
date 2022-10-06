<?php
    if(isset($_POST["name"]) && isset($_POST["assigner"]) && isset($_POST["assigner_email"]) && isset($_POST["performer"]) && isset($_POST["performer_email"]) && isset($_POST["description"]) && isset($_POST["begin"]) && isset($_POST["deadline"])){
        require "systems.php";
        require "classes/Database.php";
        $Database = new Database();
        $qry = "INSERT INTO tasks (task_name, assigner,assigner_email,performer,performer_email,task_description,beginning,deadline) VALUES (:name, :assigner,:assigner_email,:performer,:performer_email,:description,:begin,:deadline)";
        $parm = array(
            "name" => $_POST["name"],
            "assigner" => $_POST["assigner"],
            "assigner_email" => $_POST["assigner_email"],
            "performer" => $_POST["performer"],
            "performer_email" => $_POST["performer_email"],
            "description" => $_POST["description"],
            "begin" => $_POST["begin"],
            "deadline" => $_POST["deadline"]
        );
        $Database->insert($qry, $parm);
        header("Location: 1index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/add_task.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <title>Добавление задачи</title>
</head>
<body>
    <main>
         <h1>Добавление задачи</h1>
        <form method="post" class="add__task__form" action="">
            <table>
                <tr>
                    <td>Название задачи</td>
                    <td> <input placeholder="Пары" name="name" type="text" maxlength="32" required></td>
                </tr>
                <tr>
                    <td>Кто поставил задачу</td>
                    <td> <input placeholder="Иванов И.И." name="assigner"  type="text" maxlength="32" required></td>
                </tr>
                <tr>
                    <td>Его почта</td>
                    <td></label> <input placeholder="ivanov_I@gmail.com" name="assigner_email" type="email" required></td>
                </tr>
                <tr>
                    <td>Кому поставили задачу</td>
                    <td><input placeholder="Петров П.П." name="performer"  type="text" maxlength="32" required></td>
                </tr>
                <tr>
                    <td>Его почта</td>
                    <td><input placeholder="petrov_p@gmail.com" name="performer_email"  type="email"  required></td>
                </tr>
                <tr>
                    <td>Описание задачи</td>
                    <td><textarea placeholder="Описание" name="description" type="text" maxlength="150" required> </textarea></td>
                </tr>
                <tr>
                    <td> Дата начала</td>
                    <td><input  class="date" placeholder="Дата начала" name="begin" type="date" required></td>
                </tr>
                <tr>
                    <td>Дедлайн</td>
                    <td><input class="date" placeholder="Дедлайн" name="deadline" type="date" required></td>
                    <tr>
                        <td>Добавить</td>
                    <td><button  class="btn" type="submit">Confirm</button></td>
                    </tr>
                    
                </tr>
            </table>
        </form>
    </main>
    <?php require "blocks/footer.php" ?> 
</body>
</html>