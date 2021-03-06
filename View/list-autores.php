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
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>Banco de Frases</title>
        
    </head>
    <body>
        <div style="background-color: black; color: white">
            <a class="btn btn-default" href="../View/list-frases.php" style="margin:5px">Minhas Frases</a>
            <a class="btn btn-default" href="../View/home.php" style="margin:6px">Home</a>
            <a class="btn btn-default" href="../View/logout.php" style="margin:6px">Logout</a>
            <span style="margin-left: 20%; font-size: 30px; font-weight: bold">Autores</span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <div style="margin: 20px 0">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline">
                            <div>
                                <input class="form-control" type="text" name="parametro" placeholder="Qual usuario deseja buscar hoje?" style="width:70%; height: 35px; margin-left: 10%"/>
                                <input class="btn btn-info" type="submit" value="Buscar" style="height: 34px;"/>
                            </div>
                        </form>        
                    </div>                    
                    
                    <table class="table table-hover" style="background-color: white">
                    <?php
                        spl_autoload_register(function ($class_name) {
                            include '../Model/' . $class_name . '.php';
                        });
                        
                        try {
                            $parametro = filter_input(INPUT_GET, "parametro");
                            if($parametro){             
                                $stmt = AutorDao::selectLike($parametro);
                            }else{
                                $stmt = AutorDao::selectAll($parametro);
                            }                            
                    ?>
                    <thead style="background-color: black; color: white">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Login</th>
                      </tr>
                    </thead>
                            
                    <?php
                            
                            while($row = $stmt->fetch()) {
                    ?>
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo $row['id']?></th>
                        <td><?php echo $row['nome']?></td>
                        <td><?php echo $row['nascimento']?></td>
                        <td><?php echo $row['login']?></td>
                      </tr>
                    </tbody>
                  

                    <?php

                            }
                        } catch (PDOException $e) {
                            echo 'ERROR: ' . $e->getMessage();
                        }
                    ?>        
                    </table>
                </div>
            </div>
        </div>
            
            
    </body>
</html>
<?php
    } else {
        header("location: ../index.php");
    }