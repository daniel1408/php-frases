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
            <meta http-equiv="content-type" content="text/html;charset=utf-8" />

            <?php
                $id = filter_input(INPUT_GET, "id");    
                $texto = filter_input(INPUT_GET, "texto");
                $autor_id = filter_input(INPUT_GET, "autor_id");
            ?>
        </head>
        <body>
            <h2 class="text-center"><b>Alterar Frase</b></h2>
            <hr>

            <div class="container">
                <form action="../Posts/alterar-frase-post.php">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                    </div>
                    <div class="form-group">
                      <label>Frase</label>
                      <input type="text" class="form-control" id="texto" name="texto" value="<?php echo $texto?>"></textarea>
                    </div>

                    <input class="btn btn-info" type="submit" value="Alterar">
                </form>
            </div>
        </body>
    </html>
<?php
    } else {
        header("location: ../index.php");
    }