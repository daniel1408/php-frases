<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            $texto = filter_input(INPUT_GET, "texto");
            $autor_id = filter_input(INPUT_GET, "autor_id");
        ?>
    </head>
    <body>
        <h2 class="text-center"><b>Adicionar Frase</b></h2>
        <hr>
        
        <div class="container">
            <form action="alterar.php">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                </div>
                <div class="form-group">
                  <label>Frase</label>
                  <textarea class="form-control" id="texto" name="texto" value="" placeholder="<?php echo $texto?>"></textarea>
                </div>
                <div class="form-group">
                  <label>Autor da frase</label>
                  <select class="form-control" id="autor_id" name="autor_id">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                  </select>
                </div>
                
                <input class="btn btn-info" type="submit" value="Alterar">
            </form>
        </div>
    </body>
</html>