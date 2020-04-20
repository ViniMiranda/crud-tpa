<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD php</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <h1 class="title"></h1>
    
    <?php
    header("Content-Type: text/html; charset=utf-8");

    //pegando a classe da url e a acao a ser executada, pode ser create, delete, updade, de padrao 
    //sera read.
    if(isset($_GET['class']) && isset($_GET['action']) ){
        $controller = $_GET['class'].'Controller';
        $action = $_GET['action'];
    }else{
        $controller = 'LivroController';
        $action = 'read';
    }
    //formando o caminho do arquivo controller e instanciando-o
    require_once "app/controllers/".$controller.".php";
    $app = new $controller();
    //executando acao
    $app->$action();
    ?>
</body>

</html>