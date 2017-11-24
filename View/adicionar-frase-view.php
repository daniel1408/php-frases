<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['user'])){
    $usuario = $_SESSION['user'];
?>

<html>
    <head>
        <title>Adicionar</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <h2 class="text-center"><b>Adicionar Frase</b></h2>
        <hr>
        
        <div class="container">
            <form action="../Controller/adicionar-frase.php">
                <div class="form-group">
                  <label>Frase</label>
                  <textarea class="form-control" id="frase" rows="3" name="frase"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" value="<?php echo $_SESSION['user']?>" name="autor">
                </div>
                
                <input class="btn btn-info" type="submit" value="Adicionar">
            </form>
        </div>
    </body>
</html>
<?php
    } else {
        header("location: ../index.php");
    }
