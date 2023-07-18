<?php
require_once "database/conexao.php";
require_once "database/query.php";

$query = new Query();

if(isset($_POST["taskname"])){
    $query->AddTask($_POST["taskname"]);
    header("Location:index.php");
}

if(isset($_GET["complete"])){
    $query->FinishTask($_GET["complete"]);
    header("Location:index.php");
}

$tasks = $query->GetAllTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="img/icon.png" type="image/png">
</head>
<body>
    <img src="img/icon.png" class="icon">
    <b>Bem-vinde ao Gerenciador de Tarefas das Gatas!</b><br><br>
    <form method="post" action="index.php">
        <input type="text" name="taskname" placeholder="Insira nova tarefa" class="campoTask" required><br><br>
        <button type="submit" class="btnEnviar">Enviar</button>
    </form>
    <ul>
        <?php foreach($tasks as $task): ?>
        <li>
            <?php echo $task["task_name"]; ?>
            <?php if($task["completed"]==0): ?>
            <a href="index.php?complete=<?php echo $task["id"]; ?>"><b>concluir</b></a>
            <?php else: ?>
            <b>concluída</b>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>