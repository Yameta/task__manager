<?php
    if(isset($_POST["name"]) && isset($_POST["assigner"]) && isset($_POST["assigner_email"]) && isset($_POST["performer"]) && isset($_POST["performer_email"]) && isset($_POST["description"]) && isset($_POST["begin"]) && isset($_POST["deadline"])){
        require "systems.php";
        global $pdo;
        $sql = "UPDATE  tasks SET task_name=:name,assigner=:assigner,assigner_email=:assigner_email,performer=:performer,performer_email=:performer_email,task_description=:description,beginning=:begin,deadline= :deadline WHERE id_task=:id";
        $query = $pdo->prepare($sql);   
        $query->execute(array(
            "name" => $_POST["name"],
            "assigner" => $_POST["assigner"],
            "assigner_email" => $_POST["assigner_email"],
            "performer" => $_POST["performer"],
            "performer_email" => $_POST["performer_email"],
            "description" => $_POST["description"],
            "begin" => $_POST["begin"],
            "deadline" => $_POST["deadline"],
            "id" => $_GET['id']    
        ));
        header("Location: 1index.php");
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
    <link rel="stylesheet" href="styles/add_task.css">
    <title>Update</title>
</head>
<body>
    <main>
        <h1>Изменение задачи</h1>
    <form method="post" class="add__task__form" action="">
            <table>
                <tr>
                    <td>Название задачи</td>
                    <td> <input id="name_IS" placeholder="Название задачи"  name="name" type="text" maxlength="32"></td>
                </tr>
                <tr>
                    <td>Кто поставил задачу</td>
                    <td> <input placeholder="Кто поставил задачу" name="assigner"  type="text" maxlength="32"></td>
                </tr>
                <tr>
                    <td>Его почта</td>
                    <td></label> <input placeholder="Его почта" name="assigner_email" type="email"></td>
                </tr>
                <tr>
                    <td>Кому поставили задачу</td>
                    <td><input placeholder="Кому поставили задачу" name="performer"  type="text" maxlength="32"></td>
                </tr>
                <tr>
                    <td>Его почта</td>
                    <td><input placeholder="Его почта" name="performer_email"  type="email" ></td>
                </tr>
                <tr>
                    <td>Описание задачи</td>
                    <td><textarea  id="editable" placeholder="Описание" name="description" type="text" maxlength="150"> </textarea></td>
                </tr>
                <tr>
                    <td> Дата начала</td>
                    <td><input  class="date" placeholder="Дата начала" name="begin" type="date" ></td>
                </tr>
                <tr>
                    <td>Дедлайн</td>
                    <td><input class="date" placeholder="Дедлайн" name="deadline" type="date"></td>
                    <tr>
                        <td>Добавить</td>
                    <td><button  class="btn" type="submit">Confirm</button></td>
                    </tr>
            </table>
        </form>
    </main>
    <?php require "blocks/footer.php" ?> 
    <script>
        if (localStorage.getItem('name') !== null) {
      document.getElementById('name_IS').value = localStorage.getItem('name');
    }
    document.addEventListener('keydown', function(e) {
      localStorage.setItem('name', document.getElementById('name_IS').value);
    });
    if (localStorage.getItem('text') !== null) {
      document.getElementById('editable').value = localStorage.getItem('text');
    }
    document.addEventListener('keyup', function(e) {
      localStorage.setItem('text', document.getElementById('editable').value);
    });
  </script>
</body>
</html>