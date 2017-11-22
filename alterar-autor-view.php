<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['user'])){
?>

<html>
    <head>
        <title>Alterar frase</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <?php
            $id = filter_input(INPUT_GET, "id");    
            $nome = filter_input(INPUT_GET, "nome");
            $nascimento = filter_input(INPUT_GET, "nascimento");
            $login = filter_input(INPUT_GET, "login");
        ?>
    </head>
    <body>
        <h2 class="text-center"><b>Alterar dados pessoais</b></h2>
        <hr>
        
        <div class="container">
            <form action="alterar-autor.php">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                </div>
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" name="nome" id="nome"  value="<?php echo $nome?>"/>
                </div>
                <div class="form-group">
                  <label>Nascimento</label>
                  <input type="date" class="form-control" name="nascimento" id="nascimento"  value="<?php echo $nascimento?>"/>
                </div>
                <div class="form-group">
                  <label>Login</label>
                  <input type="text" class="form-control" name="login" id="usuario"  value="<?php echo $login?>"/>
                </div>
                
                <input class="btn btn-info" type="submit" value="Alterar">
            </form>
            
        </div>
    </body>
</html>
<?php
    } else {
        header("location: index.php");
    }